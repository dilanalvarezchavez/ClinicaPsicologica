<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
            // 'roles' => RoleResource::collection($this->roles),
            // 'permissions' => PermissionResource::collection($this->permissions),
            'user' => UserResource::make($this->resource),
            // 'professional' => ProfessionalResource::make($this->resource),
        ];
    }
}
