@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">
            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">Edit Exam</h2>
                <form class="card-body" method="post" action="{{route('update.exam',$exam->id)}}" enctype="multipart/form-data" >
                    @csrf
                    @method('patch')
        
                  <div class="form-control">
                    <label class="label" for="Name">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" id="Name" value="{{$exam->name}}" placeholder="Name" class="input input-bordered" name="name" autofocus autocomplete="name" />
                  </div>

                  <div class="form-control">
                    <label class="label" for="type">
                        <span class="label-text">Exam type</span>
                    </label>
                    <input type="text" id="type" value="{{$exam->type}}" placeholder="Exam type" class="input input-bordered" name="type" autofocus autocomplete="type" />
                  </div>

                  <div class="form-control">
                    <label class="label" for="Subject">
                        <span class="label-text">Subject</span>
                    </label>
                    <input type="text" id="Subject" value="{{$exam->subject}}" placeholder="Subject" class="input input-bordered" name="subject" autofocus autocomplete="subject" />
                  </div>

                  <div class="form-control">
                    <label class="label">
                        <span class="label-text">Date</span>
                    </label>
                    <input type="date" value="{{$exam->start_date}}" placeholder="Name" class="input input-bordered" name="start_date" autofocus autocomplete="name" />
                  </div>
        
                  <div class="form-control">
                    <label class="label">
                        <span class="label-text">Time</span>
                    </label>
                    <input type="time" value="{{$exam->time}}" placeholder="Time" class="input input-bordered" name="time" autofocus autocomplete="time" />
                  </div>
        
                  <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit">Update</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection