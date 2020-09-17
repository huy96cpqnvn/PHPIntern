<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title','content', 'description', 'author', 'status', 'category_id', 'user_id','cover'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
