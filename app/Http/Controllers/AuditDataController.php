<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\AuditData;
use App\Models\Year;
use Illuminate\Http\Request;

class AuditDataController extends Controller
{
    public function index($year, $contractor, $auditId){

        $yearMass= Year::where('year', $year)->first();

        $user = auth()->user();

        if (!$yearMass){
            return redirect()->route('logout');
        }


        if ($user->id == 1){
            $auditId = Audit::query()
                ->where('user_id', $contractor)
                ->where('year_id', $yearMass->id)
                ->where('id', $auditId)
                ->first();
        }else{

            if ($contractor != $user->id){
                $contractor = $user->id;
            }
            $auditId = Audit::query()
                ->where('user_id', $contractor)
                ->where('year_id', $yearMass->id)
                ->where('id', $auditId)
                ->first();
        }

        if (!$auditId){
            return redirect()->route('logout');
        }

        $auditData = AuditData::query()->where('audit_id', $auditId->id)->get();

        return view('audits.data', compact('auditData'));
    }
}
