<div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('forum::category.label.name'))
                       -> placeholder(trans('forum::category.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('status')
                       -> label(trans('forum::category.label.status'))
                       -> placeholder(trans('forum::category.placeholder.status'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('image')
                       -> label(trans('forum::category.label.image'))
                       -> placeholder(trans('forum::category.placeholder.image'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}