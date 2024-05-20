<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;

class AuditsController extends Controller
{
    public function audits(){
        $user = auth()->user();

        if ($user->id == 1){
            $audits = Audit::all();
        }else{
            $audits = Audit::query()->where('user_id', $user->id)->get();
        }

        $years_id = [];

        foreach ($audits as $item){
            $years_id[] = $item->year_id;
        }

        $years = Year::query()->whereIn('id', $years_id)->get();

        return view('audits.index', compact('years'));
    }

    public function year($yearResponse){

        $year = Year::where('year', $yearResponse)->first();

        $audits = Audit::query()->whereIn('year_id', $year)->get();

        $user_id = [];

        $user = auth()->user();

        if ($user->id != 1){
            return redirect()->route('audits.year.contractor', ['year' => $year['year'], 'contractor' => $user->id]);
        }

        foreach ($audits as $audit){
            $user_id[] = $audit->user_id;
        }

        $contractors = User::query()->whereIn('id', $user_id)->get();

        return view('audits.contractors', compact('contractors', 'year'));
    }

    public function contractor($year, $contractor){
        $yearMass= Year::where('year', $year)->first();

        $user = auth()->user();

        $isSubContractor = false;

        if ($user->id == 1){
            $auditNumbers = Audit::query()->where('user_id', $contractor)->where('year_id', $yearMass->id)->get();
        }else{
            $auditNumbers = Audit::query()->where('user_id', $user->id)->where('year_id', $yearMass->id)->get();
            $isSubContractor = true;
        }

        return view('audits.auditNumbers', compact('auditNumbers', 'year', 'isSubContractor'));
    }
}
