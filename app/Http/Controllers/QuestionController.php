<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OnlineExam;

use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::with('onlineExam')->get();

        return view('question',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams =  OnlineExam::all();

        return view('add-question',compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => 'required|exists:online_exams,id',
            'pdf_path' => 'required|mimes:pdf|max:10240',
        ]);

        $question = new Question();

        $question->exam_id = $request->exam_id;

        $pdfPath = "";

        if($pdf = $request->file('pdf_path')){
            $pdfPath = time().uniqid().'.'.$pdf->getClientOriginalExtension();
            $pdf->move('assets/image/question',$pdfPath);
        }

        $question->pdf_path = $pdfPath;

        $question->save();

        return redirect()->route('question');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::find($id);

        if (!$question) {
            return redirect()->route('question');
        }

        $filePath = public_path('assets/image/question/' . $question->pdf_path);

        if (file_exists($filePath)) {
            unlink($filePath);
        } else {
            return redirect()->route('question');
        }

        $question->delete();

        return redirect()->route('question');
    }
}
