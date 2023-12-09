@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">
            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">Create Class</h2>
                <form class="card-body" method="post" action="{{route('store.class')}}" enctype="multipart/form-data" >
                    @csrf

                  <div class="form-control">
                    <label class="label" for="Subject">
                        <span class="label-text">Subject</span>
                    </label>
                    <input type="text" id="Subject" placeholder="Subject" class="input input-bordered" name="subject" autofocus autocomplete="subject" />
                  </div>

                  <div class="form-control">
                    <label class="label">
                        <span class="label-text">Day</span>
                    </label>

                    <div class="form-control flex flex-row flex-wrap">

                        @foreach(['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'] as $day)
                            <label class="cursor-pointer">
                                <input type="checkbox" value="{{ $day }}" name="days[]" class="checkbox checkbox-primary" />
                                <span class="label-text font-semibold text-lg ml-2">{{ $day }}</span>
                            </label>

                            <div class="divider lg:divider-horizontal"></div>
                        @endforeach
                    </div>
                  </div>
        
                  <div class="form-control">
                    <label class="label">
                        <span class="label-text">Start Time</span>
                    </label>
                    <input type="time" placeholder="Time" class="input input-bordered" name="start_time" autofocus autocomplete="time" />
                  </div>

                  <div class="form-control">
                    <label class="label">
                        <span class="label-text">End Time</span>
                    </label>
                    <input type="time" placeholder="Time" class="input input-bordered" name="end_time" autofocus autocomplete="time" />
                  </div>
        
                  <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit">Create</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection