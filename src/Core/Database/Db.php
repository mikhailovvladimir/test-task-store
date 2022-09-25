<?php

namespace Core\Database;

abstract class Db
{
    protected static $instance;

    protected function insert(array $newEntry): bool
    {
        $fileName = $this->getFileName();
        $allEntryFromFile = $this->getAll();

        if (empty($allEntryFromFile)) {
            $allEntryFromFile[1] = $newEntry;
        } else {
            $allEntryFromFile[] = $newEntry;
        }

        if (file_exists(__DIR__ . '/../../DatabaseFiles/' . $fileName)) {
            $pathToFile = __DIR__ . '/../../DatabaseFiles/' . $fileName;
            file_put_contents($pathToFile, json_encode($allEntryFromFile, JSON_PRETTY_PRINT));
            return true;
        }

        return false;
    }

    public function getAll()
    {
        $fileName = $this->getFileName();
        $allEntry = '';
        if (file_exists(__DIR__ . '/../../DatabaseFiles/' . $fileName)) {
            $fileName = fopen(__DIR__ . '/../../DatabaseFiles/' . $fileName, 'r');
            while (!feof($fileName)) {
                $allEntry .= fgets($fileName);
            }

            fclose($fileName);
            return json_decode($allEntry, true);
        }

        return false;
    }

    public function getById(int $id)
    {
        if ($id < 1) {
            return false;
        }

        $allEntryFromFile = $this->getAll();
        if (!empty($allEntryFromFile[$id])) {
            return $allEntryFromFile[$id];
        }

        return null;
    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            return new static();
        }

        return static::$instance;
    }

    abstract protected function getFileName(): string;
}