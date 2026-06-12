<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function getSliders(Request $request)
    {
        try {
            // Fetch banners with only the required fields
            $banners = Banner::select('title1', 'link', 'image')
                ->get()
                ->map(function ($banner) {
                    // Prepend the base URL to the image path
                    $banner->image = url($banner->image);
                    return $banner;
                });

            return response()->json([
                'status' => 'success',
                'data' => $banners,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch sliders: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function index()
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $banners = Banner::all();
            return view('admin.banners.index', compact('banners', 'user_session'));
        }
    }

    public function create()
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            return view('admin.banners.create', compact('user_session'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title1' => 'required|string',
            'title2' => 'required|string',
            'title3' => 'required|string',
            'button' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('image')) {

            // Handle new image upload
            $attribute = $request->file('image');
            $destination = 'banners';

            // Generate unique filename
            $file_name = time() . '-' . Str::random(10) . '.' . $attribute->getClientOriginalExtension();
            // Move uploaded file to the destination directory
            $attribute->move(public_path('uploads/' . $destination), $file_name);
            // Update image path
            $image = 'uploads/' . $destination . '/' . $file_name;
        }

        Banner::create([
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'button' => $request->button,
            'link' => $request->link,
            'image' => $image,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner creado exitosamente');
    }

    public function edit($id)
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $banner = Banner::findOrFail($id);
            return view('admin.banners.edit', compact('banner', 'user_session'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title1' => 'required|string',
            'title2' => 'required|string',
            'title3' => 'required|string',
            'button' => 'required|string',
            'link' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        $banner->title1 = $request->title1;
        $banner->title2 = $request->title2;
        $banner->title3 = $request->title3;
 $banner->button = $request->button;
        $banner->link = $request->link;
        if ($request->hasFile('image')) {
            // Eliminar imagen antigua
            $oldImagePath = public_path($banner->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
 // Handle new image upload
            $attribute = $request->file('image');
            $destination = 'banners';

            // Generate unique filename
            $file_name = time() . '-' . Str::random(10) . '.' . $attribute->getClientOriginalExtension();
            // Move uploaded file to the destination directory
            $attribute->move(public_path('uploads/' . $destination), $file_name);
            // Update image path
            $image = 'uploads/' . $destination . '/' . $file_name;

            $banner->image = $image;
        }

        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Banner actualizado exitosamente');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Eliminar archivo de imagen asociado
        $imagePath = public_path('uploads/banners/' . $banner->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Eliminar el banner de la base de datos
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner eliminado exitosamente');
    }
    public function bulkDestroy(Request $request)
{
    try {
        $bannerIds = $request->input('banners'); // Array of banner IDs to delete

        if (empty($bannerIds)) {
            return redirect()->back()->with('fail', 'No se seleccionó ningún banner para eliminar.');
        }

        // Delete banners from the database
        Banner::whereIn('id', $bannerIds)->delete();

        return redirect()->back()->with('success', 'Banners eliminados con éxito.');
    } catch (\Exception $e) {
        \Log::error('Error deleting banners: ' . $e->getMessage());
        return redirect()->back()->with('fail', 'Error al eliminar los banners.');
    }
}

}
