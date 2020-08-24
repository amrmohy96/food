@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Plans</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-black">
            <form method="get" action="{{route('plans.index')}}">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control"
                               value="{{request()->search}}" placeholder="search">
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> search</button>
                        <a class="btn btn-sm btn-dark" href="{{route('plans.create')}}"><i class="fa fa-plus"></i> add</a>
                    </div>
                </div>
            </form>

        </div>
        <div class="card-body bg-gray-light">
            @if($plans->count() > 0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><i class="fab fa-hackerrank fa-1x"></i></th>
                        <th> <i class="fab fa-product-hunt fa-1x"></i>  Name</th>
                        <th><i class="fa fa-money-check fa-1x"></i> Price</th>
                        <th width="250;"><i class="fas fa-pen fa-1x"></i> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($plans as $index=>$plan)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$plan->name}}</td>
                            <td>$ {{number_format($plan->price,2,',','.')}}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{route('plans.show',$plan->url)}}"> <i class="fa fa-eye fa-1x"></i> show</a>
                                <a class="btn btn-sm btn-primary" href="{{route('plans.edit',$plan->url)}}"><i class="fa fa-edit fa-1x"></i> edit</a>
                                <form style="display: inline-block;" method="post"
                                      action="{{route('plans.destroy',$plan->url)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash fa-1x"></i> delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h6 class="text-center text-danger">no plans</h6>
            @endif
            <div class="card-footer">
                  {{-- append query to search --}}
                {{$plans->appends(request()->query())->links()}}
            </div>
        </div>
    </div>

@stop
