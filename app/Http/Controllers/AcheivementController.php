<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcheivementRequest;
use App\Models\Acheivement;
use Illuminate\Http\Request;

class AcheivementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ? $request->search : null;
        return inertia('Acheivements/Index', ['acheivements' => Acheivement::when($search, function ($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%");
            $q->orWhere('date', 'LIKE', "%{$search}%");
            $q->orWhere('description', 'LIKE', "%{$search}%");
        })->paginate(5)->withQueryString()]);
    }
    public function create()
    {
        return inertia("Acheivements/Form");
    }
    public function store(AcheivementRequest $request)
    {
        $valid = $request->validated();
        if (Acheivement::create($valid))
            return to_route("acheivement.index")->with("success", "Successfully created new acheivement!");
    }
    public function edit(Acheivement $acheivement)
    {
        return inertia("Acheivements/Form", ['acheivement' => $acheivement]);
    }

    public function update(AcheivementRequest $request, Acheivement $acheivement)
    {
        $valid = $request->validated();
        $acheivement->update($valid);
        return to_route("acheivement.index")->with("success", "Updated Successfully!");
    }

    public function destroy(Acheivement $acheivement)
    {
        if ($acheivement->delete())
            return back()->with('success', 'Record Deleted!');
        else
            return back()->with('error', 'Something went wrong!');
    }
}
