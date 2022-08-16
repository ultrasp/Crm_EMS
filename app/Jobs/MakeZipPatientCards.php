<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\DownloadPatientCard;
use App\Models\Subscribe;
use App\Models\Patient;
use App\Models\User;
use App\Http\Resources\Form043Resource;
use App\Http\Resources\Form025Resource;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ZipFileReady;

class MakeZipPatientCards implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    private $info;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->info = DownloadPatientCard::getOnQueque();
        if(empty($this->info))
            return;
        $sub = Subscribe::where('id',$this->info->subscriber_id)->first();
        $error = null;
        // dd($sub);
        try {
            $this->makePdfs($sub);
            $this->makeZip();
            $this->removeFolder();
            $this->sendNotify();
        }catch( \Throwable $e){
            $error = $e->getTraceAsString();
        }
        $this->info->finish($error);
    }

    public function sendNotify(){
        $users = User::where('id',$this->info->creator_id)->get();

        Notification::send($users, new ZipFileReady($this->info));

    }

    public function makePdfs($sub){
        $query = Patient::where('subscriber_id',$sub->id);
        if(strpos($this->info->card_range, ',')){
            $query->whereIn('card_number',explode(',', $this->info->card_range));
        }elseif(strpos($this->info->card_range, '-') ){
            $range = explode('-', $this->info->card_range);
            $query->whereBetween('card_number',[$range[0],$range[1]]);
        }elseif(!empty($this->info->card_range)){
            $query->where('id',-1);

        }
        $list = $query->get();
        if($list->count() > 0){
            foreach ($list as $key => $patient) {
                $this->makePatientsPdf($sub->specialization_id,$patient);
            }
        }
    }

    public function makePatientsPdf($type,$patientE){
        if($type == 1){
            $pat  = new Form043Resource($patientE);
            $patient = $pat->toArray(null);
            // dd($patient);
            $pdf = \PDF::loadView('print.form_043', compact('patient'))->setPaper('a4', 'landscape');
            \Storage::put($this->info->getPdfFolder().'/'.$patientE->card_number.'.pdf', $pdf->output());
            // $pdf->save(storage_path());
            // return $pdf->setWarnings(false)->stream('invoice.pdf');
        }else{
            $pat  = new Form025Resource($patientE);
            $patient = $pat->toArray(null);
            // dd($patient);
            $pdf = \PDF::loadView('print.form_025', compact('patient'))->setPaper('a4', 'landscape');
            \Storage::put($this->info->getPdfFolder().'/'.$patientE->card_number.'.pdf', $pdf->output());
            // $pdf->save(storage_path($folder.$patientE->card_number.'.pdf'));
            // Storage::put('public/pdf/', $pdf->output());
            // return $pdf->setWarnings(false)->stream('invoice.pdf');
        }
    }

    public function makeZip()
    {
        \Storage::disk('local')->makeDirectory('pdfzips',$mode=0775); // zip store here

        $zip = new \ZipArchive();
        $zip->open($this->info->getZipPath(), \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        
        $path = storage_path('app/'.$this->info->getPdfFolder()); // path to your pdf files
        // dd($path);
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();
                // extracting filename with substr/strlen
                $relativePath = substr($filePath, strlen($path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
    }

    public function removeFolder(){
        $path = storage_path('app/'.$this->info->getPdfFolder()); // path to your pdf files
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                unlink($file->getRealPath());
            }
        }
        if (is_dir($path)) {
            rmdir($path);
        }

    }
}
