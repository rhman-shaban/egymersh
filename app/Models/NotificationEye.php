<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationEye extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function notification()
    {
        return $this->belongsTo(Notification::class);
        
    }//end of notification

}//emd of model
