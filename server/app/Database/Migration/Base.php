<?php

namespace App\Database\Migration;

use Illuminate\Database\Migrations\Migration;

class Base extends Migration
{
    protected $_table;

    public function getTable()
    {
        return $this->_table;
    }

    public function setTable($table)
    {   
        $this->_table = $table;
    }

    public function down()
    {
        return true;
    }
}