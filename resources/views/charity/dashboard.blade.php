@extends('charity.layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Clicks</span>
              <span class="info-box-number">{{ $total_click }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-envira"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Leads</span>
              <span class="info-box-number">{{ $total_lead }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Sales</span>
              <span class="info-box-number">{{ $total_sales }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-flag-checkered"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Impressions</span>
              <span class="info-box-number">{{ $total_impression }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-american-sign-language-interpreting"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Charities</span>
              <span class="info-box-number">{{ $charities->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-teal"><i class="fa fa-life-ring"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Campaigns</span>
              <span class="info-box-number">{{ $campaigns->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Affiliates</span>
              <span class="info-box-number">{{ $affiliates->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Charities Summary</div>
                </div>

                <div class="box-body">
                    <!--  CJ::ImportData()  -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Beneficiary Name</th>
                                <th>Category</th>
                                <th>Click</th>
                                <th>Sales</th>
                                <th>Lead</th>
                                <th>Impression</th>
                                <th>profit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($charities as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->beneficiary_name }}</td>
                                    <td>{{ $item->group->name }}</td>
                                    <td>{{ $item->commisioncharity->sum("click") }}</td>
                                    <td>{{ $item->commisioncharity->sum("sales") }}</td>
                                    <td>{{ $item->commisioncharity->sum("lead") }}</td>
                                    <td>{{ $item->commisioncharity->sum("impression") }}</td>
                                    <td>{{ $item->commisioncharity->sum("amount") }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Affiliate Summary Table</div>
                </div>

                <div class="box-body">
                    <!--  CJ::ImportData()  -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Click</th>
                                <th>Sales</th>
                                <th>Lead</th>
                                <th>Impression</th>
                                <th>Profit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($affiliates as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->commisions->sum("click") }}</td>
                                    <td>{{ $item->commisions->sum("sales") }}</td>
                                    <td>{{ $item->commisions->sum("lead") }}</td>
                                    <td>{{ $item->commisions->sum("impression") }}</td>
                                    <td>{{ $item->commisions->sum("amount") }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li>
                                                <a href="{{ URL::to('affiliate/commisions/'.$item->id) }}"><i class="fa fa-eye"></i> View</a> 
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
