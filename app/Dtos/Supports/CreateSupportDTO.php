<?php

namespace App\Dtos\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\CreateActionUpdate;

class CreateSupportDTO
{
    public function __construct(
        public string $subject,
        public SupportStatus $status,
        public string $body,
    ) {
    }

    public static function makeFromRequest(CreateActionUpdate $request): self
    {
        return new self(
            $request->subject,
            SupportStatus::A,
            $request->body,
        );
    }
}
