<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'password', 'status', 'team_group_id'];

    // علاقة "ينتمي إلى" مع جدول المجموعات (TeamGroup)
    public function teamGroup()
    {
        return $this->belongsTo(TeamGroup::class);
    }
}
