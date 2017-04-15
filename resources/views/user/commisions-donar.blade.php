@extends('user.layout')

@section('header')
    <section class="content-header">
      <h1>
        Affiliate Management<small></small>
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
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    
    <div class="col-md-12">
        @if (Session::has('activity_msg_success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ Session::get('activity_msg_success') }}
            </div>
        @endif
    </div>

</div>

<div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Affiliate Commision Details</div>
                </div>

                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Commision ID</th>
                                <th>type</th>
                                <th>source</th>
                                <th>Commision Amount</th>
                                <th>Event Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->commisions as $c)
                                <tr>
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->commision_id }}</td>
                                    <td>{{ $c->type }}</td>
                                    <td>{{ $c->source }}</td>
                                    <td>{{ $c->user_amount }}</td>
                                    <td>{{ date("Y-m-d h:i:s",strtotime($c->event_date) ) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total = {{ $item->commisions->sum("user_amount") }}</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
