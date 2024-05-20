<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\AuditData;
use Illuminate\Http\Request;

class AuditLoadController extends Controller
{
    public function index(){
        $audits = Audit::all();
        $message = '';
        return view('voyager.add_audit', compact('audits', 'message'));
    }

    public function load(Request $request){
        $audits = Audit::all();

        $audit_id = $request->input('audit_id');

        $uploadedFile = request()->file('audit_load'); // Получаем объект UploadedFile

        // Проверяем, загружен ли файл
        if ($uploadedFile) {

            $originalName = $uploadedFile->getClientOriginalName(); // Получаем оригинальное имя файла
            $uploadDirectory = "uploads/";

            // Генерируем уникальное имя файла
            $newFileName = uniqid() . '_' . $originalName;

             //Полный путь к файлу на сервере
            $targetFile = $uploadDirectory . $newFileName;

             //Перемещаем файл из временной директории в указанную
            $arCell = [];
            if ($uploadedFile->move($uploadDirectory, $newFileName)) {

                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetFile);
                $worksheet = $spreadsheet->getActiveSheet();

                foreach ($worksheet->getRowIterator() as $key => $row) {

                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(FALSE);
                    foreach ($cellIterator as $cell) {
                          $arCell[$key][] =  $cell->getValue();

                    }

                }
                foreach ($arCell as $key => $row){
                    if ($key < 1) continue;
                    if (!isset($row[0])) continue;
                    $audit_data = new AuditData();
                    $audit_data->audit_id = $audit_id;
                    $audit_data->paragraph_qap = $row[1];
                    $audit_data->questions = $row[2];
                    $audit_data->requirements = $row[3];
                    $audit_data->save();
                }
            }
            $message = 'OK';

            return view('voyager.add_audit', compact('message', 'audits'));
        }
        $message = 'NE OK';
        return view('voyager.add_audit', compact('message', 'audits'));
    }
}
