            <div class='row'>
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