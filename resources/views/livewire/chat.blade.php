@if (isset($users_chat))
 <div class="chat-window {{ sizeof($users_chat) > 0 ? '' : 'd-none' }}">
  <div class="fixed-header">
   <div class="navbar">
    <div class="mr-auto user-details">
     <div class="float-left user-img m-r-10">
      @if (isset($users_chat))
       @foreach ($users_chat as $itemss)
        <a href="profile.html" title="Jennifer Robinson"><img src="{{ asset('storage/images/profile') . '/' . $itemss->image }}" alt="" class="w-40 rounded-circle"></a>
       @endforeach
      @endif
     </div>
     <div class="float-left user-info">
      @if (isset($users_chat))
       @foreach ($users_chat as $item)
        <a href=""><span class="font-bold">{{ $item->name }}</span> </a>
        <span class="last-seen">Last seen reccently</span>
       @endforeach
      @endif
     </div>
    </div>
    <div class="search-box">
     <div class="input-group input-group-sm">
      <input type="text" class="form-control" placeholder="Search">
      <span class="input-group-append">
       <button class="btn" type="button"><i class="fa fa-search"></i></button>
      </span>
     </div>
    </div>
    <ul class="nav custom-menu">
     <li class="nav-item">
      <a href="#chat_sidebar" class="float-right nav-link task-chat profile-rightbar" id="task_chat"><i class="fa fa-user"></i></a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="voice-call.html"><i class="fa fa-phone"></i></a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="video-call.html"><i class="fa fa-video-camera"></i></a>
     </li>
     <li class="nav-item dropdown dropdown-action" wire:click.prevent='destroy({{ $chatID }})'>
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-trash"></i></a>

     </li>
    </ul>
   </div>
  </div>
  <div class="chat-contents">
   <div class="chat-content-wrap">
    <div class="chat-wrap-inner">
     <div class="chat-box">
      <div class="chats">
       {{-- <div class="chat-line">
        <span class="chat-date">October 8th, 2015</span>
       </div> --}}
       @if (isset($msgs))
        @foreach ($msgs as $item)
         @if (auth()->user()->id == $item->user_id)
          <div class="chat chat-right">
           <div class="chat-avatar">
            <a href="profile.html" class="avatar">
             <img alt="" src="{{ asset('storage/images/profile') . '/'. auth()->user()->image }}" class="img-fluid rounded-circle">
            </a>
           </div>
           <div class="chat-body">
            <div class="chat-bubble">
             <div class="chat-content">
              <p>{{ $item->text }}</p>
              <span class="chat-time">{{ $item->created_at->diffForHumans()}}</span>
             </div>
            </div>

           </div>
          </div>
         @else
          <div class="chat chat-left">
           <div class="chat-avatar">
            @if (isset($users_chat))
             @foreach ($users_chat as $itemss)

              <a href="profile.html" class="avatar">

               <img alt="{{ $itemss->name }}" src="{{ secure_asset('storage/images/profile') . '/' . $itemss->image }}" class="img-fluid rounded-circle">
              </a>
             @endforeach
            @endif
           </div>
           <div class="chat-body">
            <div class="chat-bubble">
             <div class="chat-content">
              <p>{{ $item->text }}</p>
              <span class="chat-time">{{ $item->created_at->diffForHumans()}}</span>
             </div>
            </div>
           </div>
          </div>
         @endif
        @endforeach
       @else
       @endif
      </div>
     </div>
    </div>
   </div>
   <div class="chat-footer">
    <div class="message-bar">
     <div class="message-inner">
      {{-- <a class="link attach-icon" href="#" data-toggle="modal" data-target="#drag_files"><img src="assets/img/attachment.png" alt=""></a> --}}
      <div class="message-area">
       <form wire:submit.prevent='addMsg'>
        <div class="input-group">
         <textarea class="form-control" wire:keydown.enter.prevent='addMsg' placeholder="Type message..." wire:model.defer='msg'></textarea>
         <span class="input-group-append">
          <button class="btn btn-primary" type="submit" type="button"><i class="fa fa-send"></i></button>
         </span>
        </div>
       </form>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
@else
@endif
