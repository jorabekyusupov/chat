<div class="sidebar" id="sidebar">
 <div class="sidebar-inner slimscroll">
  <div class="sidebar-menu">
   <ul>
    <li class="menu-title">Direct Chats <a href="#" class="add-user-icon" data-toggle="modal" data-target="#add_chat_user"><i class="fa fa-plus"></i></a></li>
    {{-- @if (isset($chats))


     @foreach ($chats as $items) --}}
      @foreach ($SendTo as $item)
       {{-- @if ($items->id == $item->chat_id) --}}

        <li wire:click="$emit('chatid', {{ $item->chat_id }},{{ $item->user->id }} )" style="cursor: pointer">
         <a><span class="chat-avatar-sm user-img"><img src="{{ asset('assets/images/profile') . '/'. $item->user->image }}" alt="{{ $item->user->name }}" class="rounded-circle"></span> {{ $item->user->name }} </a>
        </li>

       {{-- @endif --}}
      @endforeach
     {{-- @endforeach
    @endif --}}
    @if (isset($SendMe))
     @foreach ($SendMe as $items)



      <li wire:click="$emit('chatid',{{ $items->chat_id }},{{ $items->chats->users->id }})" style="cursor: pointer">
       <a><span class="chat-avatar-sm user-img"><img src="{{ asset('assets/images/profile') . '/' . $items->chats->users->image }}" alt="{{  $items->chats->users->name }}" class="rounded-circle"></span> {{ $items->chats->users->name }} </a>
      </li>

     @endforeach
    @endif
   </ul>
  </div>
 </div>
</div>
