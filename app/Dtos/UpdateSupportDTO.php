<?php

namespace App\Dtos;

use App\Http\Requests\CreateActionUpdate;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public string $status,
        public string $body,
    ) {
    }

    public static function makeFromRequest(CreateActionUpdate $request): self
    {
        return new self(
            $request->id,
            $request->subject,
            'a',
            $request->body,
        );
    }
}
