<?php

namespace App\Services;

use App\Models\Post;
use DB;

class PostService
{
    public function getAll()
    {
        return Post::select('id', 'title', 'status', 'user_id', 'created_at', 'updated_at')
                    ->selectRaw('LEFT(content, 500) as content')        
                    ->paginate(3);
    }
    
    public function getById($id)
    {
        return Post::find($id);
    }

    public function getSearch($search)
    {
        var_dump($search);exit;
    }

    public function editPostView($post)
    {
        
    }

    public function deletePost($post_id)
    {
        try {
            $post = Post::find($post_id);
            $post->delete();
            return ['status' => 'success', 'message' => 'Artigo deletado com sucesso'];           
        } catch (\Throwable $th) {
            return ['status' => 'danger', 'message' => 'Erro ao tentar deletar artigo'];
        }
    }

    public function editPost($data)
    {
        try {
            $post = Post::find($data['id']);
            $post->title = $data['title'];
            $post->content = $data['content'];
            $post->status = $data['status'];
            $post->user_id = \Auth::user()->id;

            return ['status' => 'success', 'message' => 'Post Editado com sucesso'];
        } catch (\Throwable $th) {
            return ['status' => 'danger', 'message' => 'Erro ao editar postagem'];
        }
    }

    public function savePost($data)
    {
        try {

            $post = new Post;
            $post->title = $data['title'];
            $post->content = $data['content'];
            $post->status = $data['status'] === 'on' ? 1 : 0;
            $post->user_id = \Auth::user()->id;

            $post->save();

            if(count($data['categories']) > 0){
                $post->categories()->attach($data['categories']);
            }

            return ['status' => 'success', 'message' => 'Post cadastrado com sucesso'];
        } catch (\Throwable $th) {
            return ['status' => 'danger', 'message' => 'Erro ao cadastrar nova postagem:  ' . $th->getMessage()];
        }
    }
}
