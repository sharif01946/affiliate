@extends('layout')

@section('header')
    <section class="content-header">
      <h1>
        Campaign Management <small>all campaigns</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="menu-holder">
                <a class="btn btn-info btn-flat btn-large pull-right" href="{{ url("admin/category/add") }}" style="margin-bottom: 15px;">Add New Category</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">All Category</div>
                </div>

                <div class="box-body">
                    <table id="list-table" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produc Categoty</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorys as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li>
                                                <a href=" {{ url('admin/category/'.$category->id) }}"><i class="fa fa-pencil"></i> Edit</a> 
                                            </li>
                                            <li>
                                                <a class="text-red" href="{{ URL::to('admin/campaign/delete/') }}"><i class="fa fa-trash"></i> Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach()    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
