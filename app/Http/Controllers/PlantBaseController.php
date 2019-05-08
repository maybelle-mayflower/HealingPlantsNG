<?php

namespace App\Http\Controllers;
use App\Plant;
use Illuminate\Http\Request;

class PlantBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants = Plant::all();
        return view('admin.plant.index', compact('plants'));
    
    }
    
    public function show($slug)
    {
        $plant = Plant::where('slug', $slug)->firstOrFail();
        return view('front.plant')->with('plant', $plant);
    }
    public function single($slug){
        
        $plant = Plant::where('slug', $slug)->firstOrFail();
        return view('front.plantsingle')->with('plant', $plant);
    }

    public function shop()
    {
        $plants = Plant::inRandomOrder()->take(12)->get();
        return view('front.shop')->with('plants', $plants);
  
    }

    public function indextwo(){
        $data = Plant::orderBy('name')->paginate(8);
        return view('front.plantbase', compact('data'));    
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
         $sort_by = $request->get('sortby');
         $sort_type = $request->get('sorttype');
               $query = $request->get('query');
               $query = str_replace(" ", "%", $query);
         $data = Plant::where('name', 'like', '%'.$query.'%')->orderBy($sort_by, $sort_type)->paginate(8);
         return view('front.plantbased', compact('data'))->render();
        
       
     }
    }
    public function adminIndex(){
        $plants = Plant::all();
        return view('admin.product.index', compact('plants'));
    }
    public function create(){
        return view('admin.plant.create');
    }

    public function store(Request $request){
        $formInput = $request->except('image');
        //validation

        $this->validate($request, [
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
    
}
