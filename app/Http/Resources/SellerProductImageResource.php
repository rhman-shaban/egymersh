<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Storage;
class SellerProductImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->is , 
            'image_path_front' =>  Storage::disk('s3')->url('products/'.$this->front_image) , 
            'image_path_back' =>  Storage::disk('s3')->url('products/'.$this->back_image) , 
        ];
    }
}
