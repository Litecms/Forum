@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('forum::category.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('forum::category.names') !!}</small>
@stop

@section('title')
{!! trans('forum::category.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('forum::category.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='category-category-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="category-category-list" class="table table-striped table-bordered data-table">
    <thead  class="list_head">
        <th>{!! trans('forum::category.label.name')!!}</th>
        <th>{!! trans('forum::category.label.status')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[name]')->raw()!!}</th>
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
    app.load('#category-category-entry', '{!!trans_url('admin/forum/category/0')!!}');
    oTable = $('#category-category-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/forum/category') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#category-category-list .search_bar input, #category-category-list .search_bar select').each(
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
            {data :'name'},
                    {data :'status'},
        ],
        "pageLength": 25
    });

    $('#category-category-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#category-category-list').DataTable().row( this ).data();

        $('#category-category-entry').load('{!!trans_url('admin/forum/category')!!}' + '/' + d.id);
    });

    $("#category-category-list .search_bar input").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
    $("#category-category-list .search_bar select").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

