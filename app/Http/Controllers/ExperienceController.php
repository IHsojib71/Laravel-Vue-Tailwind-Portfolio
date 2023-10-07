<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ? $request->search : null;
        return inertia('Experience/Index', ['experiences' => Experience::when($search, function($q) use($search){
            $q->where('organization', 'LIKE', "%{$search}%");
            $q->orWhere('role', 'LIKE', "%{$search}%");
            $q->orWhere('start_date', 'LIKE', "%{$search}%");
            $q->orWhere('end_date', 'LIKE', "%{$search}%");
            $q->orWhere('milestones', 'LIKE', "%{$search}%");
            $q->orWhere('note', 'LIKE', "%{$search}%");
            $q->orWhere('link', 'LIKE', "%{$search}%");
        })->paginate(5)->withQueryString()]);
    }

    public function create()
    {
        return inertia('Experience/Form');
    }

    public function store(ExperienceRequest $request)
    {
        $valid = $request->validated();
        if(Experience::create($valid))
            return to_route('experience.index')->with('success', 'Experience Added Successfully!');

        return back()->with('error', 'Something Went Wrong!');
    }

    public function edit(Experience $experience)
    {
        return inertia('Experience/Form', ['experience' => $experience]);
    }

    public function update(ExperienceRequest $request, Experience $experience )
    {
        $valid = $request->validated();
        if($experience->update($valid))
            return to_route('experience.index')->with('success', 'Experience Updated Successfully!');

        return back()->with('error', 'Something Went Wrong!');
    }

    public function destroy(Experience $experience)
    {
        if($experience->delete())
            return back()->with('success', 'Experience Deleted Successfully!');

        return back()->with('error', 'Something Went Wrong!');
    }
}
