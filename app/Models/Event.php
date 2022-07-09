<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getDeadlineAttribute($date)
    {
            return Carbon::parse($date)->format('Y-m-d');
    }
    public function getCreatedAtAttribute($date)
    {
            return Carbon::parse($date)->format('Y-m-d');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, fn($query, $search) =>
            $query->where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('body', 'like', '%'.$search.'%');
            })
        );
    }
}
