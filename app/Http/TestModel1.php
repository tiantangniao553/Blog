<?php
/**
 * Created by PhpStorm.
 * User: 13566
 * Date: 2017/11/9
 * Time: 21:39
 */
namespace App\Http;

use Illuminate\Database\Eloquent\Model;

class TestModel1 extends Model
{
    protected $table = "article";
    public $timestamps = false;
    public function comments()
    {
        return $this->hasOne('App\Http\TestModel2','authorid');
    }
}