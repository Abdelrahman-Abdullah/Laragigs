<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query , array $filters)
    {
        $query->when($filters['tag'] ?? false , function ($query , $tag){
            $query->where('tags' , 'like' , '%'.$tag.'%');
        });

        $query->when($filters['search'] ?? false , function ($query , $search){
            $query->where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%')
                    ->orWhere('tags', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%')
                    ->orWhere('location', 'like', '%'.$search.'%');
            });
        });
    }

    public function getTagsAttribute($tags): array
    {
        return explode(',' , $tags);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
