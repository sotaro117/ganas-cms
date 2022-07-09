<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
 
    protected $guarded = [];

    protected $with = ['categories', 'user'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, fn($query, $search) =>
            $query->where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('body', 'like', '%'.$search.'%');
            })
        );
    
        $query->when($filters['categories'] ?? null, fn($query, $categories) => 
            $query->whereHas('categories', fn($query) => 
                $query->where('name', $categories)
            )
        );

        $query->when($filters['user'] ?? null, fn($query, $user) => 
            $query->whereHas('user', fn($query) => 
                $query->where('last_name', $user)
                    ->orWhere('first_name', $user)    
            )
        );
    }


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function getCreatedAtAttribute($date){
            return Carbon::parse($date)->format('Y-m-d');
    }

   
}
