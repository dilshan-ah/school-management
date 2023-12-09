@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">
            <div class="card card-side bg-base-100 shadow-xl mb-5">
                <div class="hero bg-base-200">
                    <div class="hero-content flex-col items-start">
                      <img src="{{asset('assets/image/event-news')}}/{{$newsevent->thumbnail}}" class="w-full rounded-lg shadow-2xl" />
                      <div>
                        <h1 class="text-5xl font-bold">{{$newsevent->title}}</h1>
                        @if($newsevent->start_date && $newsevent->end_date)
                            <p class="py-6">starting at: {{$newsevent->start_date}} --- ending at: {{$newsevent->end_date}}</p>
                        @endif
                        <p class="py-6">{{$newsevent->details}}</p>
                      </div>
                    </div>
                  </div>
            </div>

        </div>
    </div>
  </div>
@endsection