<?php
namespace App\Repository;
use  App\Models\TeacherSection;
use  App\Models\Grade;
use  App\Models\Subject;
use  App\Models\Teacher;
use  App\Models\Quizze;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;

class TeacherSectionRepository implements TeacherSectionRepositoryInterface{

    public function index()
    {
        $data['grades']=Grade::all();
        $data['subjects']=Subject::all();
        $data['teachers']=Teacher::all();
        $data['TeacherSection']=TeacherSection::all();
        return view('dashboard.pages.Teachers.TeacherSections.index',$data);
    }
    public function create()
    {
       $data['grades']=Grade::all();
       $data['subjects']=Subject::all();
       $data['teachers']=Teacher::all();

        return view('dashboard.pages.Teachers.TeacherSections.create',$data);

    }
    public function store($request){
       try{
        $TacherSection=new TeacherSection();
        $TacherSection->teacher_id=$request->Teacher_id;
        $TacherSection->Grade_id=$request->Grade_id;
        $TacherSection->Classroom_id=$request->Class_id;
        $TacherSection->section_id=$request->section_id;
        $TacherSection->subject_id=$request->Subject_id;
        $TacherSection->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('TeacherSection.create');
       }

       catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }

    public function update($request){
       
       // return $request;
        try{
            $TacherSection=TeacherSection::findorfail($request->TeacherSectionid);
            $TacherSection->teacher_id=$request->Teacherid;
            $TacherSection->Grade_id=$request->Grade_id;
            $TacherSection->Classroom_id=$request->Class_id;
            $TacherSection->section_id=$request->section_id;
            $TacherSection->subject_id=$request->subject_id;
            $TacherSection->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('TeacherSection.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
      }
  
    public function show($id){
    }
    public function edit($id){
    }

   
    public function destroy($request){
    //    return $request;
    try{
        TeacherSection::destroy($request->TeacherSectionid);
        //    Question::findorfail($request->question_id)->delete();
        toastr()->error(trans('messages.Delete'));
         return redirect()->back();
     }
     catch (\Exception $e)
     {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }

    }
   
            //الدخول علي لوحة تحكم المدرس واظهار الفصول التابع لها
      public function getTeacherSections()
      {
         $user=Auth::user()->id;
         $TeacherSection=TeacherSection::where('teacher_id',$user)->get();
        //  return $TeacherSection;
         return view('dashboard.Teacher.dashboard',compact('TeacherSection'));

      }

      //احضار اختبارات الفصل لكل مدرس علي حدة
      public function getquizzes($id)
      {
        //   return $id;
        $TacherSection=TeacherSection::with(['quizzes'])->where('teacher_id',$id)->get();
        return $TacherSection;
        // $TeacherSection=TeacherSection::where('teacher_id',$id)->get();
        // return $TeacherSection;
        // $Quizzes=

      }


    
}