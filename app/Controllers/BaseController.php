<?php

namespace App\Controllers;

use Services\Message;
use Core\View;

abstract class BaseController
{
    /** @var View */
    protected $view;

    /** @var Message */
    protected $message;

    /**
     * Controller constructor.
     * @param string|null $pathToViews
     */
    public function __construct()
    {
        $this->view = new View(__DIR__."/../../resources/views");
        $this->message = new Message();
    }

    public function responseJSON(array $data)
    {
        header("Content-Type: application/json");
        echo json_encode($data);
        exit;
    }
}
