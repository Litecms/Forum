@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('forum::forum.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('forum::forum.names') !!}</small>
@stop

@section('title')
{!! trans('forum::forum.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('forum::forum.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='forum-forum-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="forum-forum-list" class="table table-striped table-bordered data-table">
    <thead  class="list_head">        
        <th>{!! trans('forum::forum.label.title')!!}</th>
        <th>{!! trans('forum::forum.label.category')!!}</th>
        <th>{!! trans('forum::forum.label.published')!!}</th>
        <th>{!! trans('forum::forum.label.status')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[title]')->raw()!!}</th>
        <th>{!! Form::select('search[category_id]')
                -> options(['' => 'All'] + Forum::categories())
                ->raw()!!}
        </th>
        <th>{!! Form::select('search[published]')
                ->options(['' => 'All', 'No' => 'Pending','Yes' => 'Published'])
                ->raw()!!}
        </th>
        <th>{!! Form::select('search[status]')
                ->options(['' => 'All', 'Hide' => 'Hide','Show' => 'Show'])
                ->raw()!!}
        </th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#forum-forum-entry', '{!!trans_url('admin/forum/forum/0')!!}');
    oTable = $('#forum-forum-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/forum/forum') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#forum-forum-list .search_bar input, #forum-forum-list .search_bar select').each(
                function(){
                    aoData.push( { 'name' : $(this).attr('name'), 'value' : $(this).val() } );
                }
            );
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },

        "columns": [
                   
                    {data :'title'},
                    {data :'category_id'},
                    {data :'published'},
                    {data :'status'},
        ],
        "pageLength": 25
    });

    $('#forum-forum-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#forum-forum-list').DataTable().row( this ).data();

        $('#forum-forum-entry').load('{!!trans_url('admin/forum/forum')!!}' + '/' + d.id);
    });

    $("#forum-forum-list .search_bar input").on('keyup select', function (e) {
        e.preventDefault();
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#forum-forum-list .search_bar select").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

