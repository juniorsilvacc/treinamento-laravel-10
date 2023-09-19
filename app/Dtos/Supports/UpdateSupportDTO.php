<?php

namespace App\Dtos\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\CreateActionUpdate;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public SupportStatus $status,
        public string $body,
    ) {
    }

    public static function makeFromRequest(CreateActionUpdate $request): self
    {
        return new self(
            $request->id,
            $request->subject,
            SupportStatus::A,
            $request->body,
        );
    }
}
