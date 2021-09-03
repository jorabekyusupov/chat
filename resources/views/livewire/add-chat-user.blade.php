<div  id="add_chat_user" class="modal fade" role="dialog">
 <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
   <div class="modal-header">
    <h3 class="modal-title">Create Chat</h3>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <form action="">
    <div class="modal-body">
     <div class="input-group m-b-30">
      <input placeholder="Search to start a chat" class="form-control search-input" id="btn-input" type="text">
      <span class="input-group-append">
       <button class="btn btn-primary">Search</button>
      </span>
     </div>
     <div>
      <h5>Users</h5>
      <ul class="chat-user-list">
       @if (isset($users))
        @foreach ($users as $item)
         <li id="modalclose"  wire:click="$emit('addchat',{{ $item->id }})" style="cursor: pointer;">
          <a>
           <div class="media">
            <span class="avatar align-self-center">
                <img src="{{ asset('assets/images/profile') . '/'. $item->image }}" alt="">
            </span>
            <div class="media-body align-self-center text-nowrap">
             <div class="user-name">{{ $item->name }}</div>
             <span class="designation">{{ $item->email }}</span>
            </div>
            <div class="text-nowrap align-self-center">
             <div class="online-date">Last seen reccently</div>
            </div>
           </div>
          </a>
         </li>
        @endforeach
       @endif
      </ul>
     </div>

    </div>
   </form>
  </div>
 </div>
</div>
