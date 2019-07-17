<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlantController extends Controller
{
    ///ADMIN CONTROLLER FUNCTIONS//////
    public function adminIndex(){
        $plants = Plant::all();
        return view('admin.product.index', compact('plants'));
    }
    public function create(){
        return view('admin.plant.create');
    }

    public function store(Req $request){
        $formInput = $request->except('image');
        //validation

        $this->validate($formInput, [
            'name' => 'required',
            'slug' => 'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);
        //image upload
        $image = $request->image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('img/plants/', $imageName);
            $formInput['image'] = $imageName;
        }

        Plant::create($formInput);
        return redirect()->route('plant.index');
    }
    public function edit($id){
        $plant = Plant::find($id);
        return view('admin.plant.edit', compact('plant'));
    }

    public function update(Request $request, $id){
        $plant=Plant::find($id);
        $formInput=$request->except('image');
//        validation
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        //        image upload
        $image=$request->image;
        $imageName = $plant->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('img/plants/', $imageName);
            //$formInput['image'] = $imageName;
        }
        else{
            $imageName = $plant->image;
        }
        
         $plant->name = $request->name;
         $plant->slug = $request->slug;
         $plant->details = $request->details;
         $plant->description = $request->description;
         $plant->image = $imageName;
         $plant->save();

        return redirect()->route('plant.index');
    }

    public function destroy($id)
    {
        $plant = Plant::find($id);
        $plant->destroy();
        return back();
    }
    public function delete($id)
    {
        $plant = Plant::find($id);
        $plant->is_deleted = 1;
        $plant->save();
        return redirect()->route('plant.index');
    }
    public function activate($id)
    {
        $plant = Plant::find($id);
        $plant->is_deleted = 0;
        $plant->save();
        return back();
    }

}
