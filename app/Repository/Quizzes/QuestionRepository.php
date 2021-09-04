<?php
namespace App\Repository\Quizzes;
use App\Interfaces\Quizzes\QuestionRepositoryInterface;

use App\Models\Quizze;
use App\Models\Question;

 class QuestionRepository implements QuestionRepositoryInterface
{
    public function index()
    { 
       $questions=Question::get();
       return view('dashboard.pages.Questions.index',compact('questions'));
    }

    public function create()
    {
        // $quizze=Quizze::;
        // return view('dashboard.pages.Questions.create',compact('quizze'));
    }
    public function show($id)
    {
        $quizze=Quizze::findorfail($id);
        $question=Question::where('quizze_id',$id)->get();
        // return $question;
        return view('dashboard.pages.Questions.create',compact('quizze','question'));
    }
    public function store($request)
    {
       // return $request;
        try{
            $questions=new Question();
            $questions->question=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
            $questions->answers=['ar'=>$request->answer_ar,'en'=>$request->answer_en];
            $questions->right_answer=['ar'=>$request->rightanswer_ar,'en'=>$request->rightanswer_en];
            $questions->score=$request->score_id;
            $questions->quizze_id=$request->Quiezzid;
            $questions->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Question.show');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $question=Question::findorfail($id);
        $quizze=Quizze::all();
        return view('dashboard.pages.Questions.edit',compact('question','quizze'));
        // return $question;
    }

    public function update($request)
    {
    //    return $request;
        try{
            $question=Question::findorfail($request->questionid);
            $question->question=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
            $question->answers=['ar'=>$request->answer_ar,'en'=>$request->answer_en];
            $question->right_answer=['ar'=>$request->rightanswer_ar,'en'=>$request->rightanswer_en];
            $question->score=$request->score_id;
            $question->quizze_id=$request->quizze_id;
            $question->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Question.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        // return $request;
        try{
           Question::destroy($request->question_id);
        //    Question::findorfail($request->question_id)->delete();
           toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }
        catch (\Exception $e)
        {
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}