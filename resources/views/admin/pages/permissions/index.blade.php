@extends('adminlte::page')

@section('title', 'Profiles')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Permissions</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-black">
            <form method="get" action="{{route('permissions.index')}}">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control-sm border"
                               value="{{request()->search}}" placeholder="search">
                        <button type="submit" class="btn btn-primary btn-sm border"><i class="fa fa-search"></i>
                        </button>
                        <a class="btn btn-sm btn-danger border" href="{{route('permissions.create')}}"><i
                                class="fa fa-plus"></i></a>
                    </div>
                </div>
            </form>

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

                                <a class="btn btn-sm btn-warning" href="{{route('permissions.show',$permission->id)}}"> <i
                                        class="fa fa-eye fa-1x"></i> show</a>
                                <a class="btn btn-sm btn-primary" href="{{route('permissions.edit',$permission->id)}}"><i
                                        class="fa fa-edit fa-1x"></i> edit</a>
                                <form style="display: inline-block;" method="post"
                                      action="{{route('permissions.destroy',$permission->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger delete btn-sm"><i class="fa fa-trash fa-1x"></i> delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @include('incs.pag',['data' => $permissions])
            @else
                <h6 class="text-center text-danger">no permissions</h6>
            @endif
        </div>
        <div class="card-footer bg-black">
        </div>
    </div>

@stop
