<?php

namespace App\Http\Controllers;
use App\Plant;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as Req;

//use Request;

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

        ///CLIENT END CONTROLLER FUNCTIONS//////

    
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
    public function search(){
        $q = Request::get ( 'q' );
        if($q != ""){
        //$data = Plant::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'details', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
        $data = Plant::where ( 'name', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );

        $pagination = $data->appends ( array (
           'q' => Request::get ( 'q' ) 
         ) );
        if (count ( $data ) > 0){
            return view ( 'front.plantbase', compact('data') )->withDetails ( $data )->withQuery ( $q );
            }
            else{
                return view ( 'front.plantbase', compact('data') )->with('failureMsg', 'No Details found. Try to search again !' );

            }
        }
        else{
            $data = Plant::orderBy('name')->paginate(8);
            return view('front.plantbase', compact('data')); 
        }
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
