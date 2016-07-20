<div class="box-header with-border">
    <h3 class="box-title"> Edit  {!! trans('forum::forum.name') !!} [{!!$forum->title!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#forum-forum-edit'  data-load-to='#forum-forum-entry' data-datatable='#forum-forum-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#forum-forum-entry' data-href='{{trans_url('admin/forum/forum')}}/{{$forum->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('cms.cancel') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#forum" data-toggle="tab">{!! trans('forum::forum.tab.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('forum-forum-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(trans_url('admin/forum/forum/'. $forum->getRouteKey()))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="forum">
                @include('forum::admin.forum.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>