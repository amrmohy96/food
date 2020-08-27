@extends('adminlte::page')

@section('title', 'show / '.$profile->id)

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Profiles</a></li>
            <li class="breadcrumb-item active" aria-current="page">show</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="jumbotron">
                <h1 class="text-center">{{$profile->name}}</h1>
               <h4 class="text-center">{{$profile->description}}</h4>
            </div>
        </div>
    </div>

@stop
