<div class="navbar container mx-auto bg-white">
    <div class="navbar-start">

        <div class="drawer lg:hidden block w-max mr-5">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Page content here -->
            <label for="my-drawer" class="btn drawer-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </label>
        </div> 
        <div class="drawer-side z-50">
            <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <div class="menu w-80 p-0 min-h-full bg-base-200 text-base-content">

            <!-- Sidebar content here -->
            <div class="hero place-items-start">
                <div class="hero-content w-full flex-col lg:flex-row">
                    @auth
                        <img src="{{ auth()->user()->profilepic ? asset('assets/image/user/' . auth()->user()->profilepic) : asset('assets/image/User-avatar.svg.png') }}" />
                    @endauth    
                    <div>

                    @auth
                    <h1 class="text-2xl font-bold">{{auth()->user()->name}}</h1>
                    @endauth
                    
                    </div>
                </div>
            </div>

                @include('components/side-menu')
            
            </div>
        </div>
        </div>

        <a class="text-xl font-bold" href="/">School management</a>
    </div>
    <div class="navbar-end hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
        <li>
            <details>
            <summary>Account</summary>
            <ul class="p-2 w-max z-50">
                @if(auth()->check())
                    <li>
                        <a href="{{route('profile.edit')}}">Edit profile</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                            this.closest('form').submit();">Log out</a>
                        </form>
                        
                    </li>
                @else
                    <li>
                        <a href="{{route('register')}}">Register</a>
                    </li>
                    <li>
                        <a href="{{route('login')}}">Log in</a>
                    </li>
                @endif
            </ul>
            </details>
        </li>
        </ul>
    </div>
</div>