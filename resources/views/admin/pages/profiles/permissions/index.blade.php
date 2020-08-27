@extends('adminlte::page')

@section('title', 'permission for profile / '.$profile->name)

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Profiles</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$profile->name}} Permissions</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-black">
            <a class="btn btn-sm btn-danger border" href="{{route('profiles.permissions.available',$profile->id)}}"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="card-body">
            @if($permissions->count() > 0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><i class="fab fa-hackerrank fa-1x"></i></th>
                        <th><i class="fab fa-product-hunt fa-1x"></i> Name</th>
                        <th width="250"><i class="fas fa-pen fa-1x"></i> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $index=>$permission)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$permission->name}}</td>
                            <td>
                                <a href="" class="btn btn-danger">Test</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @include('incs.pag',['data' => $permissions])
            @else
                <h6 class="text-center text-danger">not have permissions</h6>
            @endif
        </div>
        <div class="card-footer bg-black">
        </div>
    </div>

@stop
