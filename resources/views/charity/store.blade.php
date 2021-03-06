@extends('layout')

@section('header')
    <section class="content-header">
      <h1>
        Charity Management<small></small>
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
        <div class="menu-holder">
            <a class="btn btn-info btn-flat btn-large pull-right" href="{{ url('admin/charity') }}" style="margin-bottom: 15px;">All Charitiies</a>
        </div>
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
                <div class="box-title">Enter Charity Info</div>
            </div>
            <form role="form" method="post">
                 {{ csrf_field() }}
                <div class="box-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cname">Charity Name</label>
                                <input type="text" class="form-control" name="name" id="cname" placeholder="Type in your charity name" value="{{ $item->name }}" required>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="charity-name">Charity Category</label>
                                <select name="group_id" id="charity-name" class="form-control">
                                    @foreach ($groups as $ch)
                                        <option value="{{ $ch->id }}" {{ $item->id == $ch->group_id ? "selected":"" }}>{{ $ch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="cdescription">Charity Description</label>
                            <textarea class="form-control" name="charity_description" id="cdescription" cols="30" rows="3">{{ $item->charity_description }}</textarea>
                        </div>

                    <div class="form-group">
                        <label for="bank-name">Bank Name</label>
                        <input type="text" class="form-control" name="bank_name" id="bank-name" placeholder="Bank name" value="{{ $item->bank_name }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="bank-address">Bank Address</label>
                        <input type="text" class="form-control" name="bank_address" id="bank-address" placeholder="Bank Address" value="{{ $item->bank_address }}">
                    </div>

                    <div class="form-group">
                        <label for="bank-swift">Swift Code</label>
                        <input type="text" class="form-control" name="bank_swift" id="bank-swift" placeholder="Swift Code" value="{{ $item->bank_swift }}">
                    </div>

                    <div class="form-group">
                        <label for="bank-account">Bank Account</label>
                        <input type="text" class="form-control" name="bank_account" id="bank-account" placeholder="Bank Account" value="{{ $item->bank_account }}">
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
