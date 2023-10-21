<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = [
        'published_at'
    ];
    protected $fillable = [
        'title',
        'description',
        'content',
        'published_at',
        'image',
        'category_id',
        'user_id',
    ];
    
    public function deleteImage() {
        Storage::delete($this->image);
    }
    
    /**
     * Make relationship between post and category 
     *
     *
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    /*
     * Make relationship between post and tag many-to-many 
     */
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
    
    public function hasTag($id) {
        return in_array($id, $this->tags->pluck('id')->toArray());
        
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function scopeSearched($query) {
        $search = request()->query('search');
        
        if(!$search){
            return $query->published();
        }
        return $query->published()->where('title', "LIKE", "%{$search}%");
    }
    
    public function scopePublished($query) {
        return $query->where('published_at', '<=', now());
    }
}
