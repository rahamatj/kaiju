<?php
/**
 * Created by PhpStorm.
 * User: rahamatj
 * Date: 3/26/19
 * Time: 10:18 AM
 */

namespace Rahamatj\Kaiju;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function extra($field)
    {
        return optional(json_decode($this->extra))->field;
    }
}