<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditsController extends Controller
{
    public function audits(){
        $years = [
            [
                'id' => 1,
                'year' => 2024
            ],
            [
                'id' => 2,
                'year' => 2023
            ],
            [
                'id' => 3,
                'year' => 2022
            ]
        ];

        return view('audits.index', compact('years'));
    }

    public function year($year){
        $contractors = [
            [
                'id' => 1,
                'name' => 'ESKM'
            ],
            [
                'id' => 2,
                'name' => 'NIKIMT'
            ],
            [
                'id' => 3,
                'name' => 'RosSEM'
            ],
            [
                'id' => 4,
                'name' => 'MaxIL'
            ]
        ];

        return view('audits.contractors', compact('contractors', 'year'));
    }

    public function contractor($year, $contractor){
        $auditNumbers = [
            [
                'id' => 1,
                'number' => 1,
                'date' => '26.08.2022'
            ],
            [
                'id' => 2,
                'number' => 2,
                'date' => '13.01.2023'
            ],
            [
                'id' => 3,
                'number' => 3,
                'date' => '06.07.2024'
            ]
        ];

        return view('audits.auditNumbers', compact('auditNumbers', 'year'));
    }
}
