            <div class="content">
                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="id">
                    {!! trans('forum::category.label.id') !!}
                </label><br />
                    {!! $category['id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('forum::category.label.name') !!}
                </label><br />
                    {!! $category['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="slug">
                    {!! trans('forum::category.label.slug') !!}
                </label><br />
                    {!! $category['slug'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('forum::category.label.status') !!}
                </label><br />
                    {!! $category['status'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_id">
                    {!! trans('forum::category.label.user_id') !!}
                </label><br />
                    {!! $category['user_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_type">
                    {!! trans('forum::category.label.user_type') !!}
                </label><br />
                    {!! $category['user_type'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="upload_folder">
                    {!! trans('forum::category.label.upload_folder') !!}
                </label><br />
                    {!! $category['upload_folder'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="deleted_at">
                    {!! trans('forum::category.label.deleted_at') !!}
                </label><br />
                    {!! $category['deleted_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="created_at">
                    {!! trans('forum::category.label.created_at') !!}
                </label><br />
                    {!! $category['created_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="updated_at">
                    {!! trans('forum::category.label.updated_at') !!}
                </label><br />
                    {!! $category['updated_at'] !!}
            </div>
        </div>
    </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('forum::category.label.name'))
                       -> placeholder(trans('forum::category.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('status')
                    -> options(trans('forum::category.options.status'))
                    -> label(trans('forum::category.label.status'))
                    -> placeholder(trans('forum::category.placeholder.status'))!!}
               </div>
            </div>