<?php

namespace Rahamatj\Kaiju;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function extra()
    {
        return optional(json_decode($this->extra));
    }

    public function date()
    {
        return Carbon::parse($this->created_at);
    }
}