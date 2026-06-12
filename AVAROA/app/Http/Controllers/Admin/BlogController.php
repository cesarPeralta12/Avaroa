<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\BlogTag;
use App\Models\Tag;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use General, ImageSaveTrait, SendNotification;

    protected $model;

    public function __construct(Blog $blog)
    {
        $this->model = new Crud($blog);
    }

    // Like increment (AJAX)
    public function incrementLike($id)
    {
        $blog = Blog::find($id);

        if ($blog) {
            $blog->increment('like_count');
            return response()->json([
                'success' => true,
                'like_count' => $blog->like_count
            ]);
        }

        return response()->json(['success' => false], 404);
    }

    public function index()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('admin.login');
        }

        $data['user_session'] = User::find(Session::get('LoggedIn'));
        $data['title'] = 'Manage Blog';
        $data['blogs'] = Blog::all();

        return view('admin.blog.index', $data);
    }

    public function create()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('admin.login');
        }

        $data['user_session'] = User::find(Session::get('LoggedIn'));
        $data['title'] = 'Create Blog';
        $data['blogCategories'] = BlogCategory::all();
        $data['tags'] = Tag::all();

        return view('admin.blog.create', $data);
    }

    // Fixed: Accept Request first, then process
    public function store(Request $request)
    {
        // Generate unique slug
        $slug = $request->slug;
        if (Blog::where('slug', $slug)->exists()) {
            $slug = $request->slug . '-' . rand(100000, 999999);
        }

        $image = null;
        if ($request->hasFile('image')) {
            $image = $this->saveImage('blog', $request->file('image'), 800, 500); // using trait
            // Or use manual upload if you don't want trait:
            // $image = $this->uploadImageManual($request->file('image'), 'blog');
        }

        $data = [
            'title' => $request->title,
            'slug' => $slug,
            'user_id' => auth()->id() ?? $request->user_id,
            'short_description' => $request->short_description,
            'details' => $request->details,
            'image' => $image ?? '',
            'blog_category_id' => $request->blog_category_id,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'status' => 1, // or $request->status
        ];

        if ($request->hasFile('og_image')) {
            $data['og_image'] = $this->saveImage('meta', $request->file('og_image'), 1200, 630);
        }

        $blog = Blog::create($data);

        // Send notification
        $text = 'A new blog has been posted on the platform.';
        $target_url = url('blog_details', ['slug' => $slug]);
        // $this->sendForApi($text, 2, $target_url, $blog->user_id, $blog->user_id);

        // Attach tags
        // if ($request->filled('tag_ids')) {
        //     foreach ($request->tag_ids as $tag_id) {
        //         BlogTag::create([
        //             'blog_id' => $blog->id,
        //             'tag_id' => $tag_id
        //         ]);
        //     }
        // }

        return back()->with('success', 'Blog created successfully.');
    }

    public function edit($uuid)
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('admin.login');
        }

        $data['user_session'] = User::find(Session::get('LoggedIn'));
        $data['title'] = 'Edit Blog';
        $data['blog'] = $this->model->getRecordByUuid($uuid);
        $data['blogTags'] = $data['blog']->tags->pluck('tag_id')->toArray();
        $data['blogCategories'] = BlogCategory::all();
        $data['tags'] = Tag::all();

        return view('admin.blog.edit', $data);
    }

    // Fixed: Request $request first, then $uuid
    public function update(Request $request, $uuid)
    {
        $blog = $this->model->getRecordByUuid($uuid);

        $image = $blog->image;
        if ($request->hasFile('image')) {
            $this->deleteFile($blog->image); // from trait
            $image = $this->saveImage('blog', $request->file('image'), 800, 500);
        }

        $slug = $request->slug;
        if ($slug !== $blog->slug && Blog::where('slug', $slug)->where('uuid', '!=', $uuid)->exists()) {
            $slug = $request->slug . '-' . rand(100000, 999999);
        }

        $data = [
            'title' => $request->title,
            'slug' => $slug,
            'short_description' => $request->short_description,
            'details' => $request->details,
            'blog_category_id' => $request->blog_category_id,
            'image' => $image,
            'status' => $request->status ?? $blog->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

        if ($request->hasFile('og_image')) {
            if ($blog->og_image) $this->deleteFile($blog->og_image);
            $data['og_image'] = $this->saveImage('meta', $request->file('og_image'), 1200, 630);
        }

        $this->model->updateByUuid($data, $uuid);

        // // Sync tags
        // BlogTag::where('blog_id', $blog->id)->delete();
        // if ($request->filled('tag_ids')) {
        //     foreach ($request->tag_ids as $tag_id) {
        //         BlogTag::create([
        //             'blog_id' => $blog->id,
        //             'tag_id' => $tag_id
        //         ]);
        //     }
        // }

        return back()->with('success', 'Blog updated successfully.');
    }

    public function delete($uuid)
    {
        $blog = $this->model->getRecordByUuid($uuid);

        BlogTag::where('blog_id', $blog->id)->delete();
        $this->deleteFile($blog->image);
        if ($blog->og_image) $this->deleteFile($blog->og_image);

        $this->model->deleteByUuid($uuid);

        return redirect()->back()->with('success', 'Blog has been deleted');
    }

    // Other methods remain the same...
    public function blogCommentList()
    {
        if (!Session::has('LoggedIn')) return redirect()->route('admin.login');

        $data['user_session'] = User::find(Session::get('LoggedIn'));
        $data['title'] = 'Blog Comments';
        $data['navBlogParentActiveClass'] = 'mm-active';
        $data['subNavBlogCommentListActiveClass'] = 'mm-active';
        $data['comments'] = BlogComment::paginate(25);

        return view('admin.blog.comment-list', $data);
    }

    public function changeBlogCommentStatus(Request $request)
    {
        $comment = BlogComment::findOrFail($request->id);
        $comment->status = $request->status;
        $comment->save();

        return response()->json(['data' => 'success']);
    }

    public function blogCommentDelete($id)
    {
        $comment = BlogComment::findOrFail($id);
        BlogComment::where('parent_id', $id)->delete();
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted');
    }

    public function bulkDeleteComments(Request $request)
    {
        $ids = $request->input('selected_ids', []);
        if (empty($ids)) {
            return response()->json(['message' => 'No comments selected.'], 400);
        }

        BlogComment::whereIn('id', $ids)->delete();
        return response()->json(['message' => 'Selected comments deleted.']);
    }

    public function bulkDelete(Request $request)
    {
        $selectedIds = $request->input('selected_ids', []);
        if (!$selectedIds) {
            return redirect()->back()->with('error', 'No blogs selected.');
        }

        Blog::whereIn('uuid', $selectedIds)->delete();
        return redirect()->back()->with('success', 'Selected blogs deleted.');
    }
}
