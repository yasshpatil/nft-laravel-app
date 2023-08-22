<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boxex_array=[];
        $box_array=[];
        $box_column_number = 0;
        $box_row_number = 1;
        $brick_itration = 1;
        for($itration = 0; $itration <= 9999; $itration++ ){
            $box_array=[];
            $box_array['title'] = 'Brik '.number_format($brick_itration);
            $box_array['description'] = 'The selection gives you full ownership of brik '.number_format($brick_itration);
            
            if($itration % 125 ==0 && $itration != 0){
                $box_column_number=1;
                $box_row_number = $box_row_number+1;
            }else{
                $box_column_number++;
            }
            
            $box_array['box_column_number'] = $box_column_number;
            $box_array['box_row_number'] = $box_row_number;

            array_push($boxex_array,$box_array);
            $brick_itration++;
        }
        DB::table('boxes')->insert($boxex_array);
    }
}
