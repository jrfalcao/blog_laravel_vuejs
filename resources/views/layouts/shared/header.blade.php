@extends('layouts.base')

@section('content')
    <Sidebar itens="{{ json_encode((object)config('pages-url.sidebarItens')) }}" page="{{ $page_name }}"></Sidebar>

    <div id="content">
        <Navbar itens="{{ json_encode((object)config('pages-url.navbarItens')) }}"></Navbar>
