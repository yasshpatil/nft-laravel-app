<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Box;

class BricksPricesFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data= $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $row) {
            $box=Box::where('box_row_number',$row[0])->where('box_column_number',$row[1])->whereNull('order_id')->first();
            if($box != null){
                if($box->price != $row[2]){
                    $box->price = $row[2];
                    // $box->zone_number = ((int) $row[4]);
                    $box->save();
                }
                // $box->zone_number = ((int) $row[4]);
                // $box->save();
            }
        }
    }
}
