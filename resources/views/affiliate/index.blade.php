@extends('layout')

@section('header')
    <section class="content-header">
      <h1>
        Affiliate Management <small>all affiliates</small>
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
                <a class="btn btn-info btn-flat btn-large pull-right" href="{{ URL::to('admin/affiliate/add') }}" style="margin-bottom: 15px;">Add New Affiliate</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">All affiliates</div>
                </div>

                <div class="box-body">
                    <table id="list-table" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Charity Percentage</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($affiliates as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->charity_commision }}%</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li>
                                                <a href="{{ URL::to('admin/affiliate/'.$item->id) }}"><i class="fa fa-pencil"></i> Edit</a> 
                                            </li>
                                            <li>
                                                <a class="text-red" href="{{ URL::to('admin/affiliate/delete/'.$item->id) }}"><i class="fa fa-trash"></i> Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
