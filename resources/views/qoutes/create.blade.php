@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New Qoute&nbsp;&nbsp;
                    <a href="{{url('/admin/qoute')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif

                    <form 
                    	action="{{url('/admin/qoute/save')}}" 
                    	class="form-horizontal" 
                    	method="post"
                    >
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-1">
                            	Qoute  <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-11 col-sm-11">
                                <input type="text" autofocus name="description" id="description" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="control-label col-lg-1 col-sm-1">
                            	Category
                            </label>
                            <div class="col-lg-11 col-sm-11">
                                <select name="category" class="form-control" id="category">
                                    <option value="Khmer">Khmer</option>
                                    <option value="English">English</option>
                                    <option value="French">French</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-danger" type="reset">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection