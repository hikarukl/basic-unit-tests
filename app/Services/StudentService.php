<?php

namespace App\Services;

use App\Models\User;

class StudentService
{
    public function getAllStudents()
    {
        return User::all();
    }
}
