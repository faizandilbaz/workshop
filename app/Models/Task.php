<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','description','deadline','points','status','team_id','employee_id','project_id','note','getpoints'
    ];
    protected $dates = [
        'deadline'
    ];
    public function employee()
    {
        return $this->belongsTo(User::class,'employee_id');
    }   

    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }  
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }  
    public function employeenotes(){
        return $this->hasMany(Employeenote::class);
    }
}
