<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PortfolioController extends Controller
{
    public function getAllPortfolios()
    {
        try {
            $portfolios = PortfolioItem::all(); // Get all portfolios
            return response()->json([
                'success' => true,
                'data' => $portfolios
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch portfolios',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    // Fetch all portfolio items
    public function index()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $portfolios = PortfolioItem::all();

            return view('admin.portfolios.index', compact('portfolios', 'user_session'));
        } else {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }

    // Show a single portfolio item
    public function show($id)
    {
        if (Session::has('LoggedIn')) {
            $portfolioItem = PortfolioItem::findOrFail($id);
            return redirect()->route('portfolio.index')->with('success', 'Portfolio item retrieved successfully');
        } else {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }

    // Create a new portfolio item
    public function create()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            return view('admin.portfolios.create', compact('user_session'));
        } else {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }

    // Store a new portfolio item
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|url',
            'link' => 'nullable|url',
            'skills' => 'nullable|array', // Ensure skills is an array
        ]);

        // Check if skills are selected and convert them to a comma-separated string
        $skills = $request->has('skills') ? implode(',', $request->skills) : null;

        // Create the portfolio item
        $portfolioItem = PortfolioItem::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'project_link' => $request->link,  // Match the column name in the DB
            'skills' => $skills,  // Store the comma-separated string of skills
        ]);

        // Handle AJAX request
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Portfolio item created successfully',
                'data' => $portfolioItem
            ]);
        }

        // For non-AJAX requests
        return redirect()->route('portfolios.index')->with('success', 'Portfolio item created successfully');
    }


    // Show the edit form for a portfolio item
    public function edit($id)
    {
        if (Session::has('LoggedIn')) {
            $portfolioItem = PortfolioItem::findOrFail($id);
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            return view('admin.portfolios.edit', compact('portfolioItem','user_session'));
        } else {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }

    // Update the portfolio item
    public function update(Request $request, $id)
    {
        // Validate the input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|url',
            'link' => 'nullable|url',
            'skills' => 'nullable|array', // Ensure skills is an array
        ]);

        // Get the portfolio item
        $portfolioItem = PortfolioItem::findOrFail($id);

        // Convert skills array to a comma-separated string
        $skills = $request->has('skills') ? implode(',', $request->skills) : null;

        // Update the portfolio item
        $portfolioItem->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'project_link' => $request->link,  // Match the column name in the DB
            'skills' => $skills,  // Store the comma-separated string of skills
        ]);

        // Return success response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Portfolio item updated successfully',
                'data' => $portfolioItem
            ]);
        }

        return redirect()->route('portfolios.index')->with('success', 'Portfolio item updated successfully');
    }


    // Delete a portfolio item
    public function destroy($id)
    {
        if (Session::has('LoggedIn')) {
            $portfolioItem = PortfolioItem::findOrFail($id);
            $portfolioItem->delete();

            return redirect()->route('portfolios.index')->with('success', 'Portfolio item deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }

    // Bulk delete portfolio items
    public function bulkDelete(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $validated = $request->validate([
                'ids' => 'required|array',
                'ids.*' => 'exists:portfolio_items,id',
            ]);

            PortfolioItem::whereIn('id', $validated['ids'])->delete();

            return redirect()->route('portfolios.index')->with('success', 'Selected portfolio items deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
}
