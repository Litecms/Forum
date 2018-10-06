@extends('resource.index')
@php
$links['create'] = guard_url('forum/question/create');
$links['search'] = guard_url('forum/question');
@endphp

@section('icon') 
<i class="pe-7s-display2"></i>
@stop

@section('title') 
{!! __('forum::question.title.main') !!}
@stop

@section('sub.title') 
{!! __('forum::question.title.list') !!}
@stop

@section('breadcrumb') 
  <li><a href="{!!guard_url('/')!!}">{{ __('app.home') }}</a></li>
  <li><a href="{!!guard_url('forum/question')!!}">{!! __('forum::question.name') !!}</a></li>
  <li>{{ __('app.list') }}</li>
@stop

@section('entry') 
<div id="entry-form">

</div>
@stop

@section('list')
    @include('forum::question.partial.list.' . $view, ['mode' => 'list'])
@stop

@section('pagination') 
    {!!$questions->links()!!}
@stop

@section('script')

@stop

@section('style')

@stop 
