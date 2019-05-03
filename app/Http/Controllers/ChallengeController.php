<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Question;
use App\LevelChallenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function index()
    {
    	return view('app.challenge');
    }
}
