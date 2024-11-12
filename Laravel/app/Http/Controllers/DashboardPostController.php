<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // return view('posts', ['title' => 'All Posts' . $title, 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(6)->withQueryString()]);

    return view("dashboard.posts.index", [
      'title' => "My Post",
      'posts' => Post::where('author_id', Auth::user()->id)->filter(request(['search']))->latest()->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.posts.createPost', [
      'categories' => Category::all()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'title' => 'required|max:255',
      'category_id' => 'required',
      'slug' => 'required|unique:posts',
      'image' => 'image|file|max:5120',
      'body' => 'required'
    ]);

    if ($request->file('image')) {
      $validatedData['image'] = $request->file('image')->store('post-images');
    }

    $validatedData['body'] = strip_tags($request->body);

    $request->user()->posts()->create($validatedData);

    return redirect('/dashboard/posts')->with('success', 'New post has been added!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    if ($post->author->id !== Auth::user()->id) {
      abort(403);
    }

    return view('dashboard.posts.showPostDetail', [
      'post' => $post
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    if ($post->author->id !== Auth::user()->id) {
      abort(403);
    }

    return view('dashboard.posts.editPost', [
      'post' => $post,
      'categories' => Category::all()
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Post $post)
  {
    $rules = [
      'title' => 'required|max:255',
      'category_id' => 'required',
      'image' => 'image|file|max:5120',
      'body' => 'required'
    ];


    if ($request->slug != $post->slug) {
      $rules['slug'] = 'required|unique:posts';
    }

    $validatedData = $request->validate($rules);

    if ($request->file('image')) {
      if ($post->image) {
        Storage::delete($post->image);
      }
      $validatedData['image'] = $request->file('image')->store('post-images');
    }

    $validatedData['body'] = strip_tags($request->body);

    $request->user()->posts()->where('id', $post->id)->update($validatedData);

    return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post)
  {
    if ($post->image) {
      Storage::delete($post->image);
    }

    Post::destroy($post->id);

    return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

    return response()->json(['slug' => $slug]);
  }
}
