<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\LanguageException;
use App\Repository\LanguageRepository;

final class LanguageService
{
    private LanguageRepository $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function checkAndGet(int $languageId): object
    {
        return $this->languageRepository->checkAndGet($languageId);
    }

    public function getAll(): array
    {
        return $this->languageRepository->getAll();
    }

    public function getOne(int $languageId): object
    {
        return $this->checkAndGet($languageId);
    }

    public function create(array $input): object
    {
        $language = json_decode((string) json_encode($input), false);

        return $this->languageRepository->create($language);
    }

    public function update(array $input, int $languageId): object
    {
        $language = $this->checkAndGet($languageId);
        $data = json_decode((string) json_encode($input), false);

        return $this->languageRepository->update($language, $data);
    }

    public function delete(int $languageId): void
    {
        $this->checkAndGet($languageId);
        $this->languageRepository->delete($languageId);
    }
}
