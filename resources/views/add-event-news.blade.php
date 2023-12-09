@extends('master')

@section('main-content')
<div class="bg-slate-100 w-full py-10">
    <div class="container mx-auto grid lg:grid-cols-7 grid-cols-1 gap-12">

        @include('components/side-section')


        <div class="lg:col-span-5 col-span-7">
            <div class="bg-base-100 shadow-xl p-8 rounded-2xl mb-5">
                <h2 class="card-title text-4xl font-bold mb-5">Create Event or News</h2>
                <form class="card-body" method="post" action="{{route('create.news-events')}}" enctype="multipart/form-data" >
                    @csrf

                    <div class="avatar">
                      <div class="w-full h-96 border">
                        <img id="avatarPreview" class="object-cover" src="{{asset('assets/image')}}/User-avatar.svg.png" type="file" accept="image/*" />
                      </div>
                    </div>

                    <input id="avatarInput" type="file" class="file-input file-input-bordered file-input-primary w-full max-w-xs" name="thumbnail" accept="image/*"  onchange="previewImage(this)"/>
        
                  <div class="form-control">
                    <label class="label" for="title">
                        <span class="label-text">Title</span>
                    </label>
                    <input type="text" id="title" placeholder="Name" class="input input-bordered" name="title" autofocus autocomplete="name" />
                  </div>

                  <div class="form-control">
                    <label class="label" for="type">
                        <span class="label-text">Event or news</span>
                    </label>
                    <select class="select select-bordered w-full" name="type" id="type">
                        <option value="News" checked>News</option>
                        <option value="Event">Event</option>
                    </select>
                  </div>

                  <div class="grid grid-cols-2 gap-5 w-full" id="date">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Start date</span>
                        </label>
                        <input type="date" id="start_date" placeholder="Name" class="input input-bordered" name="start_date" autofocus autocomplete="name" />
                      </div>
    
                      <div class="form-control">
                        <label class="label">
                            <span class="label-text">End date</span>
                        </label>
                        <input type="date" id="end_date" placeholder="Name" class="input input-bordered" name="end_date" autofocus autocomplete="name" />
                      </div>
                  </div>
        
                  <div class="form-control">
                    <label class="label" for="details">
                      <span class="label-text">Details</span>
                    </label>
                    <textarea class="textarea textarea-bordered" name="details" placeholder="Add details" id="details"></textarea>
                  </div>
        
                  <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit">Update</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
  </div>

  <script>
    const type = document.getElementById('type');
    const date = document.getElementById('date')

    date.style.display = "none";

    type.addEventListener('change', function () {
        date.style.display = type.value == "Event" ? 'grid' : 'none';
    });


    function previewImage(input) {
        var preview = document.getElementById('avatarPreview');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endsection