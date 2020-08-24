@extends('adminlte::page')

@section('title', 'add-new-plan')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Plans</a></li>
            <li class="breadcrumb-item active" aria-current="page">add</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-black">
           <i class="fa fa-plus fa-1x" ></i> Add New Plan.
        </div>
        <div class="card-body">
            <form method="post" action="{{route('plans.store')}}">
                @csrf
                @method('post')
               @include('admin.pages.plans.inc.form')
            </form>
        </div>
        <div class="card-footer bg-black"></div>
    </div>

@stop
