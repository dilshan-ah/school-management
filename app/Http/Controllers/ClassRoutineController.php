<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClassRoutine;

use Carbon\Carbon;

class ClassRoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassRoutine::all();

        foreach ($classes as $class) {
            $class->formattedStartTime = Carbon::parse($class->start_time)->format('g:i A');
            $class->formattedEndTime = Carbon::parse($class->end_time)->format('g:i A');
        }

        return view('class',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'days' => 'required|array',
            'days.*' => 'in:Sat,Sun,Mon,Tue,Wed,Thu,Fri',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $class = new ClassRoutine();

        $class->subject = $request->subject;
        $class->days = json_encode($request->days);
        $class->start_time = $request->start_time;
        $class->end_time = $request->end_time;

        // $daysArray = json_decode($class->days);

        if($class->save()){
            return redirect()->route('class');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = ClassRoutine::where('id', $id)->first();

        return view('edit-class',compact('class'));
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'subject' => 'string|max:255',
            'days' => 'array',
            'days.*' => 'in:Sat,Sun,Mon,Tue,Wed,Thu,Fri',
            'end_time' => 'after:start_time',
        ]);

        $class = ClassRoutine::where('id', $id)->first();

        $class->subject = $request->subject;
        $class->days = json_encode($request->days);
        $class->start_time = $request->start_time;
        $class->end_time = $request->end_time;

        if ($class->update()) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = ClassRoutine::where('id', $id)->first();

        $class->delete();

        return back();
    }
}
