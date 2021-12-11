<?php

namespace App\Models;

use Core\DB\DB;
use Core\DB\Model;
use Services\Pager;

class User extends Model
{
    /**
     * opcional (identifica automatico pelo nome da model em ingles no plural)
     */
    //public $table = "users";


    /**
     * Lista com instancia pré configurada herdada da Model
     * @param int $limit
     * @param int $offset
     * @return array|null
     */
    public function list($limit = 10, $offset = 0)
    {
        return $this->db->select(["id", "first_name", "email", "status"])->limit($limit)->offset($offset)->get();
    }

    /**
     * Lista com Query builder diretamente
     * @param int $limit
     * @param int $offset
     * @return array|null
     */
    public function listAll()
    {
        return DB::table($this->table)->select(["id", "first_name", "email", "status"])->get();
    }

    public function paginatedUsers($search = "", $limit = 10, $offset = 0)
    {
        if (!empty($search) && str_search($search) !== "all") {
            $search = str_search($search);
            $this->db->where("users.first_name LIKE :search")->params(['search' => "%{$search}%"]);
        }

        return $this->db->select(["id", "first_name", "email", "status"])->limit($limit)->offset($offset)->get();
    }

    public function paginatedUsersTotal($search = "")
    {
        if (!empty($search) && str_search($search) !== "all") {
            $search = str_search($search);
            $this->db->where("users.first_name LIKE :search")->params(['search' => "%{$search}%"]);
        }

        return $this->db->count();
    }
}