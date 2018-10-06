                    <div class="list-view">
                        @forelse($categories as $category)
                        <div class="card list-view-media"  id="{!! $category->getRouteKey() !!}">
                            <div class="card-block">
                                <div class="media">
                                    <a class="media-left" href="#"><img class="media-object card-list-img" src="{!!$category->picture!!}"></a>
                                    <div class="media-body">
                                        <div class="heading">
                                            <h3>{!! $category->name !!}</h3>
                                            <h6>{!! $category->email !!}</h6>
                                            <div class="status">
                                                <span class="verified">Verified</span>
                                                <span class="approved">Approved</span>
                                            </div>
                                        </div>
                                        <p>{!! $category->details !!}</p>
                                        <div class="actions">

                                            <a href="{!! guard_url('forum/category') !!}/{!! $category->getRouteKey() !!}/edit" class="text-primary" data-toggle="tooltip" data-placement="left" title="Edit" data-action="EDIT" ><i class="icon-pencil"></i></a>

                                            <a href="{!! guard_url('forum/category') !!}/{!! $category->getRouteKey() !!}" class="text-danger" data-toggle="tooltip" data-placement="left" title="Delete" data-action="DELETE" data-remove="{!! $category->getRouteKey() !!}"><i class="icon-trash"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endif
                </div>