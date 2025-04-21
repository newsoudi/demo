<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // علاقة مع أعضاء الفريق
    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }
}
