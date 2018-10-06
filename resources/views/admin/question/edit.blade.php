    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#question" data-toggle="tab">{!! trans('forum::question.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#forum-question-edit'  data-load-to='#forum-question-entry' data-datatable='#forum-question-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#forum-question-entry' data-href='{{guard_url('forum/question')}}/{{$question->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('forum-question-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('forum/question/'. $question->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="question">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('forum::question.name') !!} [{!!$question->name!!}] </div>
                @include('forum::admin.question.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>