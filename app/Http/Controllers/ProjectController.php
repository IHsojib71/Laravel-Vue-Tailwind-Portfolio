<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $search = $request->search ? $request->search : null;
        return inertia('Projects/Index', ['projects' => project::when($search, function($q) use($search){
                $q->where('title', 'LIKE', "%{$search}%");
                $q->orWhere('duration', 'LIKE', "%{$search}%");
                $q->orWhere('description', 'LIKE', "%{$search}%");
                $q->orWhere('github', 'LIKE', "%{$search}%");      
                $q->orWhere('live', 'LIKE', "%{$search}%");      
        })->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Projects/Form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $valid = $request->validated();
        if($request->file('image')){
            $path = public_path('images/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
            $valid['image'] = 'images/'.$imageName;
         }
         else{
           $valid = Arr::except($valid, 'image');
         }

        if(Project::create($valid))
        return to_route('project.index')->with('success', 'Project Information Added!');

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
    public function edit(Project $project)
    {
        return inertia('Projects/Form', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $valid = $request->validated();
        if($request->file('image')){
            if ($project!=null AND File::exists(public_path($project->image))) 
                      File::delete(public_path($project->image));
            
            $path = public_path('images/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
            $valid['image'] = 'images/'.$imageName;  
         }
         else{
           $valid = Arr::except($valid, 'image');
         }

        if($project->update($valid))
        return to_route('project.index')->with('success', 'project Information Updated!');

        return back()->with('error', 'Something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project!=null AND File::exists(public_path($project->image))) 
                      File::delete(public_path($project->image));

        if($project->delete())
        return back()->with('success', 'Record Deleted!');

        return back()->with('error', 'Something went wrong!');

    }
}
