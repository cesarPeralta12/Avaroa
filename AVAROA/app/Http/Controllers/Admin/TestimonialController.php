<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage; // For handling file storage
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    // Fetch all testimonials
    public function getAllTestimonials()
    {
        try {
            $testimonials = Testimonial::all(); // Get all testimonials
            return response()->json([
                'success' => true,
                'data' => $testimonials
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch testimonials',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Fetch all testimonials
    public function index()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $testimonials = Testimonial::all();

            return view('admin.testimonials.index', compact('testimonials', 'user_session'));
        } else {
            return redirect()->back()->with('fail', 'You must log in first');
        }
    }

    // Show a single testimonial
    public function show($id)
    {
        if (Session::has('LoggedIn')) {
            return response()->json(Testimonial::findOrFail($id));
        } else {
            return redirect()->back()->with('fail', 'You must log in first');
        }
    }

    // Create a new testimonial
    public function create()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            return view('admin.testimonials.create', compact('user_session'));
        } else {
            return redirect()->back()->with('fail', 'You must log in first');
        }
    }

    // Store a new testimonial
    public function store(Request $request)
    {
        if (Session::has('LoggedIn')) {
            // Validate the request data, including the image file
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'feedback' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Allow image file types
            ]);

            // Handle the image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $attribute = $request->file('image');
                $destination = 'testimonials';

                // Generate unique filename
                $file_name = time() . '-' . Str::random(10) . '.' . $attribute->getClientOriginalExtension();

                // Move uploaded file to the destination directory
                $attribute->move(public_path('uploads/' . $destination), $file_name);

                // Update image path
                $imagePath = 'uploads/' . $destination . '/' . $file_name;
            }

            // Create the testimonial record
            $testimonial = Testimonial::create([
                'client_name' => $validated['name'],
                'client_role' => $validated['role'],
                'content' => $validated['feedback'],
                'client_image_url' => $imagePath, // Store the image path in the database
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Testimonial created successfully',
            ], 200); // JSON response for AJAX
        } else {
            return response()->json([
                'success' => false,
                'message' => 'You must log in first',
            ], 401);
        }
    }


    // Edit a testimonial
    public function edit($id)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $testimonial = Testimonial::findOrFail($id);
            return view('admin.testimonials.edit', compact('testimonial', 'user_session'));
        } else {
            return redirect()->back()->with('fail', 'You must log in first');
        }
    }

    // Update an existing testimonial
    public function update(Request $request, $id)
    {
        // Find the testimonial to update
        $testimonial = Testimonial::findOrFail($id);

        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'feedback' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Validate image file types
        ]);

        // Handle image file if uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($testimonial->client_image_url && file_exists(public_path($testimonial->client_image_url))) {
                unlink(public_path($testimonial->client_image_url)); // Delete the old image
            }

            // Handle new image upload
            $attribute = $request->file('image');
            $destination = 'testimonials'; // Directory where images are stored

            // Generate unique filename for the new image
            $file_name = time() . '-' . Str::random(10) . '.' . $attribute->getClientOriginalExtension();

            // Move the uploaded file to the destination directory
            $attribute->move(public_path('uploads/' . $destination), $file_name);

            // Update the testimonial with the new image path
            $validated['client_image_url'] = 'uploads/' . $destination . '/' . $file_name;
        }

        // Update the testimonial with the validated data (image path will only be updated if a new image is uploaded)
        $testimonial->update([
            'client_name' => $validated['name'] ?? $testimonial->client_name,  // Use the existing name if not provided
            'client_role' => $validated['role'] ?? $testimonial->client_role,  // Use the existing role if not provided
            'content' => $validated['feedback'] ?? $testimonial->content,      // Use the existing feedback if not provided
            'client_image_url' => $validated['client_image_url'] ?? $testimonial->client_image_url, // Update the image path if available
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Testimonial updated successfully',
        ], 200); // JSON response for AJAX
    }



    // Delete a testimonial
    public function destroy($id)
    {
        if (Session::has('LoggedIn')) {
            $testimonial = Testimonial::findOrFail($id);

            // Delete the image file if it exists
            if ($testimonial->client_image_url && file_exists(public_path($testimonial->client_image_url))) {
                unlink(public_path($testimonial->client_image_url)); // Delete the old image
            }

            // Delete the testimonial
            $testimonial->delete();
            return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'You must log in first');
        }
    }

    // Bulk delete testimonials
    public function bulkDelete(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $validated = $request->validate([
                'ids' => 'required|array',
                'ids.*' => 'exists:testimonials,id',
            ]);

            foreach ($validated['ids'] as $id) {
                $testimonial = Testimonial::findOrFail($id);

                // Delete the image file if it exists
                if ($testimonial->client_image_url && file_exists(public_path($testimonial->client_image_url))) {
                    unlink(public_path($testimonial->client_image_url)); // Delete the old image
                }

                $testimonial->delete();
            }

            return redirect()->route('testimonials.index')->with('success', 'Selected testimonials deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'You must log in first');
        }
    }
}
