            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::select('category_id')
                       -> options(Forum::category())
                       -> placeholder(trans('forum::question.placeholder.category_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('title')
                       -> label(trans('forum::question.label.title'))
                       -> placeholder(trans('forum::question.placeholder.title'))!!}
                </div>

                <div class='col-md-12'>
                    {!! Form::textarea('question')
                    -> label(trans('forum::question.label.question'))
                    -> placeholder(trans('forum::question.placeholder.question'))!!}
                </div>
                <div class='col-md-12 col-sm-12'>
                    <div class="form-group">
                        <label for="images" class="control-label col-lg-12 col-sm-12 text-left">
                         {{trans('forum::question.label.images') }}
                         </label>
                        <div class='col-lg-3 col-sm-12'>
                            {!! $question->files('images', 10)
                            ->mime(config('filer.image_extensions'))
                            ->url($question->getUploadUrl('images'))
                            ->dropzone()!!}
                        </div>
                        <div class='col-lg-7 col-sm-12'>
                            {!! $question->files('images')
                             ->editor()!!}
                        </div>
                    </div>
                </div>
                

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('published')
                    -> options(trans('forum::question.options.published'))
                    -> label(trans('forum::question.label.published'))
                    -> placeholder(trans('forum::question.placeholder.published'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('status')
                    -> options(trans('forum::question.options.status'))
                    -> label(trans('forum::question.label.status'))
                    -> placeholder(trans('forum::question.placeholder.status'))!!}
               </div>
            </div>