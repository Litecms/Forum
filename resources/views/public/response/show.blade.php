            @include('forum::public.response.partial.header')

            <section class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            @include('forum::public.response.partial.aside')
                        </div>
                        <div class="col-md-9 ">
                            <div class="area">
                                <div class="item">
                                    <div class="feature">
                                        <img class="img-responsive center-block" src="{!!url($response->defaultImage('images' , 'xl'))!!}" alt="{{$response->title}}">
                                    </div>
                                    <div class="content">
                                        <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="id">
                    {!! trans('forum::response.label.id') !!}
                </label><br />
                    {!! $response['id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="question_id">
                    {!! trans('forum::response.label.question_id') !!}
                </label><br />
                    {!! $response['question_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="comment">
                    {!! trans('forum::response.label.comment') !!}
                </label><br />
                    {!! $response['comment'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="images">
                    {!! trans('forum::response.label.images') !!}
                </label><br />
                    {!! $response['images'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="slug">
                    {!! trans('forum::response.label.slug') !!}
                </label><br />
                    {!! $response['slug'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('forum::response.label.status') !!}
                </label><br />
                    {!! $response['status'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="best_answer">
                    {!! trans('forum::response.label.best_answer') !!}
                </label><br />
                    {!! $response['best_answer'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="discription">
                    {!! trans('forum::response.label.discription') !!}
                </label><br />
                    {!! $response['discription'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_id">
                    {!! trans('forum::response.label.user_id') !!}
                </label><br />
                    {!! $response['user_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_type">
                    {!! trans('forum::response.label.user_type') !!}
                </label><br />
                    {!! $response['user_type'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="created_at">
                    {!! trans('forum::response.label.created_at') !!}
                </label><br />
                    {!! $response['created_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="updated_at">
                    {!! trans('forum::response.label.updated_at') !!}
                </label><br />
                    {!! $response['updated_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="deleted_at">
                    {!! trans('forum::response.label.deleted_at') !!}
                </label><br />
                    {!! $response['deleted_at'] !!}
            </div>
        </div>
    </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('question_id')
                       -> label(trans('forum::response.label.question_id'))
                       -> placeholder(trans('forum::response.placeholder.question_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('comment')
                       -> label(trans('forum::response.label.comment'))
                       -> placeholder(trans('forum::response.placeholder.comment'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('images')
                       -> label(trans('forum::response.label.images'))
                       -> placeholder(trans('forum::response.placeholder.images'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('best_answer')
                    -> options(trans('forum::response.options.best_answer'))
                    -> label(trans('forum::response.label.best_answer'))
                    -> placeholder(trans('forum::response.placeholder.best_answer'))!!}
               </div>

                <div class='col-md-12'>
                    {!! Form::textarea('discription')
                    -> label(trans('forum::response.label.discription'))
                    -> dataUpload(trans_url($response->getUploadURL('discription')))
                    -> addClass('html-editor')
                    -> placeholder(trans('forum::response.placeholder.discription'))!!}
                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



