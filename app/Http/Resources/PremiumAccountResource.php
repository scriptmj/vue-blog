<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PremiumAccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'ccname' => $this->ccname,
            'ccnumber' => $this->hideCcnumber($this->ccnumber),
            'premium_expiration_date' => $this->premium_expiration_date,
            'active' => $this->active,
        ];
    }

    private function hideCcnumber($ccnumber){
        return "xxxx-xxxx-xxxx-x".substr($ccnumber, -3);
    }
}
