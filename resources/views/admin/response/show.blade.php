    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('forum::response.name') !!}</a></li>
            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#forum-response-entry' data-href='{{guard_url('forum/response/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($response->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#forum-response-entry' data-href='{{ guard_url('forum/response') }}/{{$response->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#forum-response-entry' data-datatable='#forum-response-list' data-href='{{ guard_url('forum/response') }}/{{$response->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('forum-response-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('forum/response'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('forum::response.name') !!}  [{!! $response->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('forum::admin.response.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>