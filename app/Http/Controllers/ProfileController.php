<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
	/**
     * Takes to Application Profile page.
     *
     * @return view /app/profile
     */
    public function index()
    {
    	return view('app.profile');
    }
}
