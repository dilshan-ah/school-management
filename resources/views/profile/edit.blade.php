
@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">
            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">Update profile</h2>
                <form class="card-body" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" >
                    @csrf
                    @method('patch')

                    <div class="avatar">
                      <div class="w-24 rounded-full border border-2 border-indigo-500">
                        <img src="{{asset('assets/image')}}/User-avatar.svg.png" type="file" accept="image/*" />
                      </div>
                    </div>

                    <input type="file" class="file-input file-input-bordered file-input-primary w-full max-w-xs" name="profilepic"  accept="image/*" />
        
                  <div class="form-control">
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" id="name" placeholder="Name" class="input input-bordered" name="name" value="{{$user->name}}" autofocus autocomplete="name" />
                  </div>
        
        
                  <div class="form-control">
                    <label class="label">
                      <span class="label-text">Email</span>
                    </label>
                    <input type="email" id="email" placeholder="email" class="input input-bordered" name="email" value="{{$user->email}}" autocomplete="username" />
                  </div>

                  <div class="form-control">
                    <label class="label">
                        <span class="label-text">Roll</span>
                    </label>
                    <input type="text" placeholder="Roll" class="input input-bordered" name="roll" value="{{$user->roll}}" autofocus autocomplete="roll">
                  </div>
        
                  <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit">Update</button>
                  </div>
                </form>
            </div>

            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">Update password</h2>
                <form class="card-body" method="post" action="{{ route('password.update') }}" >
                    @csrf
                    @method('put')
        
                  <div class="form-control">
                    <label class="label">
                        <span class="label-text">Current Password</span>
                    </label>
                    <input type="password" id="update_password_current_password" placeholder="Current password" class="input input-bordered" name="current_password" autocomplete="current-password" />
                  </div>
        
        
                  <div class="form-control">
                    <label class="label">
                      <span class="label-text">New Password</span>
                    </label>
                    <input type="password" id="update_password_password" placeholder="New password" class="input input-bordered" name="password" autocomplete="new-password" />
                  </div>

                  <div class="form-control">
                    <label class="label">
                      <span class="label-text">Confirm Password</span>
                    </label>
                    <input type="password" id="update_password_password_confirmation" placeholder="Confirm password" class="input input-bordered" name="password_confirmation" autocomplete="new-password" />
                  </div>
        
                  <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit">Update</button>
                  </div>
                </form>
            </div>


            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">Delete Account</h2>
                <p class="mb-5">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
                
                <button class="btn btn-primary" onclick="my_modal_2.showModal()">Delete Account</button>
                <dialog id="my_modal_2" class="modal">
                    <div class="modal-box">
                      <h3 class="font-bold text-lg">Are you sure you want to delete your account?</h3>
                      <p class="py-4">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                        Password</p>

                        <form method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')
    
                            <input id="password" name="password" type="password" placeholder="Enter your password" class="input input-bordered w-full max-w-xs" required />

                            <button class="btn btn-error" type="submit">Delete account</button>
                        </form>
                    </div>

                    <form method="dialog" class="modal-backdrop">
                      <button>close</button>
                    </form>
                  </dialog>
            </div>
        </div>
    </div>
  </div>
@endsection