<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $model;
    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function index()
    {
        return view('post.index', [
            'posts' => $this->model->get(),
        ]);
    }

    public function store(Request $request)
    {

        $this->model->create($request->all());

        return back()->with('success', 'Post has been created');
    }

    public function destroy($id)
    {
        $post = $this->model->findOrFail($id);
        $post->delete();
        return back()->with('success', 'Post has been deleted');
    }
}
