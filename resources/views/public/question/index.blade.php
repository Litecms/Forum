@include('forum::question.partial.header')

<section class="grid">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('forum::question.partial.aside')
            </div>
            <div class="col-md-9 ">
                <div class="main-area parent-border list-item">              
                    <div class="item border">     
                        <div class="content">
                            @foreach($questions as $question)
                                <h4><a href="{{trans_url('discussion')}}/{{$question['slug']}}">{{str_limit($question['title'], 300)}}</a> 
                                </h4>
                                <div class="metas mt20">
                                    <div class="tag pull-left">
                                        <a href="#" class="">{{@$question->category->name}}. {{format_date($question['created_at'])}} BY {{@$question->user->name}}</a>
                                    </div>
                                    <div class="date-time pull-right">
                                        <span><i class="fa fa-eye"></i>{{@$question->viewcount}}</span>
                                        <span><i class="fa fa-comments"></i>{{$question->responses->count()}}</span>
                                    </div>
                                </div>
                                <div class="avatar pull-left">
                                        {!!str_limit($question['question'], 230)!!}
                                </div>     
                                <div class="divider"></div>
                            @endforeach 
                        </div> 
                    </div>
                 </div>
                <div class="pagination text-center">
                {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</section> 