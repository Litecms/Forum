<div class="sidebar">
     <div class="widget">
        @if(Auth::User())
        <a href="{{trans_url('newdiscussion')}}"><button type="button" class="btn btn-primary">New Discussion</button></a>
        @else
        <a href="{{guard_url('login')}}"><button type="button" class="btn btn-primary"> New Discussion</button></a>
        @endif                            
    </div>

    <div class="widget category">
        <h3 class="border-bottom">Category</h3>
        <ul class="mt20">
                <li class="menu-title uppercase"><a href="{{trans_url('/discussions')}}"><i style="color: #4BCC88;" class="fa fa-circle-o"></i>All</a></li>
            @forelse(Forum::categories() as $key => $category) 
                <li class="menu-title uppercase"><a href="{{trans_url('forum/category')}}/{{@$key}}"><i style="color: #4BCC88;" class="fa fa-circle-o"></i> {!!@$category!!}</a></li>
            @empty
            @endif  
        </ul>
    </div>
    
    
</div>