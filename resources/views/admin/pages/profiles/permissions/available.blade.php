@extends('adminlte::page')

@section('title', 'all permission')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Profiles</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">{{$profile->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Available Permissions</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-black">
            <form method="get" action="{{route('profiles.permissions.available',$profile->id)}}">
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
            @if($permissions->count() > 0)
                <form action="{{route('profiles.permissions.attach',$profile->id)}}" method="POST">
                    @csrf

                    <div class="form">
                        <div class="form-md-6">

                               @foreach ($permissions as $permission)
                                   <div class="form-group">
                                       <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                       <strong>{{ $permission->name }}</strong>
                                   </div>
                               @endforeach

                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm">save</button>
                    </div>
                </form>
                @include('incs.pag',['data' => $permissions])
            @else
                <h6 class="text-center text-danger">no permissions available </h6>
            @endif
        </div>
        <div class="card-footer bg-black">
        </div>
    </div>

@stop
