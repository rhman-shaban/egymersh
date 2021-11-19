<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Page extends Model
{
    use HasFactory;



    public function add($data)
    {
        $this->admin_id = Auth::guard('admin')->id();
        $this->title_ar = $data['title_ar'];
        $this->title_en = $data['title_en'];
        $this->content_en = $data['content_en'];
        $this->content_ar = $data['content_ar'];
        $this->active = $data['active'];

        return $this->save();
    }



    public function edit($data)
    {

        $this->title_ar = $data['title_ar'];
        $this->title_en = $data['title_en'];
        $this->content_en = $data['content_en'];
        $this->content_ar = $data['content_ar'];
        $this->active = $data['active'];
        
        return $this->save();
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }
}
