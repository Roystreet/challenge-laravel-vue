<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\ProcessReport;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    function generateReport(Request $request)
    {
        $title = $request->title;
        $start= $request->start;
        $end= $request->end;
        ProcessReport::dispatch($title,$start, $end);
        return response()->json(['message' => 'Report generated successfully!']);
    }
    
    function getReportId(Request $request)
    {
        $urlFile = Report::where('id', $request->id)->first();
       return Storage::download($urlFile->report_link);
      
    }
    
    function getReports(){

        $reports = DB::table('reports')->get();

        return response()->json( ['response' => $reports] ) ;
    }
    
}
