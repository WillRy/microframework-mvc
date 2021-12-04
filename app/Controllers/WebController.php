<?php

namespace App\Controllers;

use App\Models\User;
use Services\Thumb;

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
}