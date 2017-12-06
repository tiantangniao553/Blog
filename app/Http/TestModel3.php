<?php
/**
 * Created by PhpStorm.
 * User: 13566
 * Date: 2017/11/9
 * Time: 21:39
 */
namespace App\Http;

use Illuminate\Database\Eloquent\Model;


class TestModel3 extends Model
{
    protected $table = "users";
    public $timestamps = false;

}