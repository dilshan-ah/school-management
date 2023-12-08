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

                    <div class="card bg-base-100 shadow-xl">
                        <figure><img src="https://demosakolawp.themesawesome.com/wp-content/uploads/2020/05/blog-4-1.jpg" alt="Shoes" /></figure>
                        <div class="card-body">
                          <h2 class="card-title">Indonesia Maritime Countries</h2>
                          <p>29 May 2020</p>
                          <div class="card-actions justify-start">
                            <button class="btn btn-primary">Read more</button>
                          </div>
                        </div>
                    </div>

                    <div class="card bg-base-100 shadow-xl">
                        <figure><img src="https://demosakolawp.themesawesome.com/wp-content/uploads/2020/05/blog-4-1.jpg" alt="Shoes" /></figure>
                        <div class="card-body">
                          <h2 class="card-title">Indonesia Maritime Countries</h2>
                          <p>29 May 2020</p>
                          <div class="card-actions justify-start">
                            <button class="btn btn-primary">Read more</button>
                          </div>
                        </div>
                    </div>

                    <div class="card bg-base-100 shadow-xl">
                        <figure><img src="https://demosakolawp.themesawesome.com/wp-content/uploads/2020/05/blog-4-1.jpg" alt="Shoes" /></figure>
                        <div class="card-body">
                          <h2 class="card-title">Indonesia Maritime Countries</h2>
                          <p>29 May 2020</p>
                          <div class="card-actions justify-start">
                            <button class="btn btn-primary">Read more</button>
                          </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">Upcoming Exams</h2>

                <div class="overflow-x-auto">
                    <table class="table">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Subject</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        <tr>
                          <td>
                            <div>
                                <div class="font-bold">Exam 1</div>
                                <div class="text-sm opacity-50">Pre test</div>
                            </div>
                          </td>
                          <td>
                            Biology
                            <br/>
                            <span class="badge badge-ghost badge-sm">Chap 1-7</span>
                          </td>
                          <td>05/01/2020</td>
                          <td>7:00 am</td>
                          <th>
                            <button class="btn btn-warning btn-xs">Upcoming</button>
                          </th>
                        </tr>
                        
                      </tbody>
                      
                      
                    </table>
                  </div>
            </div>
              
        </div>
    </div>
  </div>
@endsection