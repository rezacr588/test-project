<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Post::cursor()->all();
        $title = 'مدیریت اخبار';
        return view('Admin.posts.index',compact('posts','title'));
    }
    public function create(){
        $title = 'ایجاد خبر';
        return view('Admin.posts.create',compact('title'));
    }
    public function store(Request $request){
        $validate = $request->validate([
            'title' => 'required|min:30|unique:posts',
            'text' =>'required|min:400',
            'image' => 'required',
        ],[
            'title.required' => "لطفا عنوان پست را وارد کنید",
            'title.unique' => "عنوان وارد شده تکراری است",
            'title.min' => "تعداد کاراکتر ها از 30 پایین تر است",
            'text.required' => "متن پست را وارد کنید",
            'text.min' => "متن پست باید بیشتر از 400 حرف باشد",
            'image.required' => "لطفا تصویر را وارد کنید"
        ]);
        $newPost = new Post();
        $file = $request->file('image');
        $slug = Str::make_slug($request->title);
        $newPost->title = $request->title;
        $newPost->text = $request->text;
        $newPost->user_id = $request->user_id;
        $newPost->slug = $slug;
        $newPost->save();
        $post = Post::findOrFail($newPost->id);
        $image = new Image;
        $original = $file->getClientOriginalName();
        $size = $file->getSize();
        $mime = $file->getClientMimeType();
        $fake = verta()->formatDate() . $original;
        Storage::disk('public')->putFileAs('posts',$file,$fake);
        $image->original = $original;
        $image->fake = $fake;
        $image->size = $size;
        $image->type = $mime;
        $post->images()->save($image);
        $post->image_id = $image->id;
        $post->save();
        return redirect('admin/posts');
    }
    public function destroy(Post $post){
        $pic = $post->images()->whereId($post->image_id)->first();
        Storage::disk('public')->delete("posts/{$pic->fake}");
        $post->delete();
        return redirect('admin/posts');
    }
    public function edit(Post $post)
    {
        $title = "ویرایش پست شماره {$post->id}";
        return view('admin.posts.edit',compact('post','title'));
    }
    public function update(Request $request , Post $post){
        $validate = $request->validate([
            'title' => 'required|min:30|unique:posts,title,'.$post->id,
            'text' =>'required|min:400',
        ],[
            'title.required' => "لطفا عنوان پست را وارد کنید",
            'title.unique' => "عنوان وارد شده تکراری است",
            'title.min' => "تعداد کاراکتر ها از 30 پایین تر است",
            'text.required' => "متن پست را وارد کنید",
            'text.min' => "متن پست باید بیشتر از 400 حرف باشد",
        ]);
        $newPost = $post;
        $file = $request->file('image');
        $slug = Str::make_slug($request->title);
        $newPost->title = $request->title;
        $newPost->text = $request->text;
        $newPost->user_id = $request->user_id;
        $newPost->slug = $slug;
        $newPost->save();
        if($request->image !== null){
            $post = Post::findOrFail($newPost->id);
            $image = new Image;
            $original = $file->getClientOriginalName();
            $size = $file->getSize();
            $mime = $file->getClientMimeType();
            $fake = verta()->formatDate() . $original;
            Storage::disk('public')->putFileAs('posts',$file,$fake);
            $image->original = $original;
            $image->fake = $fake;
            $image->size = $size;
            $image->type = $mime;
            $post->images()->save($image);
            $post->image_id = $image->id;
            $post->save();
        }
        return redirect('admin/posts');
    }
}
