<div class="dashboard-content">
    <div class="panel panel-color panel-inverse">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-5 col-md-5">
                    <h3 class="panel-title">
                       {!!Trans('forum::forum.user_names')!!}
                    </h3>
                    <p class="panel-sub-title m-t-5 text-muted">
                       {!!Trans('forum::forum.user_name')!!}
                    </p>
                </div>
                <div class="col-sm-7 col-md-7">
                    <div class="row m-t-5">
                        <div class="col-xs-12 col-sm-7 m-b-5">

                                {!!Form::open()
                                    ->method('GET')
                                    ->action(URL::to('user/forum/forum'))!!}
                                    <div class="input-group">
                                    {!!Form::text('search')->type('text')->class('form-control')->placeholder('Search for forums')->raw()!!}
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-danger" type="button">
                                                <i class="icon-magnifier">
                                                </i>
                                            </button>
                                        </span>
                                        </div>
                                {!! Form::close()!!}

                        </div>
                        <div class="col-xs-12 col-sm-5">
                             <a href="{{ trans_url('/user/forum/forum/create') }}" class="btn btn-success btn-block text-uppercase f-12"> {{ trans('cms.create')  }} forum</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($forums as $forums)
        <div class="panel-body" id="{!! $forums->getRouteKey() !!}">
            <div class="popular-post-block">
                <div class="row">
                    <div class="dashboard-blog-pic">
                        <?php $photo = $forums->user->photo;?>
                        @if(!empty($photo))
                          <img src="{!! URL::to('/image/xs/'.@$photo['efolder'])!!}/{!! @$photo['file'] !!}">
                        @else
                        <img src="{!!trans_url('img/avatar/default-avatar-pic.png')!!}">
                        @endif
                    </div>
                    <div class="dashboard-blog-desc popular-post-inner">
                        <div class="popular-post-desc">
                            <h4><a href="{{ trans_url('/user') }}/forum/forum/{!! $forums->getRouteKey() !!}">{{$forums['title']}}</a></h4>
                            <span>Total Answers : {!! Forum::answers($forums->id) !!}</span>
                        </div>
                    </div>
                    <div class="dashboard-blog-actions  text-right">
                        <a href="{{ trans_url('/user') }}/forum/forum/{!! $forums->getRouteKey() !!}" class="btn btn-icon waves-effect btn-success m-b-5"><i class="fa fa-eye"></i></a>
                        <a href="{{ trans_url('/user') }}/forum/forum/{!! $forums->getRouteKey() !!}/edit" class="btn btn-icon waves-effect btn-primary m-b-5"><i class="fa fa-pencil"></i></a>
                        <a data-action="DELETE"  data-href="{{ trans_url('/user/forum/forum') }}/{!! $forums->getRouteKey() !!}" class="btn btn-icon waves-effect btn-danger" data-remove="{!! $forums->getRouteKey() !!}"><i class="fa fa-trash"></i></a>
                    </div>
               </div>
           </div>
        </div>
       @endforeach
   </div>
</div>
