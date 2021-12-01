<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\CmsException;

final class CmsRepository
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

    public function checkAndGet(int $cmsId): object
    {
        $query = 'SELECT * FROM `cms` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $cmsId);
        $statement->execute();
        $cms = $statement->fetchObject();
        if (! $cms) {
            throw new CmsException('Cms not found.', 404);
        }

        return $cms;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `cms` ORDER BY `id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function create(object $cms): object
    {
        $query = 'INSERT INTO `cms` (`id`, `name`) VALUES (:id, :name)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $cms->id);
        $statement->bindParam('name', $cms->name);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $cms, object $data): object
    {
        if (isset($data->name)) {
            $cms->name = $data->name;
        }

        $query = 'UPDATE `cms` SET `name` = :name WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $cms->id);
        $statement->bindParam('name', $cms->name);

        $statement->execute();

        return $this->checkAndGet((int) $cms->id);
    }

    public function delete(int $cmsId): void
    {
        $query = 'DELETE FROM `cms` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $cmsId);
        $statement->execute();
    }
}
