<?php

namespace App\Controllers;

use App\Models\User;
use Core\DB\Connect;
use Core\DB\DB;
use Services\Pager;

class UserController extends BaseController
{
    /**
     * Rota que renderiza layout que lista usuarios de forma paginada
     * e com pesquisa
     */
    public function index()
    {
        $search = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRIPPED) ?? "";
        $page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT) ?? 1;
        $query = DB::table("users");
        if (!empty($search) && str_search($search) !== "all") {
            $search = str_search($search);
            $query->where("users.first_name LIKE :search")->params(['search' => "%{$search}%"]);
        }

        $pager = new Pager(url("/users?search={$search}&page="));
        $pager->pager($query->count(), 5, (!empty($page) ? $page : 1));

        $users = $query->limit($pager->limit())->offset($pager->offset())->get();
        echo $this->view->render("users/index", [
            "users" => $users,
            "search" => $search,
            "paginator" => $pager->render()
        ]);
    }

    /**
     * Exemplo de endpoint que retorna JSON
     */
    public function users()
    {
        $search = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRIPPED) ?? "";
        $page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT) ?? 1;

        $usersModel = new User();

        $total = $usersModel->paginatedUsersTotal($search);

        $pager = new Pager(url("/users?search={$search}&page="));
        $pager->pager($total, 5, (!empty($page) ? $page : 1));

        $users = $usersModel->paginatedUsers($search, $pager->limit(), $pager->offset());

        $this->responseJSON([
            "pages" => $pager->pages(),
            "total" => $total,
            "users" => $users,
        ]);
    }

    /**
     * Exemplo de endpoint que retorna JSON com status code personalizado
     */
    public function profile(array $data)
    {
        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
        $user = DB::table("users")->where("id = :id")->params(["id" => $id])->first();
        if (empty($user)) {
            $this->responseJSON([
                "user" => null,
                "error" => "user_not_found"
            ], 404);
        }

        $this->responseJSON([
            "user" => $user
        ]);
    }

    /**
     * Exemplo de rota que mostra métodos de debug
     */
    public function debug()
    {
        $user = DB::table("users")->first();
        debugContinue($user); //debug sem parar o codigo
        echo "test";

        debug($user); //debug que pausa execução
        echo "test";
    }
}