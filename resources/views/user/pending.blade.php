@extends('layout')

@section('after_scripts')
<script>
    function update_pending(id) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '{{ URL::to("admin/users/pending/update") }}',
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
        Affiliate Management <small>all affiliates</small>
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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">All affiliates</div>
                </div>

                <div class="box-body">
                    <table id="list-table" class="table">
                        <thead>
                            <tr>
                                 <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr id="item-row-{{ $item->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li>
                                                <a class="text-green" href="#" onclick="update_pending({{ $item->id }})"><i class="fa fa-check"></i> Approve</a> 
                                            </li>
                                            <li>
                                                <a class="text-red" href="{{ URL::to('admin/affiliate/delete/'.$item->id) }}"><i class="fa fa-trash"></i> Delete</a>
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
