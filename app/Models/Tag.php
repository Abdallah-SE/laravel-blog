<?php

namespace App\Models;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];
    
    
    /*
     * Make relationship between tag and post many-to-many 
     */
    public function posts() {
        return $this->belongsToMany(Post::class);
    }
}
