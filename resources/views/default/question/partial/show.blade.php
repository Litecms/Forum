

<section class="single">
    <div class="container">
       
            <div class="col-md-8">
                <div class="area">
                    <div class="item">
                        
                        <div class="content">
                            <h4>{{$question->title}}</h4>
                            <div class="metas mt-20 clearfix">
                                <div class="tag pull-left">
                                    
                                    <a href="{{trans_url('forum/category')}}/{{@$question->category->slug}}" class="btn btn-primary btn-round">{{@$question->category->name}}</a> 
                                   
                                </div>
                                <div class="date-time pull-right">
                                    <span><img class="img-circle" src="img/questions/author-01.jpg" alt=""></span>
                                    
                                    <span><i class="fa fa-comments"></i>{{$question->responses->count()}}</span>
                                    <span><i class="fa fa-calendar"></i>{{format_date($question->created_at)}}</span>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <p>{!! $question->question !!}</p>
                            <ul class="list-inline tags mt-40">
                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="comments-area">
                    <div class="title">
                        <h3>Comments ( {{$question->responses->count()}})</h3>
                        <div class="separator"><span></span><span></span><span></span></div>
                    </div>

                    <ul class="media-list">
                         @forelse($question->responses as $response)
                        <li class="media">
                             @if($response->best_answer == 'yes')
                            <p><h4 class="media-heading">Best answer <i class="fa fa-check-square"></i></h4></p>
                            @endif
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="img/questions/author-01.jpg">
                                </a>
                            </div>

                            <div class="media-body">
                                <h4 class="media-heading">{{$response->user->name}}<span>September 16, 2017</span></h4>
                                <p>{!!$response->comment!!}</p>
                                
                                    
                                    <form action="{{guard_url('')}}" class="post-reply">
                                    <input type="hidden" name="slug" value="{{$question->slug}}">
                                    <input type="hidden" name="comment_id" value="{{$response->id}}">
                                    <button type="submit" name="best_answer" value="yes"><i class=" fa fa-check"></i></button>
                                    <button type="submit" name="best_answer" value="no"><i class="fa fa-remove"></i></button>
                                    </form>
                               
                            </div>   
                        </li>
                         @empty
                        @endif
                    </ul>
                </div>
               
                <div class="post-form-area">
                    <div class="post-form-title">
                        <h3>Post Your Answer</h3>
                        <div class="separator"><span></span><span></span><span></span></div>
                    </div>
                    {!!Form::vertical_open()
                    -> class('form_comment')
                    -> method('POST') 
                    -> action(guard_url('forum/response'))!!}
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                   {!!Form::textarea('comment')
                                   ->placeholder('I have the answer')
                                   ->forceValue('')
                                   ->rows(4)
                                   ->raw()!!}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="question_id" value="{{$question->id}}">
                        <input type="hidden" name="slug" value="{{$question->slug}}">

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    {!!Form::close()!!}  
                </div>
               
            </div>
        </div>
    
</section>