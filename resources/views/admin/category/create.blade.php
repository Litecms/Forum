
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Category</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#forum-category-create'  data-load-to='#forum-category-entry' data-datatable='#forum-category-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#forum-category-entry' data-href='{{guard_url('forum/category/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('forum-category-create')
            ->method('POST')
            ->files('true')
            ->action(guard_url('forum/category'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('forum::category.name') !!}] </div>
                @include('forum::admin.category.partial.entry', ['mode' => 'create'])
            </div>
            {!! Form::close() !!}
        </div>
    </div>