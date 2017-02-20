<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;
use Mail;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $movies = Movies::all();
        $movies= Movies::orderBy('title','asc')->paginate(2);
        return view('movies')->withMovies($movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state="Add";
        $action="/movies";
        return view('moviecreate')->withState($state)->withAction($action);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating the form
        $this->validate($request, [
         'title' =>'required|unique:movies|max:255',
         'year' =>'required|numeric',
         'description' =>'required'
     ]);

        //attach request to tje object
        $movie = new Movies();
        $movie ->title = $request ->title;
        $movie ->year = $request ->year;
        $movie ->description = $request ->description;

        //save
        $movie -> save();
        //redirect
        return redirect()->route('movies.show', $movie->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movies::find($id);
        return view('movieshow')->withMovie($movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie=Movies::find($id);
        $state="Edit";
        $action="/movies/".$movie->id;
        return view('moviecreate',compact('movie','state','action'));
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
        //find the record
        $movie=Movies::find($id);

        if($request->input('title') === $movie->title){

         // validating the form
         $this->validate($request, [

         'year' =>'required|numeric',
         'description' =>'required|min:5'
         ]);
    }else{

          // validating the form
         $this->validate($request, [

         'title' =>'required|unique:movies|min:3|max:55',
         'year' =>'required|numeric',
         'description' =>'required|min:5'
     ]);
}
        //attach request to tje object
        $movie = new Movies();
        $movie ->title = $request ->title;
        $movie ->year = $request ->year;
        $movie ->description = $request ->description;

        //save
        $movie -> save();
        //redirect
        return redirect()->route('movies.featured', $movie->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
        $movie=Movies::find($id);
        $movie->delete();

        return redirect()->route('movies.index');
    

    }
    public function getFeaturedmovie($title)
    {
        $movie = Movies::where('title',$title)->first();
        return view('movieshow')->withMovie($movie);
    }
    public function postSuggestMovie(Request $request)
    {
       $this->validate($request,[
            'title'=>'required|min:3',
            'email'=>'required|email'
        ]);
       $data=[
            'email'=>$request->email,
            'title'=>$request->title,
            'checkbox'=>$request->checkbox
       ];
       Mail::send('suggesteremail',$data,function($message)use($data){
        //header info
        $message->from('Schlockpicker@mailgun.org');
        $message->to($data['email']);
        $message->subject('Thank you for suggesting'.$data['title']);

       });
       return redirect()->action("PageController@getIndex");
    }





}
