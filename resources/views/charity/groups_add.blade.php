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
</div>

<div class="row">
    <div class="col-md-12">
        <div class="menu-holder">
            <a class="btn btn-info btn-flat btn-large pull-right" href="{{ URL::to('admin/charity/groups') }}" style="margin-bottom: 15px;">All Groups</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Enter Group Info</div>
            </div>
            <form role="form" method="post">
                 {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="cname">Group Name</label>
                        <input type="text" class="form-control" name="name" id="cname" placeholder="Type in your charity name" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="cdescription">Group Description</label>
                        <textarea class="form-control" name="description" id="cdescription" cols="30" rows="3">{{old('description')}}</textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add Group</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
