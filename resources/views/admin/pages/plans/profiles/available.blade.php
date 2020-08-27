@extends('adminlte::page')

@section('title', 'all available profiles')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">plans</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.profiles',$plan->id)}}">profiles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Available profiles for {{$plan->name}}</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-black">
            <form method="get" action="{{route('plans.profiles.available',$plan->id)}}">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control-sm border"
                               value="{{request()->search}}" placeholder="search">
                        <button type="submit" class="btn btn-primary btn-sm border"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if($profiles->count() > 0)
                <form action="{{route('plans.profiles.attach',$plan->id)}}" method="POST">
                    @csrf
                    @method('post')
                    <div class="form">
                        <div class="form-md-6">

                               @foreach ($profiles as $profile)
                                   <div class="form-group">
                                       <input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
                                       <strong>{{ $profile->name }}</strong>
                                   </div>
                               @endforeach

                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm">save</button>
                    </div>
                </form>
                @include('incs.pag',['data' => $profiles])
            @else
                <h6 class="text-center text-danger">no profiles available </h6>
            @endif
        </div>
        <div class="card-footer bg-black">
        </div>
    </div>

@stop
