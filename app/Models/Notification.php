<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['title','message'];

    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->title_ar;

        } else {

            return $this->title_en;
            
        }//end of if

    }//end of get title

    public function getMessageAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->message_ar;

        } else {

            return $this->message_en;
            
        }//end of if

    }//end of get message

    public function admin()
    {
        return $this->belongsTo(Admin::class);    
    }//end of belongsTo

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('title_ar' , 'like', "%$search%")
            ->orWhere('title_en', 'like', "%$search%")
            ->orWhere('message_ar', 'like', "%$search%")
            ->orWhere('message_en', 'like', "%$search%");
            
        });

    }//end of scopeWhenSearch

}//end of model
