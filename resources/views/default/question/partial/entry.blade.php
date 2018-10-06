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
                
                

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('published')
                    -> options(trans('forum::question.options.published'))
                    -> label(trans('forum::question.label.published'))
                    -> placeholder(trans('forum::question.placeholder.published'))!!}
               </div>

                
            </div>