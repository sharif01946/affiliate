@extends('layout')

@section('header')
    <section class="content-header">
      <h1>
        <b>{{ $charity->name }}</b> <small>Group by <b>{{$group}}</b></small>
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
                <a class="btn btn-info btn-flat btn-large pull-left" href="{{ URL::to("admin/earnings/charities") }}" style="margin-bottom: 15px;">Back</a>
                <a class="btn btn-info btn-flat btn-large pull-left" href="{{ URL::to("admin/earnings/charities/".$charity->id."/groupby/affiliate") }}" style="margin-bottom: 15px;margin-left: 15px;">Affiliate View</a>
                <a class="btn btn-info btn-flat btn-large pull-left" href="{{ URL::to("admin/earnings/charities/".$charity->id."/groupby/campaign") }}" style="margin-bottom: 15px;margin-left: 15px;">Campaign View</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title"><b>{{ $charity->name }}/{{ $group }}</b> Earnings Details</div>
                </div>

                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Campaign Name</th>
                                <th>Affiliate Name</th>
                                <th>Click</th>
                                <th>Sales</th>
                                <th>Lead</th>
                                <th>Impression</th>
                                <th>Charity Amount</th>
                                <th>User Amount</th>
                                <th>Actual Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($charity->commisions as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->campaign->name }}</td>
                                    <td>{{ $item->affiliate->name }}</td>
                                    <td>{{ $item->click }}</td>
                                    <td>{{ $item->sales }}</td>
                                    <td>{{ $item->lead }}</td>
                                    <td>{{ $item->impression }}</td>
                                    <td>{{ $item->donate_amount }}</td>
                                    <td>{{ $item->user_amount }}</td>
                                    <td>{{ $item->amount }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th></th>
                                <th></th>
                                <th>Total = {{ $charity->commisions()->sum("click") }}</th>
                                <th>Total = {{ $charity->commisions()->sum("sales") }}</th>
                                <th>Total = {{ $charity->commisions()->sum("lead") }}</th>
                                <th>Total = {{ $charity->commisions()->sum("impression") }}</th>
                                <th>Total = {{ $charity->commisions()->sum("donate_amount") }}</th>
                                <th>Total = {{ $charity->commisions()->sum("user_amount") }}</th>
                                <th>Total = {{ $charity->commisions()->sum("amount") }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
