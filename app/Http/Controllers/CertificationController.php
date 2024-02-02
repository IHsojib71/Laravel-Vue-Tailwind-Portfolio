<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificationRequest;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ? $request->search : null;
        return inertia('Certifications/Index', ['certifications' => Certification::when($search, function ($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%");
            $q->orWhere('issue_date', 'LIKE', "%{$search}%");
            $q->orWhere('description', 'LIKE', "%{$search}%");
            $q->orWhere('link', 'LIKE', "%{$search}%");
        })->paginate(5)->withQueryString()]);
    }
    public function create()
    {
        return inertia("Certifications/Form");
    }
    public function store(CertificationRequest $request)
    {
        $valid = $request->validated();
        if (Certification::create($valid))
            return to_route("certification.index")->with("success", "Successfully created new certification!");
    }
    public function edit(Certification $certification)
    {
        return inertia("Certifications/Form", ['certification' => $certification]);
    }

    public function update(CertificationRequest $request, Certification $certification)
    {
        $valid = $request->validated();
        $certification->update($valid);
        return to_route("certification.index")->with("success", "Updated Successfully!");
    }

    public function destroy(Certification $certification)
    {
        if ($certification->delete())
            return back()->with('success', 'Record Deleted!');
        else
            return back()->with('error', 'Something went wrong!');
    }
}
