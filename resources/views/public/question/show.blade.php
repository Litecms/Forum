            @include('forum::public.question.partial.header')


<section class="single">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                   
                    
                    <div class="widget category">
                       
                        <ul class="mt-20">
                            @include('forum::public.question.partial.aside')
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="area">
                    <div class="item">
                        
                        <div class="content">
                            <h4>{{$question->title}}</h4>
                            <div class="metas mt-20 clearfix">
                                <div class="tag pull-left">
                                    
                                    <a href="{{trans_url('forum/category')}}/{{@$question->category->slug}}" class="btn btn-primary btn-round">{{@$question->category->name}}</a> 
                                   
                                </div>
                                <div class="date-time pull-right">
                                    <span><img class="img-circle" src="" alt=""></span>
                                    <span><a href="" class="text-black">by <span class="text-primary">{{@$question->user->name}}</span></a></span>
                                    <span><i class="fa fa-comments"></i>{{@$question->responses->count()}}</span>
                                    <span><i class="fa fa-calendar"></i>{{format_date(@$question->created_at)}}</span>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <p>{!! $question->question !!}</p>
                            <ul class="list-inline tags mt-40">
                                @if(user_id() == $question->user_id) 
                              <a href="{{guard_url('forum/question/'.$question->getRouteKey().'/edit')}}"><button type="button" class="btn btn-success">Edit question</button></a>
                              <form id="delete-form" method="POST" action="{!! guard_url('forum/question') !!}/{!! $question->getRouteKey() !!}"> {{ csrf_field() }} {{ method_field('DELETE') }} 
                                <button type="submit" class="btn btn-success">Delete question</button></form>
                               @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="comments-area">
                    <div class="title">
                        <h3>Replies ( {{$question->responses->count()}})</h3>
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
                                <h4 class="media-heading">{{$response->user->name}}<span>{{format_date($response['created_at'])}}</span></h4>
                                <p>{!!$response->comment!!}</p>

                               @if(user_id() == $response->user_id)
                                     <a href="{{guard_url('forum/response/'.$response->getRouteKey().'/edit')}}"><button type="button">Edit reply</button></a>
                                    <form id="delete-form" method="POST" action="{!! guard_url('forum/response') !!}/{!! $response->getRouteKey() !!}"> {{ csrf_field() }} {{ method_field('DELETE') }} 
                                    <button type="submit">Delete reply</button></form>
                                    @endif
                                    @if(user_id() == $question->user_id)
                                    <form action="{{guard_url('forum/bestanswer/')}}" class="post-reply">
                                    <input type="hidden" name="slug" value="{{$question->slug}}">
                                    <input type="hidden" name="comment_id" value="{{$response->id}}">
                                    <button type="submit" name="best_answer" title="select as best answer" value="yes"><i class=" fa fa-check"></i></button>
                                    <button type="submit" name="best_answer" title="remove best answer" value="no"><i class="fa fa-remove"></i></button>
                                    </form>

                                @endif
                            </div>   
                        </li>
                         @empty
                        @endif
                    </ul>
                </div>
                @if(Auth::User())
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
                @else
                <h5>Please  <a href="{{guard_url('login')}}">Sign in</a> or <a href="{{guard_url('register')}}">create an account</a> to participate in this conversation.</h5>
                @endif
            </div>
        </div>
    </div>
</section>