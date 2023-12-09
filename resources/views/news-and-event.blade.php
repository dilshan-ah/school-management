@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">

          @if(auth()->user()->usertype == "teacher")
              <div class="card card-side bg-base-100 shadow-xl mb-5">
                  <div class="card-body">
                      <h2 class="card-title text-4xl font-bold">Add event or news</h2>
                      <a class="btn btn-primary w-max" href="{{ route('add.news-events') }}">Add event or news</a>
                  </div>
              </div>
          @endif 

            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">All events</h2>

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">

                    @foreach ($newsevents as $newsevent)

                    @if($newsevent->type == "Event")
                      <div class="card bg-base-100 shadow-xl">
                          <figure><img src="{{asset('assets/image/event-news')}}/{{$newsevent->thumbnail}}" alt="Shoes" /></figure>
                          <div class="card-body">
                            
                            <div class="badge badge-primary">Upcoming</div>
                            <h2 class="card-title">{{$newsevent->title}}</h2>
                            <p>from: {{$newsevent->start_date}}</p>
                            <p>to: {{$newsevent->end_date}}</p>
                            <div class="card-actions justify-start">
                              <a class="btn btn-primary" href="{{route('single.news-event',$newsevent->id)}}">Read more</a>
                            </div>


                            @if(auth()->user()->usertype == "teacher")

                            <div class="card-actions justify-start">
                              <a class="btn btn-circle m-2" href="{{route('edit.news-event',$newsevent->id)}}">
                                  <i class="fi fi-rr-edit text-2xl"></i>
                              </a>
                              <button class="btn btn-circle m-2" onclick="my_modal_1.showModal()">
                                <i class="fi fi-rs-trash text-2xl"></i>
                              </button>

                              <dialog id="my_modal_1" class="modal">
                                <div class="modal-box">
                                  <h3 class="font-bold text-lg">Hello!</h3>
                                  <p class="py-4">Press ESC key or click the button below to close</p>
                                  <div class="modal-action">
                                    <form method="dialog">
                                      <!-- if there is a button in form, it will close the modal -->
                                      <button class="btn">Close</button>
                                    </form>

                                    <form action="{{ route('delete.news-event', $newsevent->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-error">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </dialog>
                            </div>

                            @endif
                          </div>
                      </div>

                    @endif
                    @endforeach

                </div>

            </div>

            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
              <h2 class="card-title text-4xl font-bold mb-5">All news</h2>

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">

                    @foreach ($newsevents as $newsevent)

                    @if($newsevent->type == "News")
                      <div class="card bg-base-100 shadow-xl">
                          <figure><img src="{{asset('assets/image/event-news')}}/{{$newsevent->thumbnail}}" /></figure>
                          <div class="card-body">
                            <h2 class="card-title">{{$newsevent->title}}</h2>
                            <p>29 May 2020</p>
                            <div class="card-actions justify-start">
                              <a class="btn btn-primary"  href="{{route('single.news-event',$newsevent->id)}}">Read more</a>
                            </div>

                            @if(auth()->user()->usertype == "teacher")

                            <div class="card-actions justify-start">
                              <a class="btn btn-circle m-2" href="{{route('edit.news-event',$newsevent->id)}}">
                                  <i class="fi fi-rr-edit text-2xl"></i>
                              </a>
                              <button class="btn btn-circle m-2" onclick="my_modal_1.showModal()">
                                <i class="fi fi-rs-trash text-2xl"></i>
                              </button>

                              <dialog id="my_modal_1" class="modal">
                                <div class="modal-box">
                                  <h3 class="font-bold text-lg">Hello!</h3>
                                  <p class="py-4">Press ESC key or click the button below to close</p>
                                  <div class="modal-action">
                                    <form method="dialog">
                                      <!-- if there is a button in form, it will close the modal -->
                                      <button class="btn">Close</button>
                                    </form>

                                    <form action="{{ route('delete.news-event', $newsevent->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-error">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </dialog>
                            </div>

                            @endif
                          </div>
                      </div>

                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
  </div>
@endsection