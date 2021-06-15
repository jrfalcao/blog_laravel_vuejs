@extends('layouts.base')

@section('content')
    <Sidebar itens="{{ json_encode((object)config('pages-url.sidebarItens')) }}" page="{{ $page_name }}"></Sidebar>

    <div id="content">
        <Navbar itens="{{ json_encode((object)config('pages-url.navbarItens')) }}"></Navbar>
        @include('layouts.shared.flash-message')

        <div class="container-fluid">
            @foreach ($posts as $item)
                {{--  --}}
                <p><Post post="{{ json_encode($item) }}" /></p>
            @endforeach
            
            <div class="col-12">
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
            </div>

        </div>

    </div>
    <Footer></Footer>
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
