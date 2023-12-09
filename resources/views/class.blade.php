@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">

            @if(auth()->user()->usertype == "teacher")
              <div class="card card-side bg-base-100 shadow-xl mb-5">
                  <div class="card-body">
                      <h2 class="card-title text-4xl font-bold">Add class</h2>
                      <a class="btn btn-primary w-max" href="{{ route('add.class') }}">Add class</a>
                  </div>
              </div>
            @endif 


            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">Class routine</h2>

                <div class="overflow-x-auto">
                    <table class="table">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th>#Sl no</th>
                          <th>Subject</th>
                          <th>Day</th>
                          <th>Start time</th>
                          <th>End time</th>
                          @if(auth()->user()->usertype == "teacher")
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        @foreach ($classes as $class)
                        <tr>
                          <td>
                            <div class="font-bold">{{ $loop->iteration }}</div>
                          </td>

                          <td>{{$class->subject}}</td>

                          <td>
                            @foreach (json_decode($class->days) as $day)
                                <span>{{ $day }},</span>
                            @endforeach
                          </td>
                          <td>
                            {{$class->formattedStartTime}}
                          </td>
                          <td>
                            {{$class->formattedEndTime}}
                          </td>

                          @if(auth()->user()->usertype == "teacher")
                          <td>
                            <div class="card-actions justify-start">
                              <a class="btn btn-circle m-2" href="{{route('edit.class',$class->id)}}">
                                  <i class="fi fi-rr-edit text-md"></i>
                              </a>
                              <button class="btn btn-circle m-2" onclick="my_modal_{{ $class->id }}.showModal()">
                                <i class="fi fi-rs-trash text-md"></i>
                              </button>

                              <dialog id="my_modal_{{ $class->id }}" class="modal">
                                <div class="modal-box">
                                  <h3 class="font-bold text-lg">Hello!</h3>
                                  <p class="py-4">Press ESC key or click the button below to close</p>
                                  <div class="modal-action">
                                    <form method="dialog">
                                      <!-- if there is a button in form, it will close the modal -->
                                      <button class="btn">Close</button>
                                    </form>

                                    <form action="{{route('delete.class',$class->id)}}" method="POST">
                                      <input type="hidden" name="_token" value="JNeYoKquFe9gJQwZFMdCbXpI9dklQzmDIjC3Ukl2" autocomplete="off">                                      <input type="hidden" name="_method" value="DELETE">                                      <button type="submit" class="btn btn-error">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </dialog>
                            </div>
                          </td>
                          @endif
                        </tr>
                        @endforeach
                        
                      </tbody>
                      
                      
                    </table>
                  </div>
            </div>

        </div>
    </div>
  </div>
@endsection