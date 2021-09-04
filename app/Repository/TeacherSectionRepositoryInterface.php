<?php
namespace App\Repository;

interface TeacherSectionRepositoryInterface{

    //get all teachers
    public function index();
    public function create();
    public function edit($id);
    public function show($id);
    public function store($request);
    public function update($request);
    public function destroy($request);
    public function getTeacherSections();
    public function getquizzes($id);
//for teacher dashboard
// public function getTeacherSections($id);

}

















?>