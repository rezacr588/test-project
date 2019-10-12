<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function thumb(){
        return $this->images()->whereId($this->image_id)->first();
    }
}
