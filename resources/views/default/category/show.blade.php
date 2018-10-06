@extends('resource.show')

@php
$links['back'] = guard_url('forum/category');
$links['edit'] = guard_url('forum/category') . '/' . $category->getRouteKey() . '/edit';
@endphp

@section('icon') 
<i class="pe-7s-display2"></i>
@stop

@section('title') 
{!! __('forum::category.title.main') !!}
@stop

@section('sub.title') 
{!! __('forum::category.title.show') !!}
@stop

@section('breadcrumb') 
  <li><a href="{!!guard_url('/')!!}">{{ __('app.home') }}</a></li>
  <li><a href="{!!guard_url('$forum/category')!!}">{!! __('forum::category.name') !!}</a></li>
  <li>{{ __('app.show') }}</li>
@stop

@section('tabs') 
@stop

@section('tools') 
    <a href="{!!guard_url('$forum/category')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
            <i class="fa fa-chevron-left"></i>
    </a>
@stop

@section('content') 
    @include('forum::category.partial.show', ['mode' => 'show'])
@stop
