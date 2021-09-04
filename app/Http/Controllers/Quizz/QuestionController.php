<?php

namespace App\Http\Controllers\Quizz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Quizzes\QuestionRepositoryInterface;
class QuestionController extends Controller
{
   private $Question;
    public function __construct(QuestionRepositoryInterface $Question)
    {
        $this->Question=$Question;
    }
    public function index()
    {
        return $this->Question->index();
    }

    public function create()
    {
        return $this->Question->create();

    }

   
    public function store(Request $request)
    {
        return $this->Question->store($request);

    }

    
    public function show($id)
    {
        return $this->Question->show($id);

    }

  
    public function edit($id)
    {
        return $this->Question->edit($id);

    }

    
    public function update(Request $request)
    {
        return $this->Question->update($request);

    }

   
    public function destroy(Request $request)
    {
        return $this->Question->destroy($request);

    }
}
