<?php

namespace App\Models\Admin;

use App\User;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
