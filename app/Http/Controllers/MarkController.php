<?php

namespace App\Http\Controllers;

use App\Models\OnlineExam;

use App\Models\Question;

use App\Models\Mark;

use App\Models\User;

use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marks = Mark::all();

        $questions = Question::with('onlineExam')->get();

        $users = User::all();

        return view('mark',compact('marks','questions','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questions =  Question::all();


        return view('submit-answer',compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mark = new Mark();

        $mark->user_id = $request->user_id;
        $mark->question_id = $request->question_id;

        $pdfPath = "";

        if($pdf = $request->file('pdf_path')){
            $pdfPath = time().uniqid().'.'.$pdf->getClientOriginalExtension();
            $pdf->move('assets/image/answer',$pdfPath);
        }

        $mark->pdf_path = $pdfPath;

        $mark->save();

        return redirect()->route('mark');
    }


    public function update(Request $request, string $id)
    {
        $mark = Mark::where('id', $id)->first();

        $mark->mark = $request->mark;

        if($mark->update()){
            return redirect()->route('mark');
        }
    }


    public function destroy(string $id)
    {
        
        $mark = Mark::find($id);

        if (!$mark) {
            return redirect()->route('mark');
        }

        $filePath = public_path('assets/image/answer/' . $mark->pdf_path);

        if (file_exists($filePath)) {
            unlink($filePath);
        } else {
            return redirect()->route('mark');
        }

        $question->delete();

        return redirect()->route('mark');
    }
}
