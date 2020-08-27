@extends('adminlte::page')

@section('title', 'edit/'.$detail->name)

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{route('plans.index')}}">Plans</a></li>
            <li class="breadcrumb-item "><a href="{{route('plans.show',$plan->url)}}">Show</a></li>
            <li class="breadcrumb-item "><a href="{{route('details.index',$plan->url)}}">Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card ">
        <div class="card-header bg-black">
            <i class="fa fa-edit fa-1x"></i> Edit Details.
        </div>
        <div class="card-body">
            <form method="post" action="{{route('details.update',[$plan->url,$detail->id])}}">
                @csrf
                @method('put')
                @include('admin.pages.plans.details.inc.form')
            </form>
        </div>
        <div class="card-footer bg-black"></div>
    </div>

@stop
