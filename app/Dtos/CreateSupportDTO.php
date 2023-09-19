<?php

namespace App\Dtos;

use App\Http\Requests\CreateActionUpdate;

class CreateSupportDTO
{
    public function __construct(
        public string $subject,
        public string $status,
        public string $body,
    ) {
    }

    public static function makeFromRequest(CreateActionUpdate $request): self
    {
        return new self(
            $request->subject,
            'a',
            $request->body,
        );
    }
}
