@forelse($forums as $key => $value)
<div class="media discussion-widget-block">
      <div class="media-left media-middle">
            <a href="#">
              <?php $photo = $value['user']['photo'];?>
                @if(!empty($photo))
                <img class="media-object img-circle" src="{!! URL::to('/image/xs/'.@$photo['efolder'])!!}/{!! @$photo['file'] !!}">
              @else
                <img class="media-object img-circle" src="{!!trans_url('img/avatar/default-avatar-pic.png')!!}">
              @endif
            </a>
      </div>
      <div class="media-body">
            <p>{!!@$value->title!!}</p>
            <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$value->user->name!!} at {!!date('d M, Y',strtotime($value->created_at))!!}</small></p>
      </div>
</div>
@empty
<div class="discussion-widget-block">
    <p>No Discussions</p>
</div>
@endif