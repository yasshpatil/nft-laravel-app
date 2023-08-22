<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BrickPricesRequest;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Box;
use App\Models\NftType;
use App\Jobs\BricksPricesFile;
use Carbon\Carbon;
use Artisan;
use File;

class BoxController extends Controller
{
    /**
     * Get all boxes according to logged-in user.
     *
     * @return void
     */
    public function bricksList()
    {
        $boxes = Box::all();
        $nft_types = NftType::all();
        return view('admin.brickslist', ['boxes' => $boxes, 'nft_types'=>$nft_types ]);
    }

    public function uploadPriceSheet(Request $request){
        if ($request->hasfile('import_brick_prices') && $request->file('import_brick_prices')->getClientOriginalExtension() == 'csv') {
            $data   = file(request()->import_brick_prices);
            if(count($data) == 10001){
                $chunks = array_chunk($data, 1000);
                $first_column=explode(',',$chunks[0][0]);
                if(($first_column[0] == '"Row Number"' && $first_column[1] == '"Column Number"' && $first_column[2] == 'Price') || ($first_column[0] == 'Row Number' && $first_column[1] == 'Column Number' && $first_column[2] == 'Price')){
                    unset($chunks[0][0]);
                    foreach ($chunks as $key => $chunk) {
                        if($key <= 9){
                            $data_new = array_map('str_getcsv', $chunk);
                            BricksPricesFile::dispatch($data_new)->delay(Carbon::now()->addSeconds(3));
                        }
                    }
                    return \Redirect::back()->with('msg' , 'Bricks prices update process in queue.');
                }else{
                    return \Redirect::back()->with('error' , 'CSV file has wrong format');
                }
            }else{
                return \Redirect::back()->with('error' , 'CSV file has wrong format');
            }
        }else{
            return \Redirect::back()->with('error' , 'Please upload CSV file');
        }
    }

    public function exportPriceSheet(){
        $fileName = 'bricks.csv';
         $bricks = Box::all();
     
             $headers = array(
                 "Content-type"        => "text/csv",
                 "Content-Disposition" => "attachment; filename=$fileName",
                 "Pragma"              => "no-cache",
                 "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                 "Expires"             => "0"
             );
     
             $columns = ['Row Number','Column Number','Price','Status'];
     
             $callback = function() use($bricks, $columns) {
                 $file = fopen('php://output', 'w');
                 fputcsv($file, $columns);
                 $price_arr= [];
                 foreach ($bricks as  $brick) {
                    $row['Row Number']  = $brick->box_row_number;
                    $row['Column Number']  = $brick->box_column_number;
                    $row['Price']  = $brick->price;
                    $row['Status']  = ($brick->order_id == NULL ? '': 'SOLD');
                    fputcsv($file, array($row['Row Number'],$row['Column Number'],$row['Price'],$row['Status']));
                 }
                 
                 fclose($file);
                };
     
             return response()->stream($callback, 200, $headers);
    }
}
