<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['hkey', 'org_url', 'view_counter', 'disabled', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
