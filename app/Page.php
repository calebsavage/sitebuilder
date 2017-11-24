<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\site;

class Page extends Model
{

    protected $table = 'pages';
    protected $fillable = ['slug','title','content','site_id', 'template'];
    //

    public function site(){

        return Site::where('id', $this->site_id)->firstOrFail();

    }


}
