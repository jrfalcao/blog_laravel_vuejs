@extends('layouts.base')

@section('content')
  <Sidebar itens="{{ json_encode((object)config('pages-url.sidebarItens')) }}" page="{{ $page_name }}"></Sidebar>

  <div id="content">
    <Navbar itens="{{ json_encode((object)config('pages-url.navbarItens')) }}"></Navbar>
    @include('layouts.shared.flash-message')

    <div class="container-fluid">
      <div class="div-content">
        <form action="{{ route('edit_category') }}" method="POST" class="">
          @csrf
          <input type="hidden" value="{{ $category->id }}" name="id">
          <div class="card">
            <div class="card-header bg-site-color">{{ $page_name }}</div>
            <div class="card-body">
              <div class="form-group">
                <label for="name">Nome</label>
                <input value="{{NULL !== $category->name ? $category->name : ''}}" type="text" class="form-control" id="name" name="name">
              </div>            
              <label for="description">Descrição</label>
              <div class="form-group">
                <textarea class="form-control" name="description" id="description" cols="70" rows="3">{{NULL !== $category->description ? $category->description : ''}}</textarea>
              </div>
            </div>
            <div class="card-footer d-flex">
              <div class="col-12 text-right">
                <button type="submit">Atualizar</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection
