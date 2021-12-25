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

    public function subquery()
    {
        /**
         * Join com subquery
         * joinSub
         * leftJoinSub
         * rightJoinSub
         */

        /** objeto de query builder, sem executar(->get(), ->first())*/
        $emails = DB::table("mail_queue");

        $users = DB::table("users as u")
            ->selectRaw("u.id as usuario, sub.subject as assunto_email")
            ->leftJoinSub($emails,'sub',"sub.from_email = u.email")
            ->get();

        dump($users);
    }

    public function queryBuilder()
    {
        $users = DB::table("users as u")
            ->select([
                "u.id",
                "u.first_name",
                'GROUP_CONCAT(distinct CONCAT_WS(";", p.id, p.`number`) SEPARATOR "|") as numeros',
                'GROUP_CONCAT(distinct CONCAT_WS(";", a.id, a.name) SEPARATOR "|") as enderecos'
            ])
            ->leftJoin("phone as p ON p.user_id = u.id")
            ->leftJoin("address as a ON a.user_id = u.id")
            ->groupBy(["u.id"])
            ->limit(10)
            ->offset(0)
            ->get();

        foreach ($users as $user) {
            $phone = splitGroupConcats($user->numeros,"|",";",["id", "number"]);
            $address = splitGroupConcats($user->enderecos,"|",";",["id", "name"]);

            $user->phone = $phone;
            $user->address = $address;
        }
        $this->responseJSON($users);
    }

    public function rawQuery()
    {
        $stmt = Connect::getInstance()->prepare('
            select
                u.id,
                u.first_name,
                GROUP_CONCAT(distinct CONCAT_WS(";", p.id, p.`number`) SEPARATOR "|") as numeros,
                GROUP_CONCAT(distinct CONCAT_WS(";", a.id, a.name) SEPARATOR "|") as enderecos
            from
                users u
            left join phone p on
                p.user_id = u.id
            left join address a on
                a.user_id = u.id
            group by
                u.id
            limit 10 offset 0
        ');
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

        foreach ($result as $user) {
            $phone = splitGroupConcats($user->numeros,"|",";",["id", "number"]);
            $address = splitGroupConcats($user->enderecos,"|",";",["id", "name"]);

            $user->phone = $phone;
            $user->address = $address;
        }
        $this->responseJSON($result);
    }
}