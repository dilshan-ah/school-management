@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">
            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">Create Question</h2>
                <form class="card-body" method="post" action="{{route('create.question')}}" enctype="multipart/form-data" >
                    @csrf

                  <div class="form-control">
                    <label class="label" for="exam">
                        <span class="label-text">Select Exam</span>
                    </label>
                    <select id="exam" name="exam_id" class="select select-bordered w-full">
                      @foreach ($exams as $exam)
                        <option value="{{$exam->id}}">{{$exam->name}}</option>
                      @endforeach
                    </select>
                  </div>


                  <div class="form-control">
                    <label class="label" for="questionInput">
                        <span class="label-text">Upload Question (pdf)</span>
                    </label>
                    <input id="questionInput" type="file" class="file-input file-input-bordered file-input-primary w-full max-w-xs" name="pdf_path" accept=".pdf"/>
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