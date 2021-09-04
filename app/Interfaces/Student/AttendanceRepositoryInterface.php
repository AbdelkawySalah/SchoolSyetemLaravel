<?php
namespace App\Interfaces\Student;
interface AttendanceRepositoryInterface
{
   public function index();
   public function edit($id);
   public function show($id);
   public function store($request);
   public function update($request);
   public function destroy($request);
 
}