<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Episode;
use App\Youtube\YoutubeServices;
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
            ))->addSelect(DB::raw(
                '(SELECT SUM(duration)
                 FROM episodes
                 WHERE episodes.course_id = courses.id
                ) AS total_duration'
            ))
            ->withCount('episodes')->latest()->paginate(5);
        return Inertia::render('Course/index', compact('courses'));
    }

    /**
     * Méthode d'enregistrement d'une formation
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request, YoutubeServices $ytb)
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
            $episode['duration'] = $ytb->handleYoutubevideoDuration($episode['video_url']);
            Episode::create($episode);
        }

        return Redirect::route('dashboard')->with('success', 'Félicitation, la formation a bien été mise en ligne avec succès ');
    }

    /**
     * Méthode d'édition d'une formation
     * 
     * @param integer $id
     * @return void
     */
    public function edit(int $id)
    {
        $course = Course::where('id', $id)->with('episodes')->first();
        $this->authorize('update', $course);

        return Inertia::render('Course/edit', compact('course'));
    }

    public function deleteCourse(int $id)
    {
        $course = Course::where('id', $id)->with('episodes')->first();
        $course->episodes()->delete();
        $this->authorize('update', $course);

        return Inertia::render('Course/edit', compact('course'));
    }

    /**
     * Méthode de modification d'une formation
     */

    public function update(Request $request, YoutubeServices $ytb)
    {

        $course = Course::where('id', $request->id)->with('episodes')->first();
        $this->authorize('update', $course);

        $course->update($request->all());
        $course->episodes()->delete();
        foreach ($request->episodes as $episode) {
            $episode['course_id'] = $course->id;
            $episode['duration'] = $ytb->handleYoutubevideoDuration($episode['video_url']);
            Episode::create($episode);
        }

        return Redirect::route('courses.index')->with('success', 'Félicitation, la formation a bien été mise à jour avec succès ');
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
