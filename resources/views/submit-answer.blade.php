@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">
            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">Submit your paper</h2>
                <form class="card-body" method="post" action="{{route('store.mark')}}" enctype="multipart/form-data" >
                    @csrf

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                      <div class="form-control">
                        <label class="label" for="question">
                            <span class="label-text">Select Question</span>
                        </label>
                        <select id="question" name="question_id" class="select select-bordered w-full">
                          @foreach ($questions as $question)
                            <option value="{{$question->id}}">{{$question->pdf_path}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-control">
                        <label class="label" for="questionInput">
                            <span class="label-text">Upload Answer (pdf)</span>
                        </label>
                        <input id="questionInput" type="file" class="file-input file-input-bordered file-input-primary w-full max-w-xs" name="pdf_path" accept=".pdf"/>
                      </div>
        
                  <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection