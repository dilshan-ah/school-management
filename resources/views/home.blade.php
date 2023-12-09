@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">
            <div class="card card-side bg-base-100 shadow-xl mb-5">
                <div class="card-body">
                  <h2 class="card-title text-4xl font-bold">Hello, {{ auth()->user()->name ?? 'Guest' }}</h2>
                  <p class="text-2xl">Welcome Back</p>
                </div>
            </div>

            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">Upcoming events</h2>

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">

                  @foreach ($newsevents as $newsevent)

                    <div class="card bg-base-100 shadow-xl">
                        <figure><img src="{{asset('assets/image/event-news')}}/{{$newsevent->thumbnail}}" alt="Shoes" /></figure>
                        <div class="card-body">
                          <h2 class="card-title">{{$newsevent->title}}</h2>
                          <p>{{$newsevent->start_date}}</p>
                          <div class="card-actions justify-start">
                            <a class="btn btn-primary" href="{{route('single.news-event',$newsevent->id)}}">Read more</a>
                          </div>
                        </div>
                    </div>

                  @endforeach

                </div>
            </div>

            
              
        </div>
    </div>
  </div>
@endsection