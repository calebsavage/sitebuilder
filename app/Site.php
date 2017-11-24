<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\Page;

class Site extends Model
{
    protected $table = 'sites';
    protected $fillable = ['slug','title','description','user_id'];
    //

    public function pages(){


        $pages = Page::where('site_id', $this->id)->get();

        return $pages;
    }

    public function user(){

        return User::where('id', $this->user_id)->firstOrFail();

    }
}
