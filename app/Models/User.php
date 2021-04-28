<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','image','detail','status','api_token','company_id','team_id'

    ];
    public function setPasswordAttribute($value){
        if (!empty($value)){
            $this->attributes['password'] = Hash::make($value);
        }
    }
    public function setImageAttribute($value){
        if(is_string($value)){
            $this->attributes['image'] = ImageHelper::saveImageFromApi($value,'images'); 
        }
        else if(is_file($value)){
            $this->attributes['image'] = ImageHelper::saveImage($value,'images'); 
        }
    }
    // public function Team(){
    //     return $this->hasMany(CompanyWallet::class);
    // }
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }  
    public function workshopemployee(){
        return $this->hasMany(WorkshopEmployee::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }
    public function results(){
        return $this->hasMany(Result::class);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function totalworkshop()
    {
        return $this->hasMany(Workshop::class)->where('company_id',Auth::user()->company->id)->count();
    }
}
