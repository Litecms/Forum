<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.view') }}   {!! trans('forum::forum.name') !!}  [{!! $forum->title !!}]  </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-default btn-sm" data-action='NEW' data-load-to='#forum-forum-entry' data-href='{{trans_url('admin/forum/forum/create')}}'><i class="fa fa-times-circle"></i> New</button>
        @if($forum->id )
        @if($forum->published == 'Yes')
            <button type="button" class="btn btn-warning btn-sm" data-action="PUBLISHED" data-load-to='#forum-forum-entry' data-href="{{trans_url('admin/forum/forum/status/'. $forum->getRouteKey())}}" data-value="No" data-datatable='#forum-forum-list'><i class="fa fa-times-circle"></i> Suspend</button>
        @else
            <button type="button" class="btn btn-success btn-sm" data-action="PUBLISHED" data-load-to='#forum-forum-entry' data-href="{{trans_url('admin/forum/forum/status/'. $forum->getRouteKey())}}" data-value="Yes" data-datatable='#forum-forum-list'><i class="fa fa-check"></i> Published</button>
        @endif
        <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#forum-forum-entry' data-href='{{ trans_url('/admin/forum/forum') }}/{{$forum->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> Edit</button>
        <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#forum-forum-entry' data-datatable='#forum-forum-list' data-href='{{ trans_url('/admin/forum/forum') }}/{{$forum->getRouteKey()}}' >
        <i class="fa fa-times-circle"></i> Delete
        </button>
        @endif
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('forum::forum.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('forum-forum-show')
        ->method('POST')
        ->files('true')
        ->action(trans_url('admin/forum/forum'))!!}
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    @include('forum::admin.forum.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>