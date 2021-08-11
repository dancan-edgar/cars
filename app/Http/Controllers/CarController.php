<?php

namespace App\Http\Controllers;

use App\Rules\Uppercase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarModel;
use App\Http\Requests\CreateValidationRequest;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();


        return view('cars.index',[
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequest $request)
    {
        // methods that can be used on an image

        // guessExtension()
        // getMimeType()
        // store()
        // asStore()
        // storePublicly()
        // move()
        // getClientOriginalName()
        // getClientMimeType()
        // guessClientExtension()
        // getSize()
        // getError()
        // isValid()

//        $test = $request->file('image')->isValid();
//
//        dd($test);

        $request->validate([
            'name' => 'required|unique:cars',
            'founded' => 'required|integer|min:0|max:2021',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'description' => 'required'
        ]);


        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'),$newImageName);


        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            'image_path' => $newImageName
        ]);

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $car = Car::find($id);

       return view('cars.show')->with('car',$car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::where('id',$id)->first();

        return view('cars.edit')->with('car',$car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

//        $request->validated();
//
//        $car = Car::where('id',$id)->update([
//            'name' => $request->input('name'),
//            'founded' => $request->input('founded'),
//            'description' => $request->input('description')
//        ]);
//
//        return redirect('/cars');

        $request->validate([
            'name' => 'required',
            'founded' => 'required|integer|min:0|max:2021',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'description' => 'required'
        ]);


        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'),$newImageName);


        $car = Car::where('id',$id)->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            'image_path' => $newImageName
        ]);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id)->first();

        $car->delete();

        return redirect('/cars');
    }
}
