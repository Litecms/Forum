<div class="dashboard-content  m-t-5">
    <div class="panel panel-color panel-inverse">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="panel-title">{{$forum['title']}}</h3>
                    <p class="panel-sub-title m-t-5 text-muted">Answers : {!! Forum::answers($forum->id) !!}</p>
                </div>
                <div class="col-sm-4">
                    <a href="{{ trans_url('/user/forum/forum') }}" class="btn btn-sm btn-danger text-uppercase pull-right"> {{ trans('cms.back')  }}</a>
                </div>
            </div>
        </div>
        <div class="panel-body discussion-detail">
            <ul class="media-list">
              <li class="media">
                <div class="media-left">
                  <?php $photo = $forum['user']['photo'];?>
                    @if(!empty($photo))
                    <img class="media-object img-circle" src="{!! URL::to('/image/xs/'.@$photo['efolder'])!!}/{!! @$photo['file'] !!}">
                  @else
                    <img class="media-object img-circle" src="{!!trans_url('img/avatar/default-avatar-pic.png')!!}">
                  @endif
                </div>
                <div class="media-body">
                  <h4 class="media-heading">{!! $forum['user']['name'] !!} <span class="text-muted pull-right"><small>{!! date("d M, Y",strtotime($forum['created_at']))!!}</small></span></h4>
                  <p>{!! $forum['description'] !!} </p>
                    <hr>
                    @forelse($forums as $value)
                    <div class="media" id="{!! $value->getRouteKey() !!}">
                      <div class="media-left media-middle">
                        <?php $photo = $value->user->photo;?>
                        @if(!empty($photo))
                          <img class="media-object img-circle" src="{!! URL::to('/image/xs/'.@$photo['efolder'])!!}/{!! @$photo['file'] !!}">
                        @else
                        <img class="media-object img-circle" src="{!!trans_url('img/avatar/default-avatar-pic.png')!!}">
                        @endif
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">{!! $value['user']['name'] !!} @if($value['best_answer'] == 1)<i class="ion-android-checkmark-circle text-success"></i> @endif<span class="text-muted pull-right"><small>{!! date("d M, Y",strtotime($value['created_at']))!!}</small></span></h4>
                        <p>{!! $value['description'] !!}</p>

                        <p class="discussion-actions">
                            @if($value['published'] == 'Yes')
                            <a  class="btn btn-purple" data-action="PUBLISHED" data-load-to='#forum-forum-entry' data-href="{{trans_url('user/forum/forum/status/'. $value->getRouteKey())}}" data-value="No" data-datatable='#forum-forum-list'>Suspend</a>
                            @else
                                <a class="btn btn-success" data-action="PUBLISHED" data-load-to='#forum-forum-entry' data-href="{{trans_url('user/forum/forum/status/'. $value->getRouteKey())}}" data-value="Yes" data-datatable='#forum-forum-list'>Published</a>
                            @endif
                            <a data-action="DELETE"  data-href="{{ trans_url('/user/forum/forum') }}/{!! @$value->getRouteKey() !!}" data-remove="{!! $value->getRouteKey() !!}" title="Is this reply full of spam?" class="btn btn-danger">Delete</a>
                            @if($value['best_answer'] == 0)
                            <a href="{{ trans_url('/user/forum/forum/best/answer') }}/{!! $value->getRouteKey() !!}" class="btn btn-info">Make this as Best Answer</a>
                            @endif
                        </p>
                      </div>
                    </div>
                    @empty
                    @endif
                    <div class='comment m-t-30'>
                        {!!Form::vertical_open()
                        ->id('create-forum-forum')
                        ->method('POST')
                        ->files('true')
                        ->action(trans_url('user/forum/forum'))!!}
                        <div class='col-md-12 col-sm-12'>
                            <label>Sed ut perspiciatis unde omnis iste natus errornatus error sit voluptatem accusantium doloremque laudantium?</label>
                           {!! Form::hidden('parent_id')
                           -> forceValue($forum['id'])!!}
                           {!! Form::textarea('description')
                           -> placeholder('Add a Comment')
                           -> rows(8)
                           -> raw()!!}
                        </div>
                        <div class='col-md-12 col-sm-12 m-t-30'>
                            {!! Form::actions()
                            ->large_primary_submit('Comment')
                            ->large_inverse_reset('Reset')
                            !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

              </li>
            </ul>
        </div>
    </div>
</div>