@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">
            @if(auth()->user()->usertype == "teacher")
              <div class="card card-side bg-base-100 shadow-xl mb-5">
                  <div class="card-body">
                      <h2 class="card-title text-4xl font-bold">Add Question</h2>
                      <a class="btn btn-primary w-max" href="{{ route('add.question') }}">Add question</a>
                  </div>
              </div>
            @endif


            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
              <h2 class="card-title text-4xl font-bold mb-5">All Questions</h2>
  
              <div class="overflow-x-auto">
                  <table class="table">
                    <!-- head -->
                    <thead>
                      <tr>
                        <th>#Sl no</th>
                        <th>Subject</th>
                        <th>Exam</th>
                        <th>Question</th>
                        @if(auth()->user()->usertype == "teacher")
                        <th>Action</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($questions as $question)
                      <tr>
                        <td>
                          <div class="font-bold">{{ $loop->iteration }}</div>
                        </td>
  
                        <td>{{ $question->onlineExam->subject }}</td>

                        <td>{{ $question->onlineExam->name }}</td>
                        
                        <td>
                          <a class="link link-primary" target="_blank" href="{{asset('assets/image/question')}}/{{$question->pdf_path}}">
                            {{$question->pdf_path}}
                          </a>
                        </td>
  
                        @if(auth()->user()->usertype == "teacher")
                        <td>
                          <div class="card-actions justify-start">
                            
                            <button class="btn btn-circle m-2" onclick="my_modal_{{ $question->id }}.showModal()">
                              <i class="fi fi-rs-trash text-md"></i>
                            </button>
  
                            <dialog id="my_modal_{{ $question->id }}" class="modal">
                              <div class="modal-box">
                                <h3 class="font-bold text-lg">Hello!</h3>
                                <p class="py-4">Press ESC key or click the button below to close</p>
                                <div class="modal-action">
                                  <form method="dialog">
                                    <!-- if there is a button in form, it will close the modal -->
                                    <button class="btn">Close</button>
                                  </form>
  
                                  <form action="{{route('delete.question',$question->id)}}" method="POST">
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