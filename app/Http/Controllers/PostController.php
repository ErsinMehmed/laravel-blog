<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $posts = Post::when($request->search, function ($query) use ($request) {
            $query->where('title', 'LIKE', "%{$request->search}%");
        })
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name as category_name')
            ->orderBy('created_at', 'desc')
            ->paginate(4);

        return view('posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => date('Y-m-d H:i:s'),
            'image' => $imageName,
            'category_id' => $request->category,
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     *Display the specified resource.
     *
     * @param string $id
     * @return void
     */
    public function show(string $id)
    {
        $post = Post::with([
            'comments',
            'comments.user',
            'category'
        ])->where('id', $id)->first();


        return view('posts.show', compact('post'));
    }

    /**
     * Edit the specified resource.
     *
     * @param string $id
     * @return void
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return void
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = $post->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

            if ($post->image) {
                unlink(public_path('images/' . $post->image));
            }
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => date('Y-m-d H:i:s'),
            'image' => $imageName,
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
