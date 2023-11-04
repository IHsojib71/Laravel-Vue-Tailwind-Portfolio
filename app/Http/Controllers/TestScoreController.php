<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestScoreRequest;
use App\Models\TestScore;
use Illuminate\Http\Request;

class TestScoreController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ? $request->search : null;
        return inertia('TestScores/Index', ['testScores' => TestScore::when($search, function($q) use($search){
            $q->where('topic', 'LIKE', "%{$search}%");
            $q->orWhere('result', 'LIKE', "%{$search}%");
            $q->orWhere('description', 'LIKE', "%{$search}%");
        })->paginate(5)->withQueryString()]);
    }

    public function create()
    {
        return inertia('TestScores/Form');
    }

    public function store(TestScoreRequest $request)
    {
        $valid = $request->validated();
    
        if(TestScore::create($valid))
            return to_route('tests.index')->with('success', 'Test Scores Added Successfully!');

        return back()->with('error', 'Something Went Wrong!');
    }

    public function edit(TestScore $test)
    {
        return inertia('TestScores/Form', ['testscore' => $test]);
    }

    public function update(TestScoreRequest $request, TestScore $test)
    {
        $valid = $request->validated();
        if($test->update($valid))
            return to_route('tests.index')->with('success', 'Test Score Updated Successfully!');

        return back()->with('error', 'Something Went Wrong!');
    }

    public function destroy(TestScore $test)
    {
        if($test->delete())
            return back()->with('success', 'Test Score Deleted Successfully!');

        return back()->with('error', 'Something Went Wrong!');
    }
}
