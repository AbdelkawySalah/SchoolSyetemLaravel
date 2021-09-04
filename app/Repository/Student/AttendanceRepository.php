<?php
namespace App\Repository\Student;
use App\Interfaces\Student\AttendanceRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;   
use App\Models\Student;
use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Attendances;
use App\Models\Sections;

use Illuminate\Support\Facades\DB;
class AttendanceRepository implements AttendanceRepositoryInterface
{
   
   
   public function index()
   {
       $Grades = Grade::with(['Sections'])->get();
    //    return $Grades;
        $list_Grades = Grade::all();
        $Teacher =Teacher::all(); 
        return view('dashboard.pages.Students.Attendance.index',compact('Grades','Teacher','list_Grades'));
   }

   public function show($id)
   {
    
    // $sections=Sections::findorfail($id);
    // return $sections;
       $students = Student::with('attendance1')->where('section_id',$id)->get();
   //   return $students;
        return view('dashboard.pages.Students.Attendance.Attendance',compact('students'));
   }

   public function edit($id)
   {
   
   }

   public function store($request)
   {
    //  return $request; 
    try {
       
        //        foreach ($request->attendences as $Key => $Value) {

        foreach ($request->attendences as $studentid => $attendence) {

             if( $attendence == 'presence' ) {
                 $attendence_status = true;
             } else if( $attendence == 'absent' ){
                 $attendence_status = false;
             }

             Attendances::create([
                 'student_id'=> $studentid,
                 'grade_id'=> $request->grade_id,
                 'classroom_id'=> $request->classroom_id,
                 'section_id'=> $request->section_id,
                 'teacher_id'=> 1,
                 'attendence_date'=> date('Y-m-d'),
                 'attendence_status'=> $attendence_status
             ]);

         }

         toastr()->success(trans('messages.success'));
         return redirect()->back();

     }

     catch (\Exception $e){
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }

   }

   public function update($request)
   {
    
   }

   public function destroy($request)
   {
    
   }
  
}