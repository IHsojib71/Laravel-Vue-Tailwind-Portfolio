<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function edit()
    {
        $skills = Skill::firstOrCreate([]);
        return inertia('Skills/Form', ['skill' => $skills]);

    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $valid = $request->validated();
        $skill->update($valid);
        return back()->with('success','Updated Successfully!');
    }


}
