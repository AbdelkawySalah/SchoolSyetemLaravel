<?php
namespace App\Repository\Quizzes;
use App\Interfaces\Quizzes\QuizzRepositoryInterface;
use Illuminate\Database\Eloquent\Model;   
use Illuminate\Support\Facades\DB;

use App\Models\Quizze;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class QuizzRepository implements QuizzRepositoryInterface
{
    public function index(){
       $quizzes=Quizze::get();
    //    return $quizzes;
       return view('dashboard.pages.Quizzes.index',compact('quizzes'));
    }

    public function create(){
       return 'dddddd';
      //  return view('dashboard.pages.Quizzes.create');
       
    }

    public function store($request){
        return $request;
      try{
         $Quizze=new Quizze();
         $Quizze->name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
         $Quizze->Qdate=$request->Quizze_Date;
         $Quizze->teachersect_id=$request->teachersectionid;
         $Quizze->status=1;
         $Quizze->save();
         toastr()->success(trans('messages.success'));
         return redirect()->route('getdata',$request->teacherid);
      }
      catch (\Exception $e) {
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }

    }

    public function edit($id){
      //  return $id;
      $data['quizzes']=Quizze::findorfail($id);
       $data['grades']=Grade::all();
       $data['subjects']=Subject::all();

       return view('dashboard.pages.Quizzes.edit',$data);
    }
    public function update($request){
    // return $request;
   try{
      $Quizze=Quizze::findorfail($request->Quizzid);
      $Quizze->name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
      $Quizze->subject_id=$request->Subject_id;
      $Quizze->Grade_id=$request->Grade_id;
      $Quizze->Classroom_id=$request->Class_id;
      $Quizze->section_id=$request->section_id;
      $Quizze->save();
      toastr()->success(trans('messages.success'));
      return redirect()->route('Quizz.index');
   }
   catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
       
    }

    public function destroy($request){
      //   return $request;
      try
      {
         Quizze::destroy($request->quizz_id);
         toastr()->error(trans('messages.Delete'));
         return redirect()->back();
      }
      catch (\Exception $e)
      {
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

    }
}