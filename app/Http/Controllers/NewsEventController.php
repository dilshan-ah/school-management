<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NewsEvent;

use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class NewsEventController extends Controller
{

    public function index()
    {

        return view('add-event-news');
    }


    public function create(Request $request)
    {
        $newsevent = new NewsEvent();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'type' => 'required', 'string', 'max:255', 'in:News,Event',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'details' => 'required', 'string', 'max:255',
            'thumbnail' => 'image',
        ], [
            'title.required' => 'The title is required.',
            'type.required' => 'The type is required.',
            'details.required' => 'The details is required.',
            'thumbnail.image' => 'The category image must be a valid image file.',
        ]);
    

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = "";

        if($image = $request->file('thumbnail')){
            $imageName = time().uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('assets/image/event-news',$imageName);
        }

        $newsevent->title = $request->title;
        $newsevent->type = $request->type;
        $newsevent->start_date = $request->start_date;
        $newsevent->end_date = $request->end_date;
        $newsevent->details = $request->details;
        $newsevent->thumbnail = $imageName;

        if($newsevent->save()){
            return redirect()->route('news-event');
        }
    }


    public function show()
    {
        $newsevents = NewsEvent::all();


        return view('news-and-event', compact('newsevents'));
    }

    public function singleview(string $id)
    {
        $newsevent = NewsEvent::where('id', $id)->first();

        return view('single-event-news', compact('newsevent'));
    }

    public function edit(string $id)
    {
        $newsevent = NewsEvent::where('id', $id)->first();

        return view('edit-event-news', compact('newsevent'));
    }

    public function update(Request $request, string $id)
    {
        $newsevent = NewsEvent::where('id', $id)->first();


        $validator = Validator::make($request->all(), [
            'title' => 'string',
            'type' => 'string', 'max:255', 'in:News,Event',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'details' => 'string', 'max:255',
            'thumbnail' => 'image',
        ], [
            'title.required' => 'The title is required.',
            'type.required' => 'The type is required.',
            'details.required' => 'The details is required.',
            'thumbnail.image' => 'The category image must be a valid image file.',
        ]);
    

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = $newsevent->thumbnail;

        if($image = $request->file('thumbnail')){
            $imageName = time().uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('assets/image/event-news',$imageName);

            if ($newsevent->thumbnail && file_exists(public_path('assets/image/event-news/' . $newsevent->thumbnail))) {
                unlink(public_path('assets/image/event-news/' . $newsevent->thumbnail));
            }
        }

        $newsevent->title = $request->title;
        $newsevent->type = $request->type;
        $newsevent->start_date = $request->start_date;
        $newsevent->end_date = $request->end_date;
        $newsevent->details = $request->details;
        $newsevent->thumbnail = $imageName;

        if($newsevent->update()){
            return back();
        }
    }

    public function destroy(string $id)
    {
        $newsevent = NewsEvent::where('id', $id)->first();

        $newsevent->delete();

        return redirect()->route('news-event');
    }
}
