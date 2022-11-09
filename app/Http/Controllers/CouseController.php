<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Episode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CouseController extends Controller
{
    public function index()
    {
        $courses = Course::with('user')
            ->select('courses.*', DB::raw(
                '(SELECT COUNT(DISTINCT(user_id))
                FROM completions 
                INNER JOIN episodes ON completions.episode_id = episodes.id
                WHERE episodes.course_id = courses.id) AS participants'
            ))
            ->withCount('episodes')->latest()->get();
        return Inertia::render('Course/index', compact('courses'));
    }
    public function show($id)
    {
        $course = Course::where('id', $id)->with('episodes')->first();
        $watched = auth()->user()->episodes;


        return Inertia::render('Course/show', compact('course', 'watched'));
    }

    public function toggleProgress(Request $request)
    {
        $id = $request->input('episodeId');

        $user = auth()->user();
        $user->episodes()->toggle($id);
        return $user->episodes;
    }
    public function episodes()
    {
        $watched = auth()->user()->episodes;

        return Inertia::render('Couese/progressButton', compact('watched'));
    }
}
