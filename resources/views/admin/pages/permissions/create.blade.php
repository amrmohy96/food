@extends('adminlte::page')

@section('title', 'add-new-permission')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permissions</a></li>
            <li class="breadcrumb-item active" aria-current="page">add</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-black">
           <i class="fa fa-plus fa-1x" ></i> Add New permission.
        </div>
        <div class="card-body">
            <form method="post" action="{{route('permissions.store')}}">
                @csrf
                @method('post')
               @include('admin.pages.permissions.inc.form')
            </form>
        </div>
        <div class="card-footer bg-black"></div>
    </div>

@stop
