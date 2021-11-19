<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;
use Auth;
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;



    public function add($data)
    {
        $this->name = $data['name'];
        $this->username = $data['username'];
        $this->password = Hash::make($data['password']);
        $this->active = $data['active'];
        $this->role = $data['active'];
        $this->admin_id = Auth::guard('admin')->id();
        return $this->save();
    }


     public function edit($data)
    {
        $this->name = $data['name'];
        $this->username = $data['username'];
        if(!empty($data['password'])) {
              $this->password = Hash::make($data['password']);
        }
        $this->active = $data['active'];
        return $this->save();
    }

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/' . $this->image);

    }//end of get image path


    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name' , 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('username', 'like', "%$search%");
        });
        
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }
}
