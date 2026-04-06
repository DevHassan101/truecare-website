<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    
    public function index() {
        $doctors = User::role('doctor')->paginate(10);
        return view('admin.pages.doctors.index', compact('doctors'));
    }
}
