<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OnlineExam;

class OnlineExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('online-exam');
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
        $exam = new OnlineExam();


        $exam->name = $request->name;
        $exam->type = $request->type;
        $exam->subject = $request->subject;
        $exam->start_date = $request->date;
        $exam->time = $request->time;

        $exam->save();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
