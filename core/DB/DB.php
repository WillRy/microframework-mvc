<?php

namespace Core\DB;


class DB extends Query
{
    public static function table(string $entity, bool $silentErrors = false): DB
    {
        return new DB($entity, $silentErrors);
    }
}