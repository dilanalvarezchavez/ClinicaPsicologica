<?php

namespace App\Http\Resources\Papers;

use Illuminate\Http\Resources\Json\JsonResource;

class PaperResource extends JsonResource
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
            'data' => [
                'id'  => $this->id,
                'user_id' => $this->user_id,
                'dia' => $this->dia,

                'ayunas' => $this->ayunas,
                'nph_lantus' => $this->nph_lantus,
                'rapida_ultra_rap'  => $this->rapida_ultra_rap,

                'media_manana' => $this->media_manana,
                'rapida_ultra_rap_m' => $this->rapida_ultra_rap_m,

                'almuerzo' => $this->almuerzo,
                'rapida_ultra_rap_a' => $this->rapida_ultra_rap_a,

                'media_tarde' => $this->media_tarde,
                'rapida_ultra_rap_t' => $this->rapida_ultra_rap_t,

                'merienda' => $this->merienda,
                'rapida_ultra_rap_md' => $this->rapida_ultra_rap_md,
                'nph_lantus_md' => $this->nph_lantus_md,

                'dormir' => $this->dormir,
                'madrugada' => $this->madrugada,
                'correcion_total' => $this->correcion_total,
            ]
        ];
    }
}
