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

    public function session()
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