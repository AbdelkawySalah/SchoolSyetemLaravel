<?php

namespace App\Http\Controllers\Quizz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Interfaces\Quizzes\QuizzRepositoryInterface;
class QuizzController extends Controller
{
    private $quizz;
    public function __construct(QuizzRepositoryInterface $quizz){
        $this->quizz=$quizz;
    }
    public function index()
    {
        return $this->quizz->index();
    }

    
    public function create()
    {
        return $this->quizz->create();

    }

    
    public function store(Request $request)
    {
        return $this->quizz->store($request);

    }

    
    public function show($id)
    {
        return $this->quizz->show($id);

    }

   
    public function edit($id)
    {
        return $this->quizz->edit($id);

    }

   
    public function update(Request $request)
    {
        return $this->quizz->update($request);

    }

   
    public function destroy(Request $request)
    {
        return $this->quizz->destroy($request);

    }
}
