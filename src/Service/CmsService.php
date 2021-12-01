<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\CmsException;
use App\Repository\CmsRepository;

final class CmsService
{
    private CmsRepository $cmsRepository;

    public function __construct(CmsRepository $cmsRepository)
    {
        $this->cmsRepository = $cmsRepository;
    }

    public function checkAndGet(int $cmsId): object
    {
        return $this->cmsRepository->checkAndGet($cmsId);
    }

    public function getAll(): array
    {
        return $this->cmsRepository->getAll();
    }

    public function getOne(int $cmsId): object
    {
        return $this->checkAndGet($cmsId);
    }

    public function create(array $input): object
    {
        $cms = json_decode((string) json_encode($input), false);

        return $this->cmsRepository->create($cms);
    }

    public function update(array $input, int $cmsId): object
    {
        $cms = $this->checkAndGet($cmsId);
        $data = json_decode((string) json_encode($input), false);

        return $this->cmsRepository->update($cms, $data);
    }

    public function delete(int $cmsId): void
    {
        $this->checkAndGet($cmsId);
        $this->cmsRepository->delete($cmsId);
    }
}
