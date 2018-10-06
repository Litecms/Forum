            <div class='row'>
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