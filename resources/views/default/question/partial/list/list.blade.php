                    <div class="list-view">
                        @forelse($questions as $question)
                        <div class="card list-view-media"  id="{!! $question->getRouteKey() !!}">
                            <div class="card-block">
                                <div class="media">
                                    
                                    <div class="media-body">
                                        <div class="heading">
                                            <h3><a href="{{trans_url('discussion')}}/{{$question['slug']}}">{!! $question->title !!}</a></h3>
                                            
                                            
                                        </div>
                                        <p><span><i class="fa fa-eye"></i>{{@$question->viewcount}}</span>
                                         <span><i class="fa fa-comments"></i>{{$question->responses->count()}}</span></p>
                                        <div class="actions">

                                            <a href="{{trans_url('discussion')}}/{{$question['slug']}}" class="text-primary" data-toggle="tooltip" data-placement="left" title="View" data-action="EDIT" ><i class="icon-eye"></i></a>

                                            <a href="{!! guard_url('forum/question') !!}/{!! $question->getRouteKey() !!}/edit" class="text-primary" data-toggle="tooltip" data-placement="left" title="Edit" data-action="EDIT" ><i class="icon-pencil"></i></a>
                                            
                                            <form id="delete-form" method="POST" action="{!! guard_url('forum/question') !!}/{!! $question->getRouteKey() !!}"> {{ csrf_field() }} {{ method_field('DELETE') }} 
                                <button type="submit" ><i class="icon-trash"></i></button></form>

                                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endif
                </div>