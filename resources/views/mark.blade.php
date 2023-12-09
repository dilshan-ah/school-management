@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">

            @if(auth()->user()->usertype == "student")
                <div class="card card-side bg-base-100 shadow-xl mb-5">
                    <div class="card-body">
                        <h2 class="card-title text-4xl font-bold">Submit paper</h2>
                        <a class="btn btn-primary w-max" href="{{ route('submit.mark') }}">Submit answer</a>
                    </div>
                </div>
            @endif


            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
              <h2 class="card-title text-4xl font-bold mb-5">All Answers</h2>
  
              <div class="overflow-x-auto">
                  <table class="table">
                    <!-- head -->
                    <thead>
                      <tr>
                        <th>#Sl no</th>
                        <th>Subject</th>
                        <th>Exam</th>
                        <th>Answer</th>
                        <th>Student</th>
                        <th>Roll</th>
                        <th>Mark</th>
                        @if(auth()->user()->usertype == "teacher")
                        <th>Action</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($marks as $mark)
                      <tr>
                        <td>
                          <div class="font-bold">{{ $loop->iteration }}</div>
                        </td>

                        @foreach($questions->where('exam_id', $mark->id) as $question)
                          <td>{{ $question->onlineExam->subject }}</td>
                        @endforeach

                        @foreach($questions->where('exam_id', $mark->id) as $question)
                          <td>{{ $question->onlineExam->name }}</td>
                        @endforeach
                        
                        <td>
                          <a class="link link-primary" target="_blank" href="{{asset('assets/image/answer')}}/{{$mark->pdf_path}}">
                            {{$mark->pdf_path}}
                          </a>
                        </td>

                        @foreach($users->where('id', $mark->user_id) as $user)
                          <td>{{ $user->name }}</td>
                        @endforeach

                        @foreach($users->where('id', $mark->user_id) as $user)
                          <td>{{ $user->roll }}</td>
                        @endforeach

                        <td>
                          @if ($mark->mark)
                              {{ $mark->mark }}
                          @elseif (auth()->user()->usertype == 'teacher')
                              <button class="btn btn-primary" onclick="my_modal_{{ $mark->id * 1000 }}.showModal()">Add mark</button>

                              <dialog id="my_modal_{{ $mark->id * 1000 }}" class="modal">
                                  <div class="modal-box">
                                      <form method="dialog">
                                          <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                      </form>
                                      <h3 class="font-bold text-lg">Add mark</h3>
                                      <form action="{{ route('update.mark', $mark->id) }}" method="post">
                                          @csrf
                                          @method('patch')
                                          <input type="text" name="mark" placeholder="Add mark" class="input input-bordered w-full max-w-xs" />
                                          <button class="btn btn-primary" type="submit">Submit</button>
                                      </form>
                                  </div>
                              </dialog>
                          @endif

                        </td>
  
                        @if(auth()->user()->usertype == "teacher")
                        <td>
                          <div class="card-actions justify-start">
                            
                            <button class="btn btn-circle m-2" onclick="my_modal_{{ $mark->id }}.showModal()">
                              <i class="fi fi-rs-trash text-md"></i>
                            </button>
  
                            <dialog id="my_modal_{{ $mark->id }}" class="modal">
                              <div class="modal-box">
                                <h3 class="font-bold text-lg">Hello!</h3>
                                <p class="py-4">Press ESC key or click the button below to close</p>
                                <div class="modal-action">
                                  <form method="dialog">
                                    <!-- if there is a button in form, it will close the modal -->
                                    <button class="btn">Close</button>
                                  </form>
  
                                  <form action="{{route('delete.mark',$mark->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-error">Delete</button>
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