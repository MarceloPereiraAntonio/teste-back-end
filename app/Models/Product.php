<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id',];

    public function scopeFilter($query, $request)
    {
        if(filled($request->id)){
            $query->where('id', $request->id);
        }
        if(filled($request->name)){
            $query->where('name', 'LIKE', "%{$request->name}%");
        }
        if(filled($request->category)){
            $query->where('category', 'LIKE', "%{$request->category}%");
        }
        if ($request->filled('has_image')) {
            if ($request->has_image === '1') {
                $query->whereNotNull('image_url');
            } elseif ($request->has_image === '0') {
                $query->whereNull('image_url');
            }
        }
    }
}
