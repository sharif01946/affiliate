@extends('charity.layout')

@section('header')
    <section class="content-header">
      <h1>
        Affiliate Management
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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">All Affiliates</div>
                </div>

                <div class="box-body">
                    <table id="list-table" class="table">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($charity->commisions()->groupBy("affiliate_id")->get() as $item)
                                <tr>
                                    <td>{{ $item->affiliate->id }}</td>
                                    <td>{{ $item->affiliate->name }}</td>
                                    <td>{{ $item->affiliate->created_at }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li>
                                                <a href="{{ URL::to('affiliate/charity/'.$item->id) }}"><i class="fa fa-eye"></i> View</a> 
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
