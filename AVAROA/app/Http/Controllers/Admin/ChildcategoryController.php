<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubcategoryController extends Controller
{
    use  General, ImageSaveTrait;

    protected $model;
    protected $categoryModel;

    public function __construct(Subcategory $subcategory, Category $category)
    {
        $this->model = new Crud($subcategory);
        $this->categoryModel = new Crud($category);
    }

    public function index()
    {

        if (Session::has('LoggedIn')) {

            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Manage Subcategory';
            $data['subcategories'] = Subcategory::all();
            return view('admin.subcategory.index', $data);
        }
    }
    public function childcategory()
    {

        if (Session::has('LoggedIn')) {

            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Manage Subcategory';
            $data['subcategories'] = Subcategory::where('category_id','!=', '0')->get();
            return view('admin.childcategory', $data);
        }
    }

    public function create()
    {

        if (Session::has('LoggedIn')) {

        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = 'Add Subcategory';
        $data['categories'] = $this->categoryModel->all();
        $data['subcategories'] = Subcategory::where('category_id','0')->get();
        return view('admin.subcategory.create', $data);
        }
    }

    public function store(Request $request)
    {
if(!empty($request->category_id)){
    $category = $request->category_id;
}else{
    $category = 0;
}

        $data = [
            'parent_category_id' => $request->parent_category_id,
            'category_id' =>$category ,
            'name' => $request->name,
            'slug' => getSlug($request->name),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

        if ($request->hasFile('og_image')) {
            $data['og_image'] = $this->saveImage('meta', $request->og_image, null, null);
        }

        $this->model->create($data); // create new category

        return back()->with('success','Succssfully');
    }

    public function edit($uuid)
    {

        if (Session::has('LoggedIn')) {

        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = 'Edit Subcategory';
        $data['subcategory'] = $this->model->getRecordByUuid($uuid);
        $data['subcategories'] = Subcategory::where('category_id','0')->get();
        $data['categories'] = $this->categoryModel->all();
        return view('admin.subcategory.edit', $data);
        }
    }

    public function update(Request $request, $uuid)
    {


        $data = [
            'parent_category_id' => $request->parent_category_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => getSlug($request->name),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

        if ($request->hasFile('og_image')) {
            $data['og_image'] = $this->saveImage('meta', $request->og_image, null, null);
        }
        $this->model->updateByUuid($data, $uuid); // update category


        return back()->with('success','Succssfully');
    }

    public function delete($uuid)
    {

        $this->model->deleteByUuid($uuid); // delete record


        return response()->json(['success' => true]);
    }
}
