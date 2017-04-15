@extends('affiliate.layout')

@section('header')
    <section class="content-header">
      <h1>
        Campaigns</small>
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
                    <div class="box-title">All campaigns</div>
                </div>

                <div class="box-body">
                    <table id="list-table" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Charity Name</th>
                                <th>Charity Category</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($affiliate->campaigns as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->charity->name }}</td>
                                    <td>{{ $item->charity->group->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <!-- <ul class="list-inline">
                                            <li>
                                                <a href="{{ URL::to('affiliate/campaign/'.$item->id) }}"><i class="fa fa-eye"></i> View</a> 
                                            </li>
                                        </ul> -->
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
