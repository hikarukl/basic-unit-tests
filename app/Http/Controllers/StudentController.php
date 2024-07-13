<?php

namespace App\Http\Controllers;

use App\Services\StudentService;

class StudentController extends Controller
{
    public StudentService $studentService;
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function getAllStudents()
    {
        $students = $this->studentService->getAllStudents()->all();

        return response()->json([
            'students' => $students
        ]);
    }

    /**
     * Get student by name
     *
     *
     * @param string $studentName
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getStudentHasException($studentName)
    {
        if (empty($studentName)) {
            throw new \Exception('Student name is required');
        }

        return response()->json([
            'student' => [
                'name' => $studentName,
                'age' => 20
            ]
        ]);
    }
}
