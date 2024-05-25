<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\AuditData;
use App\Models\Year;
use Illuminate\Database\Eloquent\Model;
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

        return view('audits.data', compact('auditData', 'year', 'contractor'));
    }

    public function save(Request $request){
        $uri = $_SERVER["REQUEST_URI"];

        $uriArray = explode('/', $uri);
        $year = $uriArray[2];
        $contractor = $uriArray[3];
        $auditId = $uriArray[4];

        $text = $request->input('commentForm');
        $id = $request->input('id');
        $rowId = $request->input('row-id');

        $audit_data = AuditData::query()->where('id', $id)->first();

        if ($rowId == 'respondent_comments'){
            $audit_data->respondent_comments = $text;
        }elseif ($rowId == 'auditor_comments'){
            $audit_data->auditor_comments = $text;
        }

        $audit_data->save();

        $auditData = AuditData::query()->where('audit_id', $auditId)->get();

        return view('audits.data', compact('auditData', 'year', 'contractor'));
    }
}
