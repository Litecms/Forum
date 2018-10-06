@extends('resource.index')
@php
$links['create'] = guard_url('forum/category/create');
$links['search'] = guard_url('forum/category');
@endphp

@section('icon') 
<i class="pe-7s-display2"></i>
@stop

@section('title') 
{!! __('forum::category.title.main') !!}
@stop

@section('sub.title') 
{!! __('forum::category.title.list') !!}
@stop

@section('breadcrumb') 
  <li><a href="{!!guard_url('/')!!}">{{ __('app.home') }}</a></li>
  <li><a href="{!!guard_url('forum/category')!!}">{!! __('forum::category.name') !!}</a></li>
  <li>{{ __('app.list') }}</li>
@stop

@section('entry') 
<div id="entry-form">

</div>
@stop

@section('list')
    @include('forum::category.partial.list.' . $view, ['mode' => 'list'])
@stop

@section('pagination') 
    {!!$categories->links()!!}
@stop

@section('script')

@stop

@section('style')

@stop 
