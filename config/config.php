<?php
/**
 * DATABASE
 */
define("CONF_PDO_OPT",[
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
    \PDO::ATTR_CASE => \PDO::CASE_NATURAL
]);
define("CONF_DB_DRIVER", env("CONF_DB_DRIVER", "mysql"));
define("CONF_DB_PORT", env("CONF_DB_PORT", "3306"));
define("CONF_DB_HOST",  env("CONF_DB_HOST", "127.0.0.1"));
define("CONF_DB_USER",  env("CONF_DB_USER", "root"));
define("CONF_DB_PASS", env("CONF_DB_PASS", "root"));
define("CONF_DB_NAME", env("CONF_DB_NAME", "example"));


/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", env("CONF_URL_BASE", "http://localhost"));
define("CONF_URL_TEST", env("CONF_URL_BASE", "http://localhost"));

/**
 * SITE
 */
define("CONF_SITE_NAME", env("CONF_SITE_NAME", "Simple App"));
define("CONF_SITE_TITLE", env("CONF_SITE_TITLE", "Simple App"));
define("CONF_SITE_DESC",  env("CONF_SITE_DESC", "Simple App"));
define("CONF_SITE_LANG", env("CONF_SITE_LANG", "pt_BR"));
define("CONF_SITE_DOMAIN", env("CONF_SITE_DOMAIN", "localhost"));
define("CONF_SITE_ADDR_STREET", env("CONF_SITE_ADDR_STREET", ""));
define("CONF_SITE_ADDR_NUMBER", env("CONF_SITE_ADDR_NUMBER", ""));
define("CONF_SITE_ADDR_COMPLEMENT", env("CONF_SITE_ADDR_COMPLEMENT", ""));
define("CONF_SITE_ADDR_CITY", env("CONF_SITE_ADDR_CITY", ""));
define("CONF_SITE_ADDR_STATE", env("CONF_SITE_ADDR_STATE", ""));
define("CONF_SITE_ADDR_ZIPCODE", env("CONF_SITE_ADDR_ZIPCODE", ""));

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../resources/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "cafeweb");


/**
 * UPLOAD
 */
define("CONF_UPLOAD_FOLDER",  "storage");
define("CONF_UPLOAD_DIR", __DIR__."/../".CONF_UPLOAD_FOLDER);
define("CONF_UPLOAD_DIR_PUBLIC",  __DIR__."/../".CONF_UPLOAD_FOLDER."/public");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * STORAGE RELATIVE URL
 */
define("CONF_STORAGE_URL_PUBLIC",  "storage");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_STORAGE_URL_PUBLIC . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * MAIL
 */
define("CONF_MAIL_HOST", env("CONF_MAIL_HOST"));
define("CONF_MAIL_PORT", env("CONF_MAIL_PORT"));
define("CONF_MAIL_USER", env("CONF_MAIL_USER"));
define("CONF_MAIL_PASS", env("CONF_MAIL_PASS"));
define("CONF_MAIL_SENDER", ["name" => env("CONF_MAIL_SENDER_NAME"), "address" => env("CONF_MAIL_SENDER_ADDRESS")]);
define("CONF_MAIL_SUPPORT", env("CONF_MAIL_SUPPORT"));
define("CONF_MAIL_OPTION_LANG", env("CONF_MAIL_OPTION_LANG"));
define("CONF_MAIL_OPTION_HTML", env("CONF_MAIL_OPTION_HTML"));
define("CONF_MAIL_OPTION_AUTH", env("CONF_MAIL_OPTION_AUTH"));
define("CONF_MAIL_OPTION_SECURE", env("CONF_MAIL_OPTION_SECURE"));
define("CONF_MAIL_OPTION_CHARSET", env("CONF_MAIL_OPTION_CHARSET"));

