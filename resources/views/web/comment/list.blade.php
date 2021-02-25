  

              <div  class="comment clearfix">
<!--                 <img src="{{asset('img/comments-1.jpg')}}" class="comment-img  float-left" alt=""> -->
             <span>   <i class="bi bi-person-fill"></i></span>
                <h5>{{$comment->user}}</h5>
                <time datetime="">{{ $comment->created_at }}</time>
                <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 {{ $comment->message }}
                 <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>

              </div><!-- End comment #1 -->
  