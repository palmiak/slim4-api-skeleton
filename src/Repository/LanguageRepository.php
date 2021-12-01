<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\LanguageException;

final class LanguageRepository
{
    private \PDO $database;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function getDb(): \PDO
    {
        return $this->database;
    }

    public function checkAndGet(int $languageId): object
    {
        $query = 'SELECT * FROM `language` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $languageId);
        $statement->execute();
        $language = $statement->fetchObject();
        if (! $language) {
            throw new LanguageException('Language not found.', 404);
        }

        return $language;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `language` ORDER BY `id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function create(object $language): object
    {
        $query = 'INSERT INTO `language` (`id`, `name`, `market_share`) VALUES (:id, :name, :market_share)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $language->id);
        $statement->bindParam('name', $language->name);
        $statement->bindParam('market_share', $language->market_share);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $language, object $data): object
    {
        if (isset($data->name)) {
            $language->name = $data->name;
        }
        if (isset($data->market_share)) {
            $language->market_share = $data->market_share;
        }

        $query = 'UPDATE `language` SET `name` = :name, `market_share` = :market_share WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $language->id);
        $statement->bindParam('name', $language->name);
        $statement->bindParam('market_share', $language->market_share);

        $statement->execute();

        return $this->checkAndGet((int) $language->id);
    }

    public function delete(int $languageId): void
    {
        $query = 'DELETE FROM `language` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $languageId);
        $statement->execute();
    }
}
