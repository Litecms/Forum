
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Question</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#forum-question-create'  data-load-to='#forum-question-entry' data-datatable='#forum-question-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#forum-question-entry' data-href='{{guard_url('forum/question/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('forum-question-create')
            ->method('POST')
            ->files('true')
            ->action(guard_url('forum/question'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('forum::question.name') !!}] </div>
                @include('forum::admin.question.partial.entry', ['mode' => 'create'])
            </div>
            {!! Form::close() !!}
        </div>
    </div>