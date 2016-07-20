<div class="dashboard-content">
    <div class="panel panel-color panel-inverse">
        <div class="panel-heading">
            <h3 class="panel-title">
                Edit
                <span>
                    My Forum
                </span>
            </h3>
        </div>
        {!!Form::vertical_open()
        ->id('edit-forum-forum')
        ->method('PUT')
        ->files('true')
        ->action(trans_url('user/forum/forum') .'/'.$forum->getRouteKey())!!}
        <div class="panel-body">
            <div class="row">
            @include('forum::user.forum.partial.entry')
             <div class="col-md-12">
                    <button class="btn btn-warning">
                        Update Forum
                    </button>
                    <a href="{!!trans_url('/user/forum/forum')!!}" class="btn btn-default waves-effect waves-float m-l-5"> Cancel</a>                        </div> 
                </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>       