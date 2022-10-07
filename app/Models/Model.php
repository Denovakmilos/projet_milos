<?php

namespace App\Models;

use PDO;
use Database\DBConnection;

abstract Class Model {
    protected $db;
    protected $table;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        #$stmt = $this->db->getPDO()->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        #$stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        #return $stmt->fetchAll();
    }


    public function findById(int $id): Model
    {
        #return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true); 
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create(array $data, ?array $relations = null)
    {
        $firstParenthesis = "";
        $secondeParenthesis = "";
        $i=1;

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? "" : ",";
            $firstParenthesis .= "{$key}{$comma}";
            $secondeParenthesis .= ":{$key}{$comma}";
            $i++;
        }

        return $this->query("INSERT INTO {$this->table} ($firstParenthesis) VALUES ($secondeParenthesis)", $data);

    }

    public function update(int $id, array $data, ?array $relations = null) 
    {
        $sqlRequestPart = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? " " : ",";
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        $data['id'] = $id;

        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} WHERE id = :id", $data);

        #$sql = "UPDATE {$this->table} SET title = :title, content = :content WHERE id = :id";

    }

    public function destroy(int $id): bool 
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);

    }

    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        if (
            strpos($sql, 'DELETE') === 0 
            || strpos($sql, 'UPDATE') === 0 
            || strpos($sql, 'INSERT') === 0) {

                $stmt = $this->db->getPDO()->$method($sql);
                $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
                return $stmt->execute($param);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $stmt->$fetch();
        } else {
            $stmt->execute($param);
            return $stmt->$fetch();
        }

    }
}