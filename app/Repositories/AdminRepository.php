<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\User;

class AdminRepository {
    protected $model;

    public function __construct(User $userModel) {
       $this->model = $userModel;
    }
}