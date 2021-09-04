<?php
namespace App\Repository\Subject;
use App\Interfaces\Subject\SubjectRepositoryInterface;
use Illuminate\Database\Eloquent\Model;   
use Illuminate\Support\Facades\DB;
use App\Models\Subject;

use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Teacher;
class SubjectRepository implements SubjectRepositoryInterface
{
    public function index()
    {
        $subjects=Subject::get();
        $Grades=Grade::all();
        return view('dashboard.pages.Subjects.index',compact('subjects','Grades'));
    }

    public function create()
    {
      // $Grades=Grade::get();
      // return view('dashboard.pages.Subjects.create',compact('Grades'));
    }

    public function store($request)
    {
      //return $request;
      try {
        $subjects = new Subject();
        $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
        $subjects->Grade_id = $request->Grade_id;
        $subjects->Classroom_id = $request->Class_id;
        $subjects->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('Subject.index');
    }
    catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
      
    }

    public function edit($id){

      $subject=Subject::findorfail($id);
      // return $subject;
      $grades=Grade::get();
      return view('dashboard.pages.Subjects.edit',compact('subject','grades'));

    }
    public function update($request){
      // return $request;
      try{
         $subject=Subject::findorfail($request->subjectid);
         $subject->name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
         $subject->Grade_id=$request->Grade_id;
         $subject->Classroom_id=$request->Class_id;
         $subject->save();
         toastr()->success(trans('messages.success'));
         return redirect()->route('Subject.index');

      }
      catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
    }

    public function destroy($request)
    {
      try {
        Subject::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
        // return redirect()->route('Subject.index');
    }
  
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }
}
