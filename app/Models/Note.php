<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory; 
    protected $fillable = [
        'title','message','project_id','reply','team_id','company_id'
    ];
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }  
    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }  
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }  
}
