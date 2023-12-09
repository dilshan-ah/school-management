@extends('master')

@section('main-content')
<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Register now!</h1>
        <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
      </div>
      <div class="card shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="card-body" method="POST" action="{{ route('register') }}">
            @csrf

          <div class="flex gap-5">
            <div class="form-control">
              <label class="label cursor-pointer w-fit">
                <span class="label-text mr-5">Student</span> 
                <input type="radio" name="usertype" id="studentRadio" value="student" class="radio checked:bg-red-500"/>
              </label>
            </div>
            <div class="form-control">
              <label class="label cursor-pointer w-fit">
                <span class="label-text mr-5">Teacher</span> 
                <input type="radio" name="usertype" id="teacherRadio" value="teacher" class="radio checked:bg-blue-500" />
              </label>
            </div>
          </div>
          @error('usertype')
              <span class="text-red-500">{{ $message }}</span>
          @enderror

          <div class="form-control">
            <label class="label">
                <span class="label-text">Name</span>
            </label>
            <input type="text" id="name" placeholder="Name" class="input input-bordered" name="name" :value="old('name')" required autofocus autocomplete="name" required />
          </div>

            <div class="form-control" id="roll" >
              <label class="label">
                  <span class="label-text">Roll</span>
              </label>
              <input type="text" placeholder="Roll" class="input input-bordered" name="roll" value="000000"/>
            </div>


          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="email" id="email" placeholder="email" class="input input-bordered" name="email" :value="old('email')" required autocomplete="username" required />
          </div>


          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" id="password" placeholder="password" class="input input-bordered" name="password"
            required autocomplete="new-password"  />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Confirm Password</span>
            </label>
            <input type="password" id="password_confirmation" placeholder="password" class="input input-bordered"
            name="password_confirmation" required autocomplete="new-password" />
          </div>

          <div class="form-control mt-6">
            <button class="btn btn-primary" type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const studentRadio = document.getElementById('studentRadio');
    const teacherRadio = document.getElementById('teacherRadio')
    const roll = document.getElementById('roll');


    studentRadio.addEventListener('change', function () {
        roll.style.display = studentRadio.checked ? 'flex' : 'none';
    });

    teacherRadio.addEventListener('change', function () {
        roll.style.display = teacherRadio.checked ? 'none' : 'flex';
    });
</script>
@endsection