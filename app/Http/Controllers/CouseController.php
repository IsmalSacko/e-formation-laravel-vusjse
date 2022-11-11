<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:courses',
            'description' => 'required',
            'episodes' =>  ['required', 'array'],
            'episodes.*.title' => 'required',
            'episodes.*.description' => 'required',
            'episodes.*.video_url' => 'required',

        ]);

        $course = Course::create($request->all());
        foreach ($request->input('episodes') as $episode) {
            $episode['course_id'] = $course->id;
            Episode::create($episode);
        }

        return Redirect::route('dashboard')->with('success', 'Félicitation, la formation a bien été mise en ligne avec succès ');
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
