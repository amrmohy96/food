@extends('adminlte::page')

@section('title', 'show / '.$plan->url)

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Plans</a></li>
            <li class="breadcrumb-item active" aria-current="page">show</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="jumbotron">
                <h1 class="text-center">{{$plan->name}}</h1>
               <h2 class="text-center">${{number_format($plan->price,2,',','.')}} <span class="text-black-50"> /mo</span> </h2>
               <h4 class="text-center">{{$plan->description}}</h4>
            </div>
        </div>
    </div>

@stop
