<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function edit()
    {
        $skills = Skill::first();
        return inertia('Skills/Form', ['skill' => $skills]);

    }

    public function update(SkillRequest $request)
    {
        $skill= Skill::first();
        $valid = $request->validated();
        if($skill)
        $skill->update($valid);
        else
        $skill->create($valid);
        return back()->with('success','Updated Successfully!');
    }


}
