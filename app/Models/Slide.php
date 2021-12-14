<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Slide extends Model
{
    use HasFactory;

    public function admin()

    {

        return $this->belongsTo(Admin::class);
    }


    public function add($data , $image)

    {

       $this->title_ar = $data['title_ar'];
       $this->title_en = $data['title_en'];
       $this->sub_title_ar = $data['sub_title_ar'];
       $this->sub_title_en = $data['sub_title_en'];
       $this->big_title_ar = $data['big_title_ar'];
       $this->big_title_en = $data['big_title_en'];
       $this->button_text_ar = $data['button_text_ar'];
       $this->button_text_en = $data['button_text_en'];
       $this->link = $data['link'];
       $this->active = $data['active'];
       $this->image = $image;
       $this->admin_id = Auth::guard('admin')->id();
       return $this->save();

   }

   public function edit($data , $image)

   {

       $this->title_ar = $data['title_ar'];
       $this->title_en = $data['title_en'];
       $this->sub_title_ar = $data['sub_title_ar'];
       $this->sub_title_en = $data['sub_title_en'];
       $this->big_title_ar = $data['big_title_ar'];
       $this->big_title_en = $data['big_title_en'];
       $this->button_text_ar = $data['button_text_ar'];
       $this->button_text_en = $data['button_text_en'];
       $this->link = $data['link'];
       $this->active = $data['active'];
       $this->image = $image;
       return $this->save();
   }
}
