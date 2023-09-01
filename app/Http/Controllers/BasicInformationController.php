<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\BasicInformation;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BasicInformationRequest;


class BasicInformationController extends Controller
{
   public function edit()
   {
    
    return inertia ('Basic/Form', ['basic' => 
        BasicInformation::first()
         ]);
   }


   public function update(BasicInformationRequest $request)
   {
         $valid = $request->validated();
         $BasicInformation = BasicInformation::first();

         if($request->file('image')){
            if ($BasicInformation!=null AND File::exists(public_path($BasicInformation->image))) 
                      File::delete(public_path($BasicInformation->image));
            
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

         if($BasicInformation){
            if($BasicInformation->update($valid))
            return redirect()->back()->with('success', 'Updated Successfully!');
         }
         else
         {
            if(BasicInformation::create($valid))
            return redirect()->back()->with('success', 'Updated Successfully!');
         }

         return back()->with('error', 'Something went wrong!');
   }
}
