@foreach($albumimage->commented as $comments)
                <div class="comment-block-{{$comments->id}}">
                   <a href="#"> <b>{{Sentry::findUserById($comments->user_id)->name}}&nbsp;&nbsp;&nbsp;</b></a>
                  <span>{{$comments->comment}}<br></span><br>
                  <div class="com-details">
                  <div class="com-time-container">
                  {{ $comments->created_at->diffForHumans() }} ·
                  </div>
                  </div>
                </div>
              @endforeach