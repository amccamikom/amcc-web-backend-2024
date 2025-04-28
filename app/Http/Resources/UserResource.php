<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    /**
     * Mengubah data yang dikirimkan sebelumnya array menjadi format json
     * Melakukan filtering data yang dihasilkan dalam format json
     */
    public function toArray(Request $request): array
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'role' => $this->role,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
