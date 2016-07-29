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
                <img src="{!! trans_url('img/discuss-side-icon.png') !!}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 m-t-30">
                @forelse($forums as $forum)
                <div class="discuss-blocks">
                    <div class="media">
                      <div class="media-left media-middle">
                        <img class="media-object img-circle" src="{!!$forum->user->picture!!}">
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="{{trans_url('forums/forums')}}/{{@$forum['slug']}}">{{@$forum['title']}}</a></h4>
                        <p class="text-muted">{!! format_date($forum['created_at'])!!} by <a href="#">{!! $forum->user->name !!}</a></p>
                        <span class="answer-count">{!! Forum::answers($forum->id) !!}</span>
                      </div>
                    </div>
                </div>
                @empty
                @endif
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="blog-detail-side-search-wraper">
                    {!!Form::open()->method('GET')
                          ->action(url('forums'))!!}
                    {!!Form::text('search')->type('text')->class('form-control')->placeholder('Search for Discussions')->raw()!!}
                    <i class="icon-magnifier">
                    </i>
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
    </div>
</section>