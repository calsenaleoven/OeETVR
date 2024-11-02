<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFeedback extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'member_id', 'rating', 'comment'];

    public function project()
    {
        return $this->belongsTo(ProjectList::class);
    }

    public function member()
    {
        return $this->belongsTo(User::class);
    }
    
    public function user()
    {
        return $this->belongsTo(ProjectMembers::class, 'member_id');
    }
}