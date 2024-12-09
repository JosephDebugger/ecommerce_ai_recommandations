<div id="plist" class="people-list">
          @php
          $userId =0;
                if (Auth::guard('customer')->check()) {
                    $userId = Auth::guard('customer')->id();
                }
          @endphp                 
    <ul class="list-unstyled chat-list mt-2 mb-0">
        @foreach($chats as $key => $chat)

        <li class="clearfix {{ $key == 0 ? 'active' : ''}} "> 
            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
            <div class="about">
                <div class="name">{{$chat->name}}</div>
                <div class="status"> <i class="fa fa-circle {{$chat->userId == $userId ? 'online' : ''}}"></i> online </div>
            </div>
        </li>
        @endforeach
       
    </ul>
</div>