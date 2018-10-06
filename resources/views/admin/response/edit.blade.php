    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#response" data-toggle="tab">{!! trans('forum::response.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#forum-response-edit'  data-load-to='#forum-response-entry' data-datatable='#forum-response-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#forum-response-entry' data-href='{{guard_url('forum/response')}}/{{$response->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('forum-response-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('forum/response/'. $response->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="response">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('forum::response.name') !!} [{!!$response->name!!}] </div>
                @include('forum::admin.response.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>