<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResearchRequest;
use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ? $request->search : null;
        return inertia('Research/Index', ['researches' => Research::when($search, function($q) use($search){
            $q->where('title', 'LIKE', "%{$search}%");
            $q->orWhere('subtitle', 'LIKE', "%{$search}%");
            $q->orWhere('teachers', 'LIKE', "%{$search}%");
            $q->orWhere('description', 'LIKE', "%{$search}%");
            $q->orWhere('link', 'LIKE', "%{$search}%");
        })->paginate(5)->withQueryString()]);
    }

    public function create()
    {
        return inertia('Research/Form');
    }

    public function store(ResearchRequest $request)
    {
        $valid = $request->validated();
    
        if(Research::create($valid))
            return to_route('research.index')->with('success', 'Research Added Successfully!');

        return back()->with('error', 'Something Went Wrong!');
    }

    public function edit(Research $research)
    {
        return inertia('Research/Form', ['research' => $research]);
    }

    public function update(ResearchRequest $request, Research $research )
    {
        $valid = $request->validated();
        if($research->update($valid))
            return to_route('research.index')->with('success', 'Research Updated Successfully!');

        return back()->with('error', 'Something Went Wrong!');
    }

    public function destroy(Research $research)
    {
        if($research->delete())
            return back()->with('success', 'Research Deleted Successfully!');

        return back()->with('error', 'Something Went Wrong!');
    }
    
}
