@extends('layout')

@section('header')
    <section class="content-header">
      <h1>
        Affiliate Earnings
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
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Campaigns Summary</div>
                </div>

                <div class="box-body">
                     {{-- {{ CJ::ImportData() }}  --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Click</th>
                                <th>Sales</th>
                                <th>Lead</th>
                                <th>Impression</th>
                                <th>Donate Commission</th>
                                <th>User Commission</th>
                                <th>Total Commission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($affiliates as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->commisions()->sum("click") }}</td>
                                    <td>{{ $item->commisions()->sum("sales") }}</td>
                                    <td>{{ $item->commisions()->sum("lead") }}</td>
                                    <td>{{ $item->commisions()->sum("impression") }}</td>
                                    <td>{{ $item->commisions()->sum("donate_amount") }}</td>
                                    <td>{{ $item->commisions()->sum("user_amount") }}</td>
                                    <td>{{ $item->commisions()->sum("amount") }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li>
                                                <a href="{{ URL::to('admin/earnings/affiliates/details/'.$item->id) }}"><i class="fa fa-eye"></i> Details</a> 
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
