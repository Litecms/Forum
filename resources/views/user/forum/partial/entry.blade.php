
        <div class="col-sm-6 col-md-6">
            {!! Form::select('parent_id')
            -> required()
            -> options(Forum::questions())
            -> label(trans('forum::forum.label.parent_id'))
            -> placeholder(trans('forum::forum.placeholder.parent_id'))!!}
        </div>
        <div class="col-sm-6 col-md-6">
             {!! Form::select('category_id')
              -> options(Forum::categories())
              -> label('Category')
              -> placeholder('Select the category')!!}
        </div>
        <div class="col-sm-6">
              {!! Form::text('title')
              -> required()
              -> label(trans('forum::forum.label.title'))
              -> placeholder(trans('forum::forum.placeholder.title'))!!}
        </div>
        <div class="col-sm-6">
        {!! Form::select('status')
        -> options(trans('forum::forum.options.status'))
        -> label('Status')
        -> placeholder('Select the status')!!}
        </div>
        <div class="col-sm-12">
            {!! Form::textarea('description')
            -> label('Description')
             -> addClass('html-editor')
            -> cols('30')
            -> rows('9')
            !!}
        </div>
        
        <style>
        sup
        {
          color:red;
        }
        </style>