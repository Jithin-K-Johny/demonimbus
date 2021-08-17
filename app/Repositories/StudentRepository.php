<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository {
    protected $model;

    public function __construct(Student $studentModel) {
       $this->model = $studentModel;
    }
}