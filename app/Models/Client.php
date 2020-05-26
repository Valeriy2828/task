<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'user_id';
    // public $timestamps = false;
    protected $guarded = ['user_id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }
}
