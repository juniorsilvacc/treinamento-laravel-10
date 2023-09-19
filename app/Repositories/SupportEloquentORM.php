<?php

namespace App\Http\Repository;

use App\Dtos\CreateSupportDTO;
use App\Dtos\UpdateSupportDTO;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function getAll(string $filter = null): array
    {
    }

    public function findOne(string $id): stdClass|null
    {
    }

    public function create(CreateSupportDTO $dto): stdClass
    {
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
    }

    public function delete(string|int $id): void
    {
    }
}
