<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(3);

        return view('posts.index')->with('posts', $posts);
    }

    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post' => $post,
            'recent_posts' => Post::latest()->get()->except($post->id)->take(5)
        ]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('post-photos');
        }

        $request->validate([
            'title' => 'required|max:250',
            'short_content' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image|max:1024'
        ]);


        $post = DB::table('posts')->insert([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? null
        ]);
        return redirect()->route('posts.index');
    }
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    public function update(Request $request, Post $post)
    {

        if ($request->hasFile('photo')) {
            if (isset($post->photo)) {
                Storage::delete($post->photo);
            }
            $path = $request->file('photo')->store('post-photos');
        }

        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? $post->photo
        ]);
        return redirect()->route('posts.show', ['post' => $post->id]);

    }
    public function destroy(Post $post)
    {
        if(isset($post->photo)){
            Storage::delete($post->photo);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
