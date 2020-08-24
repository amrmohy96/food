@extends('adminlte::page')

@section('title', 'edit '.$plan->url)

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Plans</a></li>
            <li class="breadcrumb-item active" aria-current="page">edit</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-black">
            <i class="fa fa-edit fa-1x" ></i>  Edit Plan.
        </div>
        <div class="card-body">
            <form method="post" action="{{route('plans.update',$plan->url)}}">
                @csrf
                @method('put')
                @include('admin.pages.plans.inc.form')
            </form>
        </div>
        <div class="card-footer bg-black">

        </div>
    </div>

@stop
