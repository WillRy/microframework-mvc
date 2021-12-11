<?php

namespace Core\DB;

abstract class Model
{
    public $table;
    public $db;

    public function __construct()
    {
        $this->table = $this->getTable();
        $this->db = DB::table($this->table);
    }

    protected function modelName()
    {
        return strtolower(substr(strrchr(pluralUSA(2, static::class), "\\"), 1));
    }

    public function getTable()
    {
        if(empty($this->table)){
          return $this->table = $this->modelName();
        }
        return $this->table;
    }
}