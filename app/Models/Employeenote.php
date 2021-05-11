<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeenote extends Model
{
    use HasFactory; 
    protected $fillable = [
        'title','message','task_id','reply','team_id','employee_id','project_id'
    ];
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }  
    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }  
    public function task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }  
    public function employee()
    {
        return $this->belongsTo(User::class,'employee_id');
    }  
}
