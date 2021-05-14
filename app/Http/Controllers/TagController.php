<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getTags(){
        $tags = [[
            'id' => 1,
            'name' => 'Mondag',
            'selected' => false,
        ],
        [
            'id' => 2,
            'name' => 'Tirsdag',
            'selected' => false,
        ],
        [
            'id' => 3,
            'name' => 'Onsdag',
            'selected' => false,
        ],
        [
            'id' => 4,
            'name' => 'Torsdag',
            'selected' => false,
        ],
        [
            'id' => 5,
            'name' => 'Fredag',
            'selected' => true,
        ],
        [
            'id' => 6,
            'name' => 'Lordag',
            'selected' => true,
        ],
        [
            'id' => 7,
            'name' => 'Sonndag',
            'selected' => true,
        ],
        [
            'id' => 8,
            'name' => 'Ingenting',
            'selected' => true,
        ]];
        return $tags;
    }
}
