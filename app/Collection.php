<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model {
    protected $fillable = ['name', 'color', 'is_public'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function notes()
    {
        $this->hasMany('App\Note');
    }
}
