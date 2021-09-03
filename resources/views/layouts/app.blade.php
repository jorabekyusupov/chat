<!DOCTYPE html>
<html lang="en">


<!-- chat23:28-->

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
 <link rel="shortcut icon" type="image/x-icon" href="assets/img/chat.ico">
 <title>Online Chat</title>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="assets/css/style.css">
 <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
 <![endif]-->
 @livewireStyles
</head>

<body>
 <div class="main-wrapper">
<livewire:header>
  <livewire:side-bar>
   <div class="page-wrapper">
    <div class="chat-main-row">
     <div class="chat-main-wrapper">
      <div class="col-lg-9 message-view chat-view">
       <livewire:chat>
      </div>
     <livewire:profile>
     </div>
    </div>
    @include('layouts.modals')

   </div>
 </div>
 <div class="sidebar-overlay" data-reff=""></div>
 <script src="assets/js/jquery-3.2.1.min.js"></script>
 <script src="assets/js/popper.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
 <script src="assets/js/jquery.slimscroll.js"></script>
 <script src="assets/js/app.js"></script>
 @livewireScripts
 <script>
  window.addEventListener('closed', event => {
   $('#add_chat_user').modal('hide')
  });
  window.addEventListener('closedEdit', event => {
   $('#ProfileEdit').modal('hide')
  });
 </script>
</body>


<!-- chat23:29-->

</html>
