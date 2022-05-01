<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\models\Report;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ProcessReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $title;
    protected $start;
    protected $end;
  
    public function __construct($title,$start, $end)
    {
        $this->start = $start;
        $this->end = $end;
        $this->title = $title;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $name ="report_".time().".xlsx";
        $fileDirectory = 'public/';
        Excel::store(new UsersExport($this->start,$this->end), $name, 'public');
        $path = Storage::path($name);
        $report = new Report();
        $report->title = $this->title;
        $report->report_link = "$fileDirectory$name";
        $report->save();
    }
}
