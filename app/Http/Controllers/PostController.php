<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;

    public function __construct()
    {
        $this->postService = new \App\Services\PostService();
    }

    public function index($search = null)
    {
        $posts = NULL === $search ? $this->postService->getAll() : $this->postService->getSearch($search);
        return view('home', [
            'page_name' => 'Home',
            'posts' => $posts
        ]);
    }
    
    public function newPost()
    {
        $categoryService = new \App\Services\CategoryService();
        return view('new_post', [
            'page_name' => 'Nova Postagem',
            'categories' => $categoryService->getAll()
        ]);
    }

    public function savePost(Request $request)
    {
        $result = $this->postService->savePost($request->all());
        return redirect()->back()->with($result['status'],$result['message']);
    }
    
    public function deletePost(Request $request)
    {
        return $this->postService->deletePost($request->id);
    }
}
