<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NFTTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nft_types_array=[];
        $nft_type_array=[];

        for($itration = 1; $itration <= 5; $itration++ ){
            $nft_type_array['name'] = 'NFT Type '.$itration;
            array_push($nft_types_array,$nft_type_array);
        }
        
        DB::table('nft_types')->insert($nft_types_array);
    }
}
