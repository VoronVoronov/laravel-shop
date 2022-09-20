<?php

namespace App\Http\Controllers\Filters;

use App\Http\Controllers\Controller;

class FiltersController extends Controller
{
    public static function category()
    {
        $data = array(
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        );
        return $data;
    }

    public function city(){
        $data = array(
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        );
        return $data;
    }
}
