<div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="chat_sidebar">
    <div class="chat-window video-window">

     <div class="tab-content chat-contents">

      <div class="content-full tab-pane show active" id="profile_tab">
       <div class="display-table">
        <div class="table-row">
         <div class="table-body">
          <div class="table-content">
           <div class="chat-profile-img">
            <div class="edit-profile-img">

                    <img src="@if (auth()->user()->image )
                    {{ asset('assets/images/profile') . '/' . auth()->user()->image   }}
                    @else
                    {{ asset('assets/images/profile') . '/' .'user.png'   }}
                    @endif" >




            </div>
            <h3 class="mb-0 user-name m-t-10">{{ auth()->user()->name }}</h3>
            <small class="text-muted">{{ auth()->user()->email }}</small>
            <a data-toggle="modal" data-target="#ProfileEdit" class="btn btn-primary edit-btn"><i class="fa fa-pencil"></i></a>
           </div>
           <div class="chat-profile-info">
            <ul class="user-det-list">
             <li>
              <span>Username:</span>
              <span class="float-right text-muted">{{ auth()->user()->name }}</span>
             </li>

             <li>
              <span>Email:</span>
              <span class="float-right text-muted">{{ auth()->user()->email }}</span>
             </li>
             <li>
              <span>Phone:</span>
              <span class="float-right text-muted"> {{ auth()->user()->phone?? '' }}</span>
             </li>
            </ul>
           </div>

          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
