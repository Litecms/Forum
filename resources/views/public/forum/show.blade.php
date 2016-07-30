<section class="discuss">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <h1 class="main-title">
                    <small>Your Questions</small>
                    Discuss <span></span>
                </h1>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs text-right">
                <img src="img/discuss-side-icon.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 m-t-30">
                <div class="discuss-detail-blocks">
                    <h1 class="inner-title">
                        <span>{{@$forum['title']}}</span>
                    </h1>
                    <ul class="media-list">
                      <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img src="{!! url($forum->user->picture) !!}" class="media-object img-circle" alt="profile"/>

                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{!! @$forum->user->name !!}  <span class="pull-right">{!! format_date($forum['created_at'])!!}</span></h4>
                            <p>{!! $forum['description'] !!}</p>
                            <div class="dashed-border"></div>
                            @forelse($forums as $value)
                                @if($value->best_answer == 1)
                                <div class="media">
                                  <div class="media-left media-middle">
                                    <a href="#">
                                        <img src="{!! url($value->user->picture) !!}" class="media-object img-circle" alt="profile"/>

                                    </a>
                                  </div>
                                  <div class="media-body">
                                    <h4 class="media-heading">{!! @$forum->user->name !!} <i class="ion ion-checkmark-circled text-danger"></i><span class="pull-right">{!! format_date($forum['created_at'])!!}</span></h4>
                                    <p>{!! @$value['description'] !!}</p>
                                  </div>
                                </div>
                                @endif
                            @empty
                            @endif
                      </div>
                      </li>
                    </ul>
                </div>
                @forelse($forums as $value)
                    @if($value->best_answer == 0)
                    <div class="discuss-detail-blocks m-t-30">
                          <div class="media">
                            <div class="media-left media-middle">
                                <a href="#">
                                        <img src="{!! url($value->user->picture) !!}" class="media-object img-circle" alt="profile"/>
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{!! @$forum->user->name !!}  <span class="pull-right">{!! format_date($forum['created_at'])!!}</span></h4>
                                <p>{!! $value['description'] !!}</p>
                            </div>
                          </div>
                    </div>
                    @endif
                @empty
                @endif

                <div class="post-comment-block">
                    <h1 class="inner-title">
                        Post a <span>Comment</span>
                    </h1>
                    {!!Form::vertical_open()
                    ->id('create-forum-forum')
                    ->addClass('post-comment-form')
                    ->method('POST')
                    ->files('true')
                    ->action(trans_url('user/forum/forum'))!!}
                        <div class="row">
                            <div class="col-sm-12">
                                {!! Form::hidden('parent_id')
                                -> forceValue($forum['id'])!!}
                               {!! Form::textarea('description')
                               -> placeholder('Message')
                               -> rows(10)
                               -> raw()!!}
                                <i class="form-control-feedback icon-speech"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                               <input type="submit" class="btn btn-danger btn-sm text-uppercase waves-effect waves-float" value="Comment">
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="blog-detail-side-search-wraper">
                 {!!Form::open()->method('GET')
                 ->action(url('forums'))!!}
                    {!!Form::text('search')->type('text')->class('form-control')->placeholder('Search for Discussions')->raw()!!}
                    <i class="icon-magnifier"></i>
                    {!! Form::close()!!}
                </div>
                <div class="blog-detail-side-category-wraper clearfix">
                    <h3>Categories</h3>
                    <ul>
                        <li class="{{ (Request::is('forums'))? 'active' : ''}}"><a href="{{trans_url('forums')}}">All</a><span class="cat-number">{{Forum::count()}}</span></li>
                        @forelse(Forum::categories() as $key =>  $value)
                        <li class="{{(Request::is('*forums/category/'.$key))? 'active' : ''}}"><a href="{{trans_url('forums/category')}}/{{@$key}}">{{$value}}</a><span class="cat-number">{{Forum::countCategory($key)}}</span></li>
                        @empty
                        @endif
                    </ul>
                </div>
        </div>
    </div>
</section>