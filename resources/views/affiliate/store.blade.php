@extends('layout')

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
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Enter Affiliate Info</div>
            </div>
            <form role="form" method="post">
                 {{ csrf_field() }}
                <div class="box-body">


                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="cname">Affiliate Name</label>
                                <input type="text" class="form-control" name="name" id="cname" placeholder="Type in your charity name" value="{{ $item->name }}" required>
                            </div>  
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="curl">Charity Percentage</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="charity_commision" id="charity_commision" placeholder="50" value="{{ $item->charity_commision }}">
                                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
