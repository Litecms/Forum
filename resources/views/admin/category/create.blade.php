<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.new') }}  {!! trans('forum::category.name') !!} </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#category-category-create'  data-load-to='#category-category-entry' data-datatable='#category-category-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#category-category-entry' data-href='{{trans_url('admin/forum/category/0')}}'><i class="fa fa-times-circle"></i> {{ trans('cms.close') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Category</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('category-category-create')
        ->method('POST')
        ->files('true')
        ->action(trans_url('admin/forum/category'))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="details">
                @include('forum::admin.category.partial.entry')
            </div>
            <div class='col-md-6 col-sm-12'>
                  <label>Image</label>
                      {!!Filer::uploader('image',@$category->getUploadURL('image'),1)!!}
                      {!! Filer::editor('image', @$category['image'],1) !!}
                </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>