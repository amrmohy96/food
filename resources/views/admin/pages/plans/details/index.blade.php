@extends('adminlte::page')

@section('title', 'Details of Plan')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item " ><a href="{{route('plans.index')}}">Plans</a></li>
            <li class="breadcrumb-item " ><a href="{{route('plans.show',$plan->url)}}">{{$plan->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-black">
            <form method="get" action="{{route('plans.index')}}">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control-sm border"
                               value="{{request()->search}}" placeholder="search">
                        <button type="submit" class="btn btn-primary btn-sm border"><i class="fa fa-search"></i></button>
                        <a class="btn btn-sm border btn-dark" href="{{route('details.create',$plan->url)}}"><i class="fa fa-plus"></i></a>
                    </div>

                </div>
            </form>

        </div>
        <div class="card-body">
            @if($details->count() > 0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><i class="fab fa-hackerrank fa-1x"></i></th>
                        <th> <i class="fab fa-product-hunt fa-1x"></i>  Name</th>
                        <th width="350"><i class="fas fa-pen fa-1x"></i> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $index=>$detailPlan)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$detailPlan->name}}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{route('details.show',[$plan->url,$detailPlan->id])}}"> <i class="fa fa-show fa-1x"></i> show</a>
                                <a class="btn btn-sm btn-primary" href="{{route('details.edit',[$plan->url,$detailPlan->id])}}"> <i class="fa fa-edit fa-1x"></i> edit</a>
                                <form method="post" style="display: inline-block" action="{{route('details.destroy',[$plan->url,$detailPlan->id])}}">
                                    @csrf
                                    @method('delete')
                                   <button class="btn btn-danger btn-sm delete"> <i class="fa fa-trash"></i> delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @include('incs.pag',['data' => $details])
            @else
                <h6 class="text-center text-danger">no details for this plan</h6>
            @endif
        </div>
        <div class="card-footer bg-black">
        </div>
    </div>

@stop



