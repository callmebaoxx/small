<?php

namespace App\Database\Migration;

class Schema extends \Illuminate\Support\Facades\Schema
{
    public static function connection($name)
    {
        $schema = static::$app['db']->connection($name)->getSchemaBuilder();
        return self::_changeBlueprint($schema);
    }

    protected static function getFacadeAccessor()
    {
        return 'db.custom.schema';
    }

    protected static function _changeBlueprint($schema)
    {
        $schema->blueprintResolver(function($table, $callback) {
            return new CustomBlueprint($table, $callback);
        });
        return $schema;
    }
}