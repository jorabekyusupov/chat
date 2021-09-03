<div id="ProfileEdit" class="modal fade" role="dialog" wire:ignore.self>
 <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
   <div class="modal-header">
    <h3 class="modal-title">Edit Profile</h3>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <form action="" wire:submit.prevent='profileedit'>
    <div class="modal-body">



     <div class="form-group row">
      <label class="col-md-3 col-form-label">Image</label>
      <div class="col-md-9">
       <input type="file" class="form-control @error('img') is-invalid @enderror" wire:model='profile.image'>
       @error('img')
        <div class="invalid-feedback">
         {{ $message }}
        </div>
       @enderror
      </div>
     </div>
     <div class="form-group row">
      <label class="col-md-3 col-form-label"> Name</label>
      <div class="col-md-9">
       <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer='profile.name'>
       @error('name')
        <div class="invalid-feedback">
         {{ $message }}
        </div>
       @enderror
      </div>
     </div>
     <div class="form-group row">
      <label class="col-md-3 col-form-label">phone</label>
      <div class="col-md-9">
       <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model.defer='profile.phone'>
       @error('phone')
        <div class="invalid-feedback">
         {{ $message }}
        </div>
       @enderror
      </div>
     </div>
     <div class="form-group row">
      <label class="col-md-3 col-form-label">Email Address</label>
      <div class="col-md-9">
       <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.defer='profile.email'>
       @error('email')
        <div class="invalid-feedback">
         {{ $message }}
        </div>
       @enderror
      </div>
     </div>




     <div class="text-right">
      <button type="submit" class="btn btn-primary">Submit</button>
     </div>

    </div>
   </form>
  </div>
 </div>
</div>
