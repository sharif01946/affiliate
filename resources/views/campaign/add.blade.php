@extends('layout')

@section('header')
    <section class="content-header">
      <h1>
        Campaign Management<small></small>
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
</div>

<div class="row">
    <div class="col-md-12">
        <div class="menu-holder">
            <a class="btn btn-info btn-flat btn-large pull-right" href="{{ URL::to("admin/campaign") }}" style="margin-bottom: 15px;">All Campaigns</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Enter Campaign Info</div>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                 {{ csrf_field() }}
                <div class="box-body">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cname">Campaign Name</label>
                                <input type="text" class="form-control" name="name" id="cname" placeholder="Type in your Campaign name" value="{{old('name')}}" required>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="affiliate-name">Select Product</label>
                                <select name="product_id" id="affiliate-name" class="form-control" required>
                                    @foreach ($products as $aff)
                                        <option value="{{ $aff->id }}" {{ (old("product_id") == $aff->id ? "selected":"") }}>{{ $aff->name }}</option>
                                    @endforeach
                                </select>                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="affiliate-name">Select Category</label>
                                <select name="product_category" id="affiliate-name" class="form-control" required>
                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="curl">Campaign image</label>
                                <input type="file" class="form-control" name="image" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="curl">Campaign URL</label>
                                <input type="text" class="form-control" name="url" id="curl" placeholder="Will be created on update" disabled="">
                            </div>                            
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="curl">Campaign Description</label>
                                <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{old('description')}}</textarea>
                            </div>                            
                        </div>
                    </div>                    
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add Campaign</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
