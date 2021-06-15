<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['sidebarItens'=>[
                ['url' => '/', 'value' => 'Home'],
                ['url' => '/newPost', 'value' => 'Novo Post'],
                ['url' => '/categorias', 'value' => 'Categorias']
            ],
            'navbarItens' => [
                ['url' => '/sobre', 'value' => 'Sobre Nós'],
                ['url' => '/contato', 'value' => 'Contato']
            ],
            'page' => 'Home']
        );
    }
}
