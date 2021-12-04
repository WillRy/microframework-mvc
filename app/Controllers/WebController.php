<?php

namespace App\Controllers;

use App\Models\User;
use Core\Session;

class WebController extends BaseController
{
    public function home()
    {
        echo $this->view->render("home", [
            "head" => ""
        ]);
    }

    public function users(?array $data)
    {
        $dados = (new User())->list();
        $this->responseJSON([
            "GET OR POST DATA" => $data,
            "QUERY" => $dados
        ]);
    }

    public function session(?array $data)
    {
        $session = new Session();
        $session->set("test", "any value");
        $session->set("array", ["value" => "1"]);

        $this->responseJSON([
            "has_test" => $session->has("test"),
            "all" => $session->all(),
        ]);
    }
}