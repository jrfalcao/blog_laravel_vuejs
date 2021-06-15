@extends('layouts.base')

@section('content')
    <Sidebar itens="{{ json_encode((object)config('pages-url.sidebarItens')) }}" page="{{ $page_name }}"></Sidebar>

    <div id="content">
        <Navbar itens="{{ json_encode((object)config('pages-url.navbarItens')) }}"></Navbar>
        @include('layouts.shared.flash-message')

        <div class="container-fluid">
            @foreach ($posts as $item)
                <Post post="{{ json_encode($item) }}" />               
            @endforeach
            {{-- <div class="post">
                <h2>Collapsible Sidebar Using Bootstrap 4</h2>
                <p class="text-muted h6">-- criado por: Junior Falcão || Em 13/06/2021</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                
                <div class="butons d-flex justify-content-end">
                    <a href="" class="btn btn-primary btn-sm">Ver/Editar</a>
                    <button class="btn btn-danger btn-sm ml-2 post_delete">Excluir</button>
                </div>
                <div class="line"></div>
            </div> --}}

            {{ $posts->links() }}

        </div>

    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.post_delete', () => {
                const id = this.data('id')
                Swal.fire({
                    title: 'Quer deletar esta postagem?',
                    text: "Esta ação não poderá ser revertida!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Deletar postagem!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post('/delete_post', {id}, (data) => {
                            Swal.fire('Deletando Post!', data.message, data.status)
                        })
                    }
                })
            })
        })
    </script>
@endsection

@section('css')
    <style>
    </style>
@endsection
