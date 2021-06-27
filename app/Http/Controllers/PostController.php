<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Jenssegers\Mongodb\Eloquent;
use Jenssegers\Mongodb\Query\Builder;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $resultado = Post::find($id);
        return view('posts.postUnico', ['post' => $resultado]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required:max:120',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required:max:2200',
        ]);

        $image = $request->file('image');
        $imageName = time().$image->getClientOriginalName();
        $title = $request->get('title');
        $content = $request->get('content');

        $post = $request->user()->posts()->create([
            'title' => $title,
            'image' => 'img/' . $imageName,
            'content' => $content,
        ]);

        $request->image->move(public_path('img'), $imageName);
        return redirect()->route('post',['id' => $post->id]);
    }

    public function userPosts()
    {
        $user_id = Auth::id();
        $posts = Post::where('user_id', '=', $user_id)->get();
        return view('posts.index', compact('posts'));
    }

    public function eliminar($id)
    {
        $user_id = Auth::id();

        $posts = Post::find($id);
        $posts->delete();

        return redirect('posts/myPosts/');
    }
}