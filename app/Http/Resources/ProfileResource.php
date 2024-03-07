<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $values =  parent::toArray($request);
        if(isset($values['image'])){
            $values['image'] = url('storage/'.$values['image']);
        }
        $values['created'] = date_format(date_create($values['created_at']),'d-m-Y');
        unset($values['created_at'],$values['password']);
        return $values;
    }
    public static function collection($resource)
    {
        $values =  parent::collection($resource)->additional([
            'count' =>$resource->count()
        ]);
        return $values;
    }
}
