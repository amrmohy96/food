@extends('adminlte::page')

@section('title', 'profiles for plan / '.$plan->name)

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">plans</a></li>
            <li class="breadcrumb-item active" aria-current="page">profiles for {{$plan->name}}</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-black">
            @if($profiles->count() == $allProfiles->count())
               <strong class="text-danger">{{$plan->name}}</strong> have all profiles
            @else
                <a href="{{route('plans.profiles.available',$plan->id)}}" class="btn btn-sm btn-danger border"> <i class="fa fa-plus "></i>Add</a>
            @endif
        </div>
        <div class="card-body">
            @if($profiles->count() > 0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><i class="fab fa-hackerrank fa-1x"></i></th>
                        <th><i class="fab fa-product-hunt fa-1x"></i> Name</th>
                        <th width="250"><i class="fas fa-pen fa-1x"></i> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profiles as $index=>$profile)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$profile->name}}</td>
                            <td>
                                <a href="{{route('plans.profiles.detach',[$plan->id,$profile->id])}}"
                                   class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @include('incs.pag',['data' => $profiles])
            @else
                <h6 class="text-center text-danger"> {{$plan->name}} not have profiles.!</h6>
            @endif
        </div>
        <div class="card-footer bg-black">
        </div>
    </div>

@stop
