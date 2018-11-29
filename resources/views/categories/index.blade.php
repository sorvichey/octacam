@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Category List&nbsp;&nbsp;
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Name</th>
                                <th>Order &numero;</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($categories as $cat)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <a href="{{url('admin/category/detail/'.$cat->id)}}">
                                        {{$cat->name}}
                                    </a>
                                </td>
                                <td>{{$cat->order}}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{url('/admin/category/edit/'.$cat->id)}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table><br>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection