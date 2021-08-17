<?php

namespace App\Managers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\StudentRepository;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentManager {
    protected $repo;
    
    public function __construct(StudentRepository $studentRepository)
    {
        $this->repo = $studentRepository;
    }

    public function studentView()
    {
        return view('student::student_view');
    }


    public function ajaxStudent()
    {
        // $user_data = User::all();
        $user_data = DB::table('students')->get();
        
        if($user_data) {
            return response()->json([
                'message' => "Data Found",
                "code"    => 200,
                "data"  => $user_data
            ]);
        } else  {
            return response()->json([
                'message' => "Internal Server Error",
                "code"    => 500
            ]);
        }
    }
    
}

