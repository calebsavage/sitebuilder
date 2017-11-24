<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
Use App\Site;
Use App\Page;
Use Auth;
Use DB;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only'=>'create','store','edit','update']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    public function create($site_slug){


        $data =['title'=>"Create Page"];
        $data['site'] = Site::where('slug',$site_slug)->firstOrFail();
        return view('create_page', $data);
    }

    public function store(Request $request){


        $page = new Page([
            'slug'      => $request->input('slug'),
            'title'     => $request->input('title'),
            'template'  => $request->input('template'),
            'content'   => $request->input('content'),
            'site_id'   => $request->input('site_id')
        ]);

        $page->save();

        return redirect('sites');

    }


    public function edit($site_slug, $page_slug){


        $page = Page::where('slug', $page_slug)->firstOrFail();

        return view($page->template.'_edit_template', array('page'=>$page, 'title'=>$page->title));

    }
    public function update(Request $request){


//        $page = new Page([
//            'slug'      => $request->input('slug'),
//            'title'      => $request->input('title'),
//            'template' => $request->input('template'),
//            'content'=> $request->input('content'),
//            'site_id' => $request->input('site_id')
//
//        ]);
print_r($request->input());
        Page::where('id', $request->input('page_id'))
            ->update([
            //'slug'      => $request->input('slug'),
            'title'      => $request->input('title'),
            'template' => $request->input('template'),
            'content'=> $request->input('content'),
        ]);

//        $page = Page::where('id', $request->input('id'))->findOrFail();
echo 'here';
        //return view($page->template.'_template', array('page'=>$page));
    }

    public function show($site_slug, $page_slug){
        $data['page'] = Page::where('slug', $page_slug)->firstOrFail();

        $data['menu_items'] = $data['page']->site()->pages();
        $data['title']= $data['page']->title;

        return view($data['page']->template.'_template', $data);
    }


//
//    public function store(Request $request){
//
//
//        $site = new Site([
//            'slug'      => $request->input('slug')),
//            'title'      => $request->input('title')),
//            'description'=> $request->input('description')),
//            'user_id' => Auth::user()->id
//        ]);
//
//        $site->save();
//        echo 'saved';
//
//
//    }


}
