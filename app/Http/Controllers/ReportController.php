<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    function generateReport(Request $request)
    {
        
        
        return response()->json(['message' => 'Report generated successfully!']);
    }
    
    function getReportId(Request $request)
    {
        $test= array(
            'id' => 1,
            'title' => 'Report 1',
            'report_link' => 'http://localhost:8000/report/1'
        );
        return Excel::download(new UsersExport("2000-01-01","2005-01-01"), 'users.xlsx');
    }
    
    function getReports(){

        $reports = DB::table('users')->get();

        return response()->json( ['response' => $reports] ) ;
    }
    
}
