<div class='col-md-4 col-sm-6'>
       {!! Form::select('parent_id')
       -> options(Forum::questions())
       -> label(trans('forum::forum.label.parent_id'))
       -> placeholder(trans('forum::forum.placeholder.parent_id'))      
       -> required()!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::select('category_id')
       -> options(Forum::categories())
       -> label(trans('forum::forum.label.category'))
       -> placeholder(trans('forum::forum.placeholder.category'))
       -> required()!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('title')
       -> label(trans('forum::forum.label.title'))
       -> placeholder(trans('forum::forum.placeholder.title'))
       -> required()!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::select('status')
       -> options(trans('forum::forum.options.status'))
       -> label(trans('forum::forum.label.status'))
       -> placeholder(trans('forum::forum.placeholder.status'))!!}
</div>

<div class='col-md-2 col-sm-6'>
       {!! Form::hidden('best_answer')
           ->forceValue(0)!!}
       <div class="checkbox checkbox-danger">
             <input id="best_answer" type="checkbox" name="best_answer" value="1">
             <label for="best_answer">{!! trans('forum::forum.label.best_answer') !!}</label>
       </div>
</div>

<div class='col-md-12 col-sm-12'>
       {!! Form::textarea('description')
       -> addClass('html-editor')
       -> label(trans('forum::forum.label.description'))
       -> placeholder(trans('forum::forum.placeholder.description'))!!}
</div>