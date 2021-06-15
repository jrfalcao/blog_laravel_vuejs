<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getAll()
    {
        return Category::paginate(3);
    }
    
    public function getById($id)
    {
        return Category::find($id);
    }

    public function create_category($data)
    {
        $count = Category::where('name', $data['name'])->count();
        if($count > 0){
            return ['status' => 'danger', 'message' => 'Categoria já cadastrada'];
        }

        try {
            $cat = new Category;
            $cat->name = $data['name'];
            $cat->description = $data['description'];
            $cat->save();
            
            return ['status' => 'success', 'message' => 'Categoria cadastrada com sucesso'];
        } catch (\Throwable $th) {
            return ['status' => 'danger', 'message' => 'Erro ao cadastrar categoria'];
        }
    }

    public function delete_category($category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
    }

    public function edit_category($data)
    {
        try {
            $category = Category::find($data['id']);
            $category->name = $data['name'];
            $category->description = $data['description'];
            $category->save();
            return ['status' => 'success', 'message' => 'Categoria atualizada com sucesso'];
        } catch (\Throwable $th) {
            return ['status' => 'danger', 'message' => 'Erro ao atualizar categoria'];
        }
    }
}
