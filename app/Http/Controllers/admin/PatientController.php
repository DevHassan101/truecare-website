<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index() {
        $patients = User::role('user')->paginate(10);
        return view('admin.pages.patinets.index', compact('patients'));

    }
}
