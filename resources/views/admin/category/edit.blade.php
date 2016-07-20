<div class="box-header with-border">
    <h3 class="box-title"> Edit  {!! trans('forum::category.name') !!} [{!!$category->name!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#category-category-edit'  data-load-to='#category-category-entry' data-datatable='#category-category-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#category-category-entry' data-href='{{trans_url('admin/forum/category')}}/{{$category->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('cms.cancel') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#category" data-toggle="tab">{!! trans('forum::category.tab.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('category-category-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(trans_url('admin/forum/category/'. $category->getRouteKey()))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="category">
                @include('forum::admin.category.partial.entry')
            </div>
            <div class='col-md-6 col-sm-12'>
                  <label>Image</label>
                      {!!Filer::uploader('image',@$category->getUploadURL('image'),1)!!}
                      {!! Filer::editor('image', @$category['image'],1) !!}
                </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>