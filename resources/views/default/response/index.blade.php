@extends('resource.index')
@php
$links['create'] = guard_url('forum/response/create');
$links['search'] = guard_url('forum/response');
@endphp

@section('icon') 
<i class="pe-7s-display2"></i>
@stop

@section('title') 
{!! __('forum::response.title.main') !!}
@stop

@section('sub.title') 
{!! __('forum::response.title.list') !!}
@stop

@section('breadcrumb') 
  <li><a href="{!!guard_url('/')!!}">{{ __('app.home') }}</a></li>
  <li><a href="{!!guard_url('forum/response')!!}">{!! __('forum::response.name') !!}</a></li>
  <li>{{ __('app.list') }}</li>
@stop

@section('entry') 
<div id="entry-form">

</div>
@stop

@section('list')
    @include('forum::response.partial.list.' . $view, ['mode' => 'list'])
@stop

@section('pagination') 
    {!!$responses->links()!!}
@stop

@section('script')

@stop

@section('style')

@stop 
