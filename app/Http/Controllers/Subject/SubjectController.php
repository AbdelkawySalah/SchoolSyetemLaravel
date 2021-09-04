<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Subject\SubjectRepositoryInterface;
class SubjectController extends Controller
{
    
    private $Subject;
    public function __construct(SubjectRepositoryInterface $Subject)
    {
	       //Sections1 اصبح فيها كل اللي في ريبروستري 

        $this->Subject=$Subject;
    }

    public function index()
    {
        return   $this->Subject->index();

    }

  
    public function create()
    {
     return   $this->Subject->create();

    }

    
    public function store(Request $request)
    {
       return $this->Subject->store($request);

    }

    
    public function show($id)
    {
        return $this->Subject->show($id);

    }

   
    public function edit($id)
    {
        return $this->Subject->edit($id);
    }

   
    public function update(Request $request)
    {
        return $this->Subject->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->Subject->destroy($request);
    }
}
