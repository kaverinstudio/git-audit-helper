<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\AuditData;
use App\Models\AuditorPhoto;
use App\Models\RespondentDocument;
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

        foreach ($auditData as $data){

            $respondent_document = RespondentDocument::query()->where('audit_data_id', $data['id'])->get();
            $docs= [];
            foreach ($respondent_document as $document){
                $docs[] = $document['document'];
            }
            $data['m_respondent'] = $docs;

            $auditor_photo = AuditorPhoto::query()->where('audit_data_id', $data['id'])->get();
            $photos = [];
            foreach ($auditor_photo as $photo){
                $photos[] = $photo['photo'];
            }
            $data['m_auditor'] = $photos;
        }
        return view('audits.data', compact('auditData', 'year', 'contractor'));
    }

    public function save(Request $request){

        $text = $request['commentForm'];
        $rowId = $request['row-id'];
        $colId = $request['col-id'];

        $audit_data = AuditData::query()->where('id', $rowId)->first();

        if ($colId == 'respondent_comments'){
            $audit_data->respondent_comments = $text;
        }elseif ($colId == 'auditor_comments'){
            $audit_data->auditor_comments = $text;
        }

        $audit_data->save();

        return response()->json(['status' => true, 'text' => $text]);
    }

    public function document_save(Request $request){

        $path = [];
        if ($request->hasFile('files')){
            $uploadedFiles = $request->file('files');

            $auditDataId = $request->input('row-id');
            $filesType = $request->input('col-id');

            foreach ($uploadedFiles as $file){

                $originalName = $file->getClientOriginalName();
                $uploadDirectory = "uploads/files/";

                $newFileName = uniqid() . '_' . $originalName;

                $targetFile = $uploadDirectory . $newFileName;

                if ($file->move($uploadDirectory, $newFileName)) {
                    if ($filesType == 'm_respondent'){
                        $respondent_document = new RespondentDocument();
                        $respondent_document->audit_data_id = $auditDataId;
                        $respondent_document->document = $targetFile;
                        $respondent_document->save();
                        $path[] = $targetFile;
                    }elseif ($filesType == 'm_auditor'){
                        $auditor_photo = new AuditorPhoto();
                        $auditor_photo->audit_data_id = $auditDataId;
                        $auditor_photo->photo = $targetFile;
                        $auditor_photo->save();
                        $path[] = $targetFile;
                    }
                }
            }
        }else{
            return response()->json(['status' => false, 'path' => $path]);
        }
        return response()->json(['status' => true, 'path' => $path]);
    }
}
