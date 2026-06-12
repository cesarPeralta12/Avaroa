<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use App\Traits\General;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Tools\Repositories\Crud;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BlogCategoryController extends Controller
{
    use General;

    protected $model;
    public function __construct(BlogCategory $category)
    {
        $this->model = new Crud($category);
    }

    public function index()
    {
        if (Session::has('LoggedIn')) {


            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();

            $data['title'] = 'Manage Blog Category';
            $data['navBlogActiveClass'] = "mm-active";
            $data['subNavBlogCategoryIndexActiveClass'] = "mm-active";
            $data['blogCategories'] = BlogCategory::all();
            return view('admin.blog.category-index', $data);
        }
    }

    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
        ]);

        $slug = getSlug($request->name);

        if (BlogCategory::where('slug', $slug)->count() > 0) {
            $slug = getSlug($request->name) . '-' . rand(100000, 999999);
        }
        $data = [
            'name' => $request->name,
            'slug' => $slug,
            'status' => $request->status,
        ];

        $this->model->create($data); // create new blog


        return redirect()->back()->with('Created Successful');
    }

    public function update(Request $request, $uuid)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'status' => $request->status,
        ];

        $this->model->updateByUuid($data, $uuid); // update category

        return redirect()->back()->with('Updated Successful');
    }


    // Method to handle bulk delete
    public function bulkDeleteBlogCategory(Request $request)
    {
        // Validate the request to ensure selected_ids are present
        $request->validate([
            'selected_ids' => 'required|array',
            'selected_ids.*' => 'exists:blog_categories,uuid', // Adjust based on your table structure
        ]);

        // Delete the categories using the provided UUIDs
        BlogCategory::whereIn('uuid', $request->selected_ids)->delete();

        // Flash a success message
        Session::flash('success', __('Blog categories deleted successfully.'));

        // Redirect back to the previous page
        return redirect()->back();
    }

    // Method to handle individual delete
    public function delete($uuid)
    {
        // Find the category by UUID and delete it
        $category = BlogCategory::where('uuid', $uuid)->firstOrFail();
        $category->delete();

        // Flash a success message
        Session::flash('success', __('Blog category deleted successfully.'));

        // Redirect back to the previous page
        return redirect()->back();
    }
}
