@extends('layout')

@section('header')
    <section class="content-header">
      <h1>
        <b>{{ $user->name }}</b> <small>Earnings Details</small>
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
                <a class="btn btn-info btn-flat btn-large pull-left" href="{{ URL::to("admin/earnings/users") }}" style="margin-bottom: 15px;">Back</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Earning details</div>
                </div>

                <div class="box-body">
                     {{-- {{ CJ::ImportData() }}  --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Campaign Name</th>
                                <th>Charity Name</th>
                                <th>Click</th>
                                <th>Sales</th>
                                <th>Lead</th>
                                <th>Impression</th>
                                <th>Donate Commission</th>
                                <th>User Commission</th>
                                <th>Total Commission</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->commisions as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->campaign ? $item->campaign->product->name : "" }}</td>
                                    <td>{{ $item->campaign ? $item->campaign->name : "" }}</td>
                                    <td>{{ $item->charity ? $item->charity->name : "" }}</td>
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
                                <th></th>
                                <th>Total = {{ $user->commisions()->sum("click") }}</th>
                                <th>Total = {{ $user->commisions()->sum("sales") }}</th>
                                <th>Total = {{ $user->commisions()->sum("lead") }}</th>
                                <th>Total = {{ $user->commisions()->sum("impression") }}</th>
                                <th>Total = {{ $user->commisions()->sum("donate_amount") }}</th>
                                <th>Total = {{ $user->commisions()->sum("user_amount") }}</th>
                                <th>Total = {{ $user->commisions()->sum("amount") }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
