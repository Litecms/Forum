@forelse($response as $key => $val)
<div class="response-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="response-gadget-box">
    <p>No Response</p>
</div>
@endif