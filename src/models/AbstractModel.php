<?php

namespace App\models;

use App\utils\Str;
use PDO;

/**
 * Base model for communicating with the database
 */
abstract class AbstractModel
{

    /**
     * The table name that make queries
     */
    protected ?string $table = null;

    protected ?PDO $pdo = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        if (is_null($this->pdo)) {
            $this->pdo = new PDO(
                'mysql:host='. env('db.host') .';dbname='. env('db.name'),
                env('db.user'), env('db.password'), [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        }
    }
    /**
     * Get all the records of a table
     *
     * @return array
     */
    public function all()
    {
        return $this->pdo->query("SELECT * FROM {$this->getTable()}")
            ->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Find a record in the database
     *
     * @param integer $id : the id of the record
     * 
     * @return mixed
     */
    public function find(int $id)
    {
        $pdoStatement = $this->pdo->prepare("SELECT * FROM {$this->getTable()} WHERE id = :id");
        $pdoStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();
        $found = $pdoStatement->fetch(PDO::FETCH_OBJ);

        if ($found === false) {
            throw new \PDOException("The record with the id of {$id} is not found in [{$this->getTable()}]", 1);
        }

        return $found;
    }

    /**
     * Delete a value in the database
     *
     * @param integer $id : The id of the record
     * 
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $pdoStatement = $this->pdo->prepare("DELETE FROM {$this->getTable()} WHERE id = :id");
        $pdoStatement->bindParam(':id', $id, PDO::PARAM_INT);
        return $pdoStatement->execute();
    }

    /**
     * Get a class table's name
     * 
     * @return string
     */
    protected function getTable(): string
    {
        if (is_null($this->table)) {
            $namespace_exploded = explode('\\', get_called_class());
            $class_name = $namespace_exploded[array_key_last($namespace_exploded)];
            return Str::pluralize(strtolower($class_name));
        }

        return $this->table;
    }
}
