@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Detail Category&nbsp;&nbsp;
                    <a href="{{url('/admin/category')}}" class="btn btn-link btn-sm">Back To List</a> | 
                    <a href="{{url('/admin/category/edit/'.$category->id)}}" class="btn btn-link text-danger btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                </div>
                <div class="card-block">
                        <label for="title" class="control-label col-lg-6 col-sm-6">
                            <aside>Name</aside>
                            <h2 class="text-primary">{{$category->name}}</h2>
                        </label>
                    <div class="form-group row">
                        <label for="title" class="control-label col-lg-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header text-bold">
                                        <i class="fa fa-align-justify"></i> Sub Category List&nbsp;&nbsp;
                                        <a href="{{url('/admin/sub_category/create?category_id='.$category->id.'&'.'category_name='.$category->name)}}" class="btn btn-link btn-sm">New</a>
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
                                                @foreach($sub_categories as $cat)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>
                                                     
                                                            {{$cat->name}}
                                          
                                                    </td>
                                                    <td>{{$cat->order}}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="{{url('/admin/sub_category/edit/'.$cat->id)}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                <!--/.col-->
                            </div>
                          
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection