<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $search = $request->search ? $request->search : null;
        return inertia('Education/Index', ['educations' => Education::when($search, function($q) use($search){
                $q->where('course_name', 'LIKE', "%{$search}%");
                $q->orWhere('course_duration', 'LIKE', "%{$search}%");
                $q->orWhere('passing_year', 'LIKE', "%{$search}%");
                $q->orWhere('course_works', 'LIKE', "%{$search}%");      
                $q->orWhere('institute', 'LIKE', "%{$search}%");      
                $q->orWhere('result', 'LIKE', "%{$search}%");
        })->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Education/Form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EducationRequest $request)
    {
        $valid = $request->validated();
        if(Education::create($valid))
        return to_route('education.index')->with('success', 'Education Information Added!');

        return back()->with('error', 'Something went wrong!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return inertia('Education/Form', ['education' => $education]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EducationRequest $request, Education $education)
    {
        $valid = $request->validated();
        if($education->update($valid))
        return to_route('education.index')->with('success', 'Education Information Updated!');

        return back()->with('error', 'Something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        if($education->delete())
        return back()->with('success', 'Record Deleted!');

        return back()->with('error', 'Something went wrong!');

    }
}
