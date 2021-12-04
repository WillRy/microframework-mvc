<?php
ob_start();

require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../",'.env');
$dotenv->load();

require __DIR__ . "/../helpers/helpers.php";

require __DIR__ . "/../config/config.php";

use Core\Session;
/** @var Session $session Initialize session */
$session = new Session();

/**
 * Initialize storage link for upload
 * Inicializa link simbolico da pasta storage
 */
if(!file_exists(__DIR__."/".CONF_STORAGE_URL_PUBLIC) && !is_link(__DIR__."/".CONF_STORAGE_URL_PUBLIC)){
    symlink(CONF_UPLOAD_DIR_PUBLIC,__DIR__."/".CONF_STORAGE_URL_PUBLIC);
}


require_once __DIR__."/../routes/web.php";

ob_end_flush();