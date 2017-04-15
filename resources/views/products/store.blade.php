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
        <div class="menu-holder">
            <a class="btn btn-info btn-flat btn-large pull-right" href="{{ URL::to('admin/products') }}" style="margin-bottom: 15px;">All Products</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Enter Product Info</div>
            </div>
            <form role="form" method="post">
                 {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cname">Product Name</label>
                                <input type="text" class="form-control" name="name" id="cname" placeholder="Type in your Affiliate name" value="{{ $product->name }}" required>
                            </div>  
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="aff-net">Affiliate Network</label>
                                <select class="form-control" name="affiliate_id" id="aff-net">
                                    @foreach ($affiliates as $aitem)
                                        <option value="{{$aitem->id}}" {{ $aitem->id == $product->id ? "selected" : "" }}>{{$aitem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="curl">Product URL</label>
                                <input type="text" class="form-control" name="url" id="curl" placeholder="http://..." value="{{ $product->url }}">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" name="description" id="desc" cols="30" rows="3" placeholder="Product Description Here">{{ $product->description }}</textarea>
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
