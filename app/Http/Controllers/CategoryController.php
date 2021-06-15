<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct()
    {
        $this->categoryService = new \App\Services\CategoryService();
    }

    public function index()
    {
        return view('category', [
            'page_name' => 'Categorias', 
            'categories' => $this->categoryService->getAll()
        ]);
    }

    public function new_category()
    {
        return view('new_category', ['page_name' => 'Nova Categoria']);
    }
    
    public function edit_category($id)
    {
        $category = $this->categoryService->getById($id);
        return view('edit_category', ['page_name' => 'Editar Categoria', 'category' => $category]);
    }
    
    public function put_category(Request $request)
    {
        $result = $this->categoryService->edit_category($request->all());
        return redirect()->route('categories')->with($result['status'],$result['message']);; 
    }

    public function create_category(Request $request)
    {
        $result = $this->categoryService->create_category($request->all());
        return back()->with($result['status'],$result['message']);
    }

    public function delete_category($id)
    {
        $this->categoryService->delete_category($id);
        return redirect()->route('categories');
    }
}
