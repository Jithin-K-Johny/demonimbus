<?php

namespace App\Managers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\AdminRepository;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminManager {
    protected $repo;
    
    public function __construct(AdminRepository $adminRepository)
    {
        $this->repo = $adminRepository;
    }

    public function adminView()
    {
        return view('admin::admin_view');
    }


    public function ajax()
    {
        // $user_data = User::all();
        $user_data = DB::table('users')->get();
        
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

