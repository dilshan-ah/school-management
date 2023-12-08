<div class="lg:col-span-2 col-span-7 lg:block hidden bg-white rounded-lg shadow-xl h-fit">
    <div class="hero place-items-start">
        <div class="hero-content flex-col lg:flex-row">
          <img src="{{ auth()->user()->profilepic ? asset('assets/image/user/' . auth()->user()->profilepic) : asset('assets/image/User-avatar.svg.png') }}" class="w-16 h-16 object-cover rounded-full border border-3 border-indigo-500" />
          <div>
            <h1 class="text-2xl font-bold"> {{ auth()->user()->name ?? 'Guest' }}</h1>
            <div class="flex">
                <a class="btn btn-circle m-2" href="{{route('profile.edit')}}">
                    <i class="fi fi-rr-edit text-2xl"></i>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="btn btn-circle m-2" href="{{route('logout')}}" onclick="event.preventDefault();
                    this.closest('form').submit();">
                        <i class="fi fi-br-exit text-2xl"></i>
                    </a>
                </form>
            </div>
            
          </div>
        </div>
      </div>


      <div class="divider"></div> 


      @include('components/side-menu')
</div>