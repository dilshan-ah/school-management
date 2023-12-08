
@extends('master')

@section('main-content')
<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Login now!</h1>
        <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
      </div>
      <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" method="POST" action="{{ route('login') }}">
            @csrf


          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="email" id="email" placeholder="email" class="input input-bordered"  name="email" :value="old('email')" required autofocus autocomplete="username" />
          </div>


          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" id="password" placeholder="password" class="input input-bordered" name="password"
            required autocomplete="current-password" />
            <label class="label">
              <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
            </label>
          </div>

          <div class="form-control">
            <label class="label cursor-pointer justify-start">
              <input type="checkbox" id="remember_me" class="checkbox checkbox-primary mr-3"  name="remember"/>
              <span class="label-text">Remember me</span> 
            </label>
          </div>

          <div class="form-control mt-6">
            <button class="btn btn-primary" type="submit">Login</button>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection