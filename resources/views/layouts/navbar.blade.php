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
                    <img src="https://scontent.fdac20-1.fna.fbcdn.net/v/t39.30808-6/340929173_972157847552292_299130629551836093_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=efb6e6&_nc_ohc=voWvezh3QbkAX-Kr6wD&_nc_ht=scontent.fdac20-1.fna&oh=00_AfBszO04VqBzCikPOIpKLx8oNeCrIBOSmLS8jHTwBy45rg&oe=6577A91D" class="rounded-full w-20 h-20 object-cover shadow-2xl" />
                    <div>
                    <h1 class="text-2xl font-bold">Dilshan Ahmed</h1>
                    
                    
                    </div>
                </div>
                </div>

                <button class="btn w-full justify-start btn-primary">
                    <i class="fi fi-rr-house-chimney"></i>
                    My account
                </button>

                <button class="btn w-full justify-start bg-white">
                <i class="fi fi-rr-calendar-day"></i>
                Class routines
                </button>

                <button class="btn w-full justify-start bg-white">
                <i class="fi fi-rr-list-check"></i>
                Attendance
                </button>

                <button class="btn w-full justify-start bg-white">
                <i class="fi fi-rr-e-learning"></i>
                Online Exams
                </button>

                <button class="btn w-full justify-start bg-white">
                <i class="fi fi-rr-memo-circle-check"></i>
                Marks
                </button>

                <button class="btn w-full justify-start bg-white">
                <i class="fi fi-rr-calendar-star"></i>
                News and events
                </button>
            
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