
@include('forum::public.question.partial.header')


<section class="content bg-grey">
    <div class="jobs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-wrapper">
                        <div class="header">
                            <div class="title clearfix">
                                <h3>Start new Discussion</h3>
                                
                            </div>
                        </div>

                        <div class="details">
                            <div class="content">
                               @if($question['title'] == '') 
                                {!!Form::vertical_open()
                                -> action(guard_url('forum/question'))!!}
                               
                                @else
                                {!!Form::vertical_open()
                                ->method('PUT')
                                -> action(guard_url('forum/question/'. $question->getRouteKey()))!!}
                                <input type="hidden" name="slug" value="{{$question['slug']}}">
                                @endif
                                <label class="control-label col-sm-3" for="name">Title</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                     {!!Form::text('title')
                                     ->placeholder('Provide a title')
                                     ->forceValue($question['title'])
                                     ->required()
                                     ->raw()!!}
                                    </div>
                                </div>
                                
                                
                                <label class="control-label col-sm-3" for="cover_letter">Question</label>
                                <div class="col-sm-9" >
                                    <div class="form-group">
                                   {!!Form::textarea('question')
                                   ->placeholder('Ask your question')
                                   ->forceValue($question['question'])
                                   ->rows(15)
                                   ->raw()!!}
                                   </div>
                                </div>

                                <label class="control-label col-sm-3" for="name">Category</label>
                                 <div class="col-sm-9">
                                    <div class="form-group">
                                     {!! Form::select('category_id')
                                       -> options(Forum::category())
                                       ->label('')
                                       ->forceValue($question['category_id'])
                                       -> placeholder("Choose a Category")!!}
                                    </div>
                                </div>

                                <div class="footer text-right">
                                <button type="submit" class="btn btn-primary">Start Discussion</button>
                                </div>
                                {!!Form::close()!!}  
                            </div>
                        </div>                                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
            
