<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function index()
    {
        $workers = Worker::orderBy('order', 'asc')
            ->get();

        return view('employees.index', [
            'employees' => $workers
        ]);
    }

    public function show(Worker $employer)
    {
        return view('employees.show', [
            'employer' => $employer,
            'detailed' => true
        ]);
    }

}
