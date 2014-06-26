<?php
if (Session::get('userid')!=null){ 
?>
<div class="small-3 large-3 column">
    <aside class="sidebar">
        <h3>Menu</h3>
        <ul class="side-nav">
            <li>{{HTML::link('/blog','Home (Blog) ')}}</li>
            <li class="divider"></li>
            <li class="{{ (strpos(URL::current(),route('post.new'))!== false) ? 'active' : '' }}">
                {{HTML::linkRoute('post.new','New Post')}}
            </li >
            <li class="{{ (strpos(URL::current(),route('post.list'))!== false) ? 'active' : '' }}">
                {{HTML::linkRoute('post.list','List Posts')}}
            </li>
            <li class="divider"></li>
            <li class="{{ (strpos(URL::current(),route('comment.list'))!== false) ? 'active' : '' }}">
                {{HTML::linkRoute('comment.list','List Comments')}}
            </li>
            <li class="divider"></li>
            <li>&nbsp;</li>
            <li class="recent_post">
                <h3>Recent Posts</h3>
                @foreach($recentPosts as $post)
                    {{link_to_route('post.show',$post->title,$post->idPosts)}}
                 @endforeach
            </li>
           
        </ul>
    </aside>
</div>
<div class="small-9 large-9 column">
    <div class="content">
        @if(Session::has('success'))
        <div data-alert class="alert-box round">
            {{Session::get('success')}}
            <a href="#" class="close">&times;</a>
        </div>
        @endif
        {{$content}}
    </div>
    <div id="comment-show" class="reveal-modal small" data-reveal>
        {{-- quick comment --}}
    </div>
</div>
<?php
     }else{
?>
    <script language='javascript' type='text/javascript'>
        alert("Please Login first!");
        window.location.href="../../signin";
    </script>;

<?php
}
?>

