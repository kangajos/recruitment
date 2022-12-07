<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function todolistDetail()
    {
        return $this->hasMany(TodolistDetail::class, "todolist_id", "id");
    }
}
