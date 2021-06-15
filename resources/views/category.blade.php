@extends('layouts.base')

@section('content')
    <Sidebar itens="{{ json_encode((object)config('pages-url.sidebarItens')) }}" page="{{ $page_name }}"></Sidebar>

    <div id="content">
        <Navbar itens="{{ json_encode((object)config('pages-url.navbarItens')) }}"></Navbar>
        @include('layouts.shared.flash-message')

        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="col">Listagem de categorias</div>
                    <div class="col text-right"><a href="{{ route('new_category') }}" class="btn btn-dark btn-sm">Criar Nova Categoria</a></div>                   
                </div>
                <div class="card-body d-flex">
                    <table class="table table-responsive table-striped table-bordered w-100 d-block d-md-table table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat)
                                <tr>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->description ? $cat->description : '' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('edit_category_view', ['id'=>$cat->id]) }}" class="btn btn-dark btn-sm" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{route('delete_category', ['id'=>$cat->id])}}" class="btn btn-danger btn-sm" title="Excluir">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $categories->links() }}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <style>
        .paginate { text-align: center }
    </style>
@endsection
