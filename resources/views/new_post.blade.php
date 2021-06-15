@extends('layouts.base')

@section('content')
  <Sidebar itens="{{ json_encode((object)config('pages-url.sidebarItens')) }}" page="{{ $page_name }}"></Sidebar>

  <div id="content">
    <Navbar itens="{{ json_encode((object)config('pages-url.navbarItens')) }}"></Navbar>
    @include('layouts.shared.flash-message')

    <div class="container-fluid">
      <div class="div-content">
        <form action="{{ route('savePost') }}" method="POST" class="d-flex justify-content-around">
          @csrf
          <div class="form-left col-md-12 col-lg-9">
            <div class="form-group card">
              <div class="card-header bg-site-color">
                <label for="title">Título do Post</label>
              </div>
              <div class="card-body">
                <input type="text" class="form-control" id="title" name="title">
              </div>
            </div>
            <div class="form-group card">
              <div class="card-header bg-site-color">
                <label for="content">Conteúdo</label>
              </div>
            
              <editor name="content" api-key="{{ env('TYNI_API_KEY') }}" :init="{
                  height: 500,
                  plugins: [
                  'lists link image paste help wordcount preview anchor insertdatetime',
                  'searchreplace visualblocks code fullscreen media table'
                  ],
                  toolbar: 'undo redo | formatselect | bold italic backcolor | \
                  alignleft aligncenter alignright alignjustify | \
                  bullist numlist outdent indent | help'
                }" 
              />
            </div>
          </div>
          <div class="col-md-12 col-lg-3">
            <button class="btn btn-block btn-success mb-3">Salvar Postagem</button>
            <div class="card form-group">
              <div class="card-header bg-site-color">
                <label for="status">Status</label>
              </div>
              <div class="card-body">
                <p class="h4">
                  Publicar: 
                  <input class="form-control" type="checkbox" name="status" checked data-toggle="toggle" data-width="75">
                </p>
              </div>
            </div>
            
            <div class="card mb-2">
              <div class="card-header bg-site-color">
                <label for="categorias">Categorias</label>
              </div>
              <div class="card-body">
                <select class="form-control" name="categories[]" id="categories-select" multiple="multiple">
                  @foreach ($categories as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->name }}</option>                     
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
@endsection

@section('javascript')
  <script>
    $(document).ready(function() {
        $('#categories-select').multiselect({
          includeSelectAllOption: true,
          templates: {
              button: '<button type="button" class="multiselect dropdown-toggle btn btn-outline-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Marcar categorias</button>',
              popupContainer: '<div class="multiselect-container dropdown-menu col-12"></div>'
          }
        });
    });
  </script>
@endsection

@section('css')
  <style>
  </style>
@endsection