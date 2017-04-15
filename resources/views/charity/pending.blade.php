@extends('layout')

@section('after_scripts')
<script>
    function update_pending(id) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '{{ URL::to("admin/charity/pending/update") }}',
            type: 'POST',
            dataType: 'json',
            headers: { 'X-CSRF-Token' : token },
            data: {id: id},
        })
        .done(function(e) {
            $("#output").html(e.html);
            if(e.status){
                $("#item-row-"+id).remove();
            }
        })
        .fail(function(e) {
            $("#output").html('<div class="alert alert-danger">Problem to update this request</div>');
        });
    }
</script>
@endsection


@section('header')
    <section class="content-header">
      <h1>
        Charity Management <small>all charities</small>
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
            <div id="output"></div>
        </div>
        <div class="col-md-12">
            <div class="menu-holder">
                <a class="btn btn-info btn-flat btn-large pull-right" href="{{ URL::to('admin/charity/add') }}" style="margin-bottom: 15px;">Add Charitiy</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">All Charities</div>
                </div>

                <div class="box-body">
                    <table id="list-table" class="table">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($charities as $item)
                                <tr id="item-row-{{ $item->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->group->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li>
                                                <a class="text-green" href="#" onclick="update_pending({{ $item->id }})"><i class="fa fa-check"></i> Approve</a> 
                                            </li>
                                            <li>
                                                <a class="text-red" href="#"><i class="fa fa-trash"></i> Delete</a>
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
