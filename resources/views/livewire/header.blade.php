<div class="header">
    <div class="header-left">
     <a href="/" class="logo">
      <img src="{{ ('assets/img/logoq.png') }}" width="120" height="60"  alt="">
     </a>
    </div>
    <a id="mobile_btn" class="float-left mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
    <ul class="float-right nav user-menu">

     <li class="nav-item dropdown has-arrow">
      <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
       <span class="user-img"><img class="rounded-circle"
        src="@if (auth()->user()->image )
        {{ asset('assets/images/profile') . '/' . auth()->user()->image   }}
        @else
        {{ asset('assets/images/profile') . '/' .'user.png'   }}
        @endif"

        width="40" alt="">
        <span class="status online"></span></span>
       <span>{{ (isset(auth()->user()->name)) ? auth()->user()->name : '' }}</span>
      </a>
      <div class="dropdown-menu">



            <a href="#chat_sidebar" class="dropdown-item " id="task_chat"><i class="fa fa-user"> User</i></a>

       <form action="{{ route('logout') }}" method="POST">
           @csrf

           <button type="submit" class="dropdown-item"> Logout</button>
          </form>
      </div>
     </li>
    </ul>
    <div class="float-right dropdown mobile-user-menu">
     <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
     <div class="dropdown-menu dropdown-menu-right">

        <li class="dropdown-item">
            <a href="#chat_sidebar" class="float-right nav-link task-chat profile-rightbar" id="task_chat"><i class="fa fa-user">User</i></a>
           </li>
      <form action="{{ route('logout') }}" method="POST">
       @csrf

       <button type="submit" class="dropdown-item"> Logout</button>
      </form>
     </div>
    </div>
   </div>
