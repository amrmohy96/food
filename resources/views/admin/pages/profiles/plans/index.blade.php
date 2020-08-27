@extends('adminlte::page')

@section('title', 'plans for / '.$profile->name)

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">profiles</a></li>
            <li class="breadcrumb-item active" aria-current="page">plans for {{$profile->name}}</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-black">
        </div>
        <div class="card-body">
            @if($plans->count() > 0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><i class="fab fa-hackerrank fa-1x"></i></th>
                        <th><i class="fab fa-product-hunt fa-1x"></i> Name</th>
                        <th width="250"><i class="fas fa-pen fa-1x"></i> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($plans as $index=>$plan)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$plan->name}}</td>
                            <td>
                                <a href="{{route('plans.profiles.detach',[$plan->id,$profile->id])}}" class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @include('incs.pag',['data' => $plans])
            @else
                <h6 class="text-center text-danger"> {{$profile->name}} not have plans.!</h6>
            @endif
        </div>
        <div class="card-footer bg-black">
        </div>
    </div>

@stop
