<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\OnlineExam;

use Carbon\Carbon;

class OnlineExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams =  OnlineExam::all();

        foreach ($exams as $exam) {
            $exam->formattedTime = Carbon::parse($exam->time)->format('g:i A');
        }

        return view('online-exam',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-exam');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'type' => 'required', 'string', 'max:255',
            'subject' => 'required',
            'start_date' => 'nullable|date',
            'time' => ['required', 'date_format:H:i'],
        ], [
            'name.required' => 'The name is required.',
            'type.required' => 'The type is required.',
            'subject.required' => 'The subject is required.',
        ]);
    

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $exam = new OnlineExam();


        $exam->name = $request->name;
        $exam->type = $request->type;
        $exam->subject = $request->subject;
        $exam->start_date = $request->start_date;
        $exam->time = $request->time;

        if($exam->save()){
            return redirect()->route('exam');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exam = OnlineExam::where('id', $id)->first();

        return view('edit-exam',compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string', 'max:255',
            'type' => 'string', 'max:255',
            'subject' => 'string', 'max:255',
            'start_date' => 'nullable|date',
        ],);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $exam = OnlineExam::where('id', $id)->first();


        $exam->name = $request->name;
        $exam->type = $request->type;
        $exam->subject = $request->subject;
        $exam->start_date = $request->start_date;
        $exam->time = $request->time;

        if($exam->update()){
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exam = OnlineExam::where('id', $id)->first();

        if($exam->delete()){
            return back();
        }
    }
}
