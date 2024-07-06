<?php

namespace App\Helper;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait Helper
{
    public function getColumnNameTable($table)
    {
        return DB::getSchemaBuilder()->getColumnListing($table);

        return Schema::getColumnListing($table);
    }

    public function getCartSession()
    {
        return session()->get('cart') ? session()->get('cart') : null;
    }
}
