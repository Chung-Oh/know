<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::with(['levels', 'categories', 'users'])->get();

        return view('admin/dashboard')
            ->with(['questions' => $questions]);
    }
}
