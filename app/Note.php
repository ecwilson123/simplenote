<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model {
    protected $fillable = ['title', 'is_public', 'body_text'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function collection()
    {
        return $this->belongsTo('App\Collection');
    }
}
