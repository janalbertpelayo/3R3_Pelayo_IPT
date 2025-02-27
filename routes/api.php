<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamTypeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomStudentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherClassroomController;
use App\Http\Controllers\TeacherExamController;
use App\Http\Controllers\TeacherExamTypeController;
use App\Http\Controllers\TeacherGradeController;

Route::apiResource('students', StudentController::class);
Route::apiResource('teachers', TeacherController::class);
Route::apiResource('exams', ExamController::class);
Route::apiResource('exam-types', ExamTypeController::class);
Route::apiResource('grades', GradeController::class);
Route::apiResource('classrooms', ClassroomController::class);
Route::apiResource('classroom-students', ClassroomStudentController::class);
Route::apiResource('teacher-classrooms', TeacherClassroomController::class);
Route::apiResource('teacher-exams', TeacherExamController::class);
Route::apiResource('teacher-exam-types', TeacherExamTypeController::class);
Route::apiResource('teacher-grades', TeacherGradeController::class);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Example route for testing
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});