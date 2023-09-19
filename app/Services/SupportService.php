<?php

namespace App\Http\Services;

use App\Dtos\CreateSupportDTO;
use App\Dtos\UpdateSupportDTO;
use App\Http\Repository\SupportRepositoryInterface;
use stdClass;

class SupportService
{
    public function __construct(
        protected SupportRepositoryInterface $repository
    ) {
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function create(CreateSupportDTO $dto): stdClass
    {
        return $this->repository->create($dto);
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string|int $id): void
    {
        $this->repository->delete($id);
    }
}
