@forelse($forums as $key => $value)
<div class="media discussion-widget-block">
      <div class="media-left media-middle">
            <a href="#">
              
                <img class="media-object img-circle" src="{!!@$value->user->picture!!}">
              
            </a>
      </div>
      <div class="media-body">
            <p>{!!@$value->title!!}</p>
            <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$value->user->name!!} at {!!format_date(@$value->created_at)!!}</small></p>
      </div>
</div>
@empty
<div class="discussion-widget-block">
    <p>No Discussions</p>
</div>
@endif