<?php

namespace App\Models;

use Core\DB\DB;

class User
{
    public $db;
    protected $entity = "users";

    public function __construct()
    {
        $this->db = DB::table($this->entity);
    }

    /**
     * Lista com instancia pré configurada do query builder
     * @param int $limit
     * @param int $offset
     * @return array|null
     */
    public function list($limit = 10, $offset = 0)
    {
        return $this->db->select(["id","first_name","email","status"])->limit($limit)->offset($offset)->get();
    }

    /**
     * Lista com Query builder diretamente
     * @param int $limit
     * @param int $offset
     * @return array|null
     */
    public function listAll()
    {
        return DB::table($this->entity)->select(["id","first_name","email","status"])->get();
    }
}