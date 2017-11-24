<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
Use App\Site;
Use App\Page;
Use Auth;
Use DB;

class SitesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only'=>'create','store']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Sites";

        $data['sites'] = Site::all();

        $data['my_sites'] = Site::where('user_id', Auth::id())->get();


        return view('sites', $data);
    }

    public function create(){
        return view('create_site');
    }

    public function store(Request $request){


        $site = new Site([
            'slug'      => strip_tags($request->input('slug')),
            'title'      => strip_tags($request->input('title')),
            'description'=> strip_tags($request->input('description')),
            'user_id' => Auth::user()->id
        ]);

        $site->save();
        $request->session()->flash('status', 'New site '.$site->title.' created.');
        return redirect('/sites');


    }

    public function show($slug){
        $site = Site::where('slug', $slug)->firstOrFail();
        if(!$page = Page::where('id', $site->default_page)->first()){
            if(!$page=Page::where('site_id', $site->id)->first()){
                die('no default page and no pages');
            }
        }

        return redirect('/'.$site->slug.'/'.$page->slug);


    }


}
