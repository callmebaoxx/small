<?php

namespace App\Database\Migration;

use Illuminate\Support\Facades\Schema;

class Create extends Base
{
    public function dowm()
    {
        Schema::dropIfExists($this->getTable());
    }
}