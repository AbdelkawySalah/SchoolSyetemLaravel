<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\TeacherSectionRepositoryInterface;

class TeacherSectionsController extends Controller
{
    protected $TeachSection;
    public function __construct(TeacherSectionRepositoryInterface $TeachSection)
    {
        $this->TeachSection=$TeachSection;
    }
    public function index()
    {
        return $this->TeachSection->index();
    }

   
    public function create()
    {
        return $this->TeachSection->create();

    }

    
    public function store(Request $request)
    {
        return $this->TeachSection->store($request);

    }

    
    public function show($id)
    {
        return $this->TeachSection->show($id);

    }

   
    public function edit($id)
    {
        return $this->TeachSection->edit($id);

    }

   
    public function update(Request $request)
    {
        return $this->TeachSection->update($request);

    }

    
    public function destroy(Request $request)
    {
        return $this->TeachSection->destroy($request);

    }

   
//احضار جميع الفصول الخاصه بكل مدرس
    public function getdata()
    {
         return $this->TeachSection->getTeacherSections();

    }

    //احضار الامتحانات الخاصه بالفصل لكل مدرس علي حده
    public function getquizzes($id)
    {
         return $this->TeachSection->getquizzes($id);

    }
    
}
