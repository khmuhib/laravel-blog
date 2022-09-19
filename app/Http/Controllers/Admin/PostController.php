<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PostRequest;

class PostController extends Controller
{
    public function index () {
        $posts = Post::all();
        $category = Category::where('status', '0')->get();
        return view('admin.post.index', compact('posts'));
    }
    public function create () {
        $categories = Category::where('status', '0')->get();
        return view('admin.post.create', compact('categories'));
    }

    public function store (PostRequest $request) {
        //dd($request->all());
        $data = $request->validated();

        $posts = new Post;

        $posts->name = $data['name'];
        $posts->slug = $data['slug'];
        $posts->description = $data['description'];
        $posts->yt_iframe = $data['yt_iframe'];
        $posts->meta_title = $data['meta_title'];
        $posts->meta_description = $data['meta_description'];
        $posts->meta_keyword = $data['meta_keyword'];
        $posts->status = $request->status == true ? '1':'0';
        $posts->created_by = Auth::user()->id;
        $posts->category_id = $data['category_id'];

        $posts->save();

        return redirect()->route('admin.post.list')->with('message', 'Post Inserted Successfully');



    }

    public function edit ($id) {

        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));

    }

    public function update(PostRequest $request, $id) {
        $data = $request->validated();

        $posts = Post::find($id);

        $posts->name = $data['name'];
        $posts->slug = $data['slug'];
        $posts->description = $data['description'];
        $posts->yt_iframe = $data['yt_iframe'];
        $posts->meta_title = $data['meta_title'];
        $posts->meta_description = $data['meta_description'];
        $posts->meta_keyword = $data['meta_keyword'];
        $posts->status = $request->status == true ? '1':'0';
        $posts->created_by = Auth::user()->id;
        $posts->category_id = $data['category_id'];

        $posts->update();

        return redirect()->route('admin.post.list')->with('message', 'Post Updated Successfully');

    }

    public function delete ($id) {
        $post = Post::find($id);
        if($post) {
            $post->delete();
            return redirect()->route('admin.post.list')->with('message', 'Post Deleted Successfully');
        }else {
            return redirect()->route('admin.post.list')->with('message', 'No Post Id Found');

        }

    }
}
