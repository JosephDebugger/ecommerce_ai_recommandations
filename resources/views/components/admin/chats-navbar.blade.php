<div id="plist" class="people-list">
          @php
          $userId =0;
                if (Auth::guard('customer')->check()) {
                    $userId = Auth::guard('customer')->id();
                }
          @endphp                 
    <ul class="list-unstyled chat-list mt-2 mb-0">
        @foreach($chats as $key => $chat)
      
        <a href="{{ route('viewChats',['id'=>$chat->userId]) }}">
            <li class="clearfix {{ $chat->userId == $user ? 'active' : ''}} "> 
                <img src="{{ $chat->image !=''? asset($chat->image):'https://bootdey.com/img/Content/avatar/avatar2.png'}}" alt="avatar">
                <div class="about">
                    <div class="name">{{$chat->name}}</div>
                    @if($chat->userId == $userId)
                    <div class="status"> <i class="fa fa-circle online"></i> online </div>
                  @else
                  <div class="status"> <i class="fa fa-circle offline"></i> offline </div>
                  @endif
                </div>
            </li>
        </a>
      
        @endforeach
    </ul>
</div>