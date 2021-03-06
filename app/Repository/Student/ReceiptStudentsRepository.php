<?php
namespace App\Repository\Student;
use App\Interfaces\Student\ReceiptStudentsRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;   

use App\Models\FundAccount;
//سند القبض
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface
{
   
   
   public function index()
   {
       $receipt_students=ReceiptStudent::all();
       return view('dashboard.pages.Receipt.index',compact('receipt_students'));
   }
   public function show($id)
   {
    $student=Student::findorfail($id);
   return view('dashboard.pages.Receipt.add',compact('student'));
   }

   public function edit($id)
   {
    $student=Student::findorfail($id);
    $receipt_students=ReceiptStudent::findorfail($id);
    return view('dashboard.pages.Receipt.edit',compact('receipt_students','student'));
   }

   public function store($request)
   {
    //   return $request;

    DB::beginTransaction();

        try {

            // حفظ البيانات في جدول سندات القبض
            $receipt_students = new ReceiptStudent();
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->Debit = $request->Debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // حفظ البيانات في جدول حساب الطالب
            $fund_accounts = new StudentAccount();
            $fund_accounts->move_date = date('Y-m-d');
            $fund_accounts->type = 'receipt';
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->student_id = $request->student_id;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->credit = $request->Debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('receipt_students.index');

        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


   }

   public function update($request)
   {
    DB::beginTransaction();

    try {

        // حفظ البيانات في جدول سندات القبض
        $receipt_students = ReceiptStudent::findorfail($request->recipt_id);
        // $receipt_students->date = date('Y-m-d');
        // $receipt_students->student_id = $request->student_id;
        $receipt_students->Debit = $request->Debit;
        $receipt_students->description = $request->description;
        $receipt_students->save();

        // حفظ البيانات في جدول الصندوق
        $fund_accounts =FundAccount::where('receipt_id',$request->recipt_id)->first();
        $fund_accounts->Debit = $request->Debit;
        $fund_accounts->description = $request->description;
        $fund_accounts->save();

        // حفظ البيانات في جدول حساب الطالب
        $fund_accounts = StudentAccount::where('receipt_id',$request->recipt_id)->first();
        $fund_accounts->credit = $request->Debit;
        $fund_accounts->description = $request->description;
        $fund_accounts->save();

        DB::commit();
        toastr()->success(trans('messages.success'));
        return redirect()->route('receipt_students.index');

    }

    catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

   }

   public function destroy($request)
   {
    //    return $request;
    try {
        ReceiptStudent::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }
  
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  
   }

   public function print($id){
      $receiptstudents = ReceiptStudent::findorfail($id);
    //   return $receipt_students;
    return view('dashboard.pages.Receipt.print',compact('receiptstudents'));

   }

  
}