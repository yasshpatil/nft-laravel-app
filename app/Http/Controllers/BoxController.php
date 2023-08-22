<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Box;
use App\Models\Order;
use App\Models\NftType;
use App\Models\User;
use App\HelperModule\ApiHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Image;
use File;

class BoxController extends Controller
{
    
    /**
     * Get all boxed.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $filter_array = [];
        if(count($request->all()) > 0){

            $query = Box::with("order")->select('id');
            if($request->input('price') != '' && $request->input('price') > 0){
                $price = $request->input('price');
                $query->orWhereHas('order', function($query) use ($price) {$query->where('price', '=', $price);});
            }
            if($request->input('type') != '' && $request->input('type') > 0){
                $query->where('nft_type_id' ,'=', $request->input('type'));
            }
            if($request->input('date') != ''){
                $query->whereRaw("DATE(updated_at) = '" . $request->input('date') . "'");
            }
            $boxes=$query->get();
            foreach($boxes as $box){
              array_push($filter_array,$box->id);
            }
        }
        $boxes = Box::select('id','box_row_number','box_column_number','local_server_image','width','height','single_box_width','single_box_height','bricks_width','bricks_height','owned_by')->get();
        return view('index', ['boxes' => $boxes, 'filter_array'=>$filter_array]);
    }

    /**
     * .
     *
     * @return void
     */
    public function about()
    {
        return view('about');
    }

    /** 
     * .
     *
     * @return void
     */
    public function howItWorks()
    {
        return view('howitworks');
    }

    /**
     * .
     *
     * @return void
     */
    public function contact()
    {
        return view('contact');
    }

    /** 
     * .
     *
     * @return void
     */
    public function termsConditions()
    {
        return view('termsconditions');
    }

    /** 
     * .
     *
     * @return void
     */
    public function privacyPolicy()
    {
        return view('privacypolicy');
    }

    /**
     * Get specific box/es data.
     *
     * @return void
     */
    public function getBoxDetail(Request $request)
    {
        $ids = $request->input('ids');
        $boxes_count = Box::whereIn('id',$ids)->count();
        $boxes = Box::with('user','nftType')->whereIn('id',$ids)->get();
        $all_boxes_price = []; 
        $boxes[0]['total_brick_zone_1'] = 0;
        $boxes[0]['total_brick_zone_2'] = 0;
        $boxes[0]['total_brick_zone_3'] = 0;
        $boxes[0]['total_brick_zone_4'] = 0;
        foreach($boxes as $box){
          array_push($all_boxes_price,$box->price);
          if($box->zone_number == 1){
            $boxes[0]['total_brick_zone_1'] = Box::whereIn('id',$ids)->where('zone_number',1)->count();
            $boxes[0]['price_zone_1'] = $box->price;
          }else if($box->zone_number == 2){
            $boxes[0]['total_brick_zone_2'] = Box::whereIn('id',$ids)->where('zone_number',2)->count();
            $boxes[0]['price_zone_2'] = $box->price;
          }else if($box->zone_number == 3){
            $boxes[0]['total_brick_zone_3'] = Box::whereIn('id',$ids)->where('zone_number',3)->count();
            $boxes[0]['price_zone_3'] = $box->price;
          }else if($box->zone_number == 4){
            $boxes[0]['total_brick_zone_4'] = Box::whereIn('id',$ids)->where('zone_number',4)->count();
            $boxes[0]['price_zone_4'] = $box->price;
          }
        }
        $average = array_sum($all_boxes_price)/count($all_boxes_price);
        $boxes[0]['parent'] =  Box::where('order_id',$boxes[0]->order_id)->first();
        $boxes[0]['total_price'] = number_format((float)array_sum($all_boxes_price),3,'.', '');
        $boxes[0]['total_brick'] = $boxes_count;
        $boxes[0]['average'] = number_format($average,3);
        return ApiHelper::apiResponse(200, 'Success', true, $boxes);
    }

     /**
     * Get specific order data.
     *
     * @return void
     */
    public function getOrderDetail($id)
    {
        $box = Box::where('order_id',$id)->first();
        return ApiHelper::apiResponse(200, 'Success', true, $box);
    }

    /**
     * create order.
     *
     * @return void
     */
    public function createOrder(Request $request)
    {
        $brick_ids =explode(",", $request->input('bricks'));
        sort($brick_ids);
        $request->request->add(['user_id' => Auth::id()]);
        $order = Order::create($request->all());
        $bricks = Box::whereIn('id',$brick_ids)->get();
        foreach($bricks as $itration => $brick){
            if($itration == 0){
                $brick->width =  $request->input('width');
                $brick->height = $request->input('height');

                $brick->single_box_width =  $request->input('single_box_width');
                $brick->single_box_height = $request->input('single_box_height');

                $brick->bricks_width =  $request->input('bricks_width');
                $brick->bricks_height =  $request->input('bricks_height');
            }
            if($request->input('total_bricks') > 1){
                $brick->description =  'The selection gives you full ownership of multiple briks.';
            }
            $brick->token_id =  $request->input('token_id');
            $brick->ether_scan_link =  $request->input('txHash');
            $brick->order_id = $order->id;
            $brick->local_server_image = 'img/Logo.png';
            $brick->owned_by = Auth::id();
            $brick->save();
        }
        
        \Mail::to(Auth::user()->email)->send(new \App\Mail\PlaceOrderMail($brick_ids,$request->input('price'),$request->input('total_bricks')));
        return ApiHelper::apiResponse(200, 'Order placed successfully', true, $order);

    }

     /**
     * Get all boxes according to logged-in user.
     *
     * @return void
     */
    public function bricksList()
    {
        $boxes = Box::with('order')->where('owned_by',Auth::id())->orderBy('order_id')->get();
        $nft_types = NftType::all();
        foreach($boxes as $box){
            $box->img = $box->local_server_image == NULL ? 'img/Logo.png' : $box->local_server_image;
            $box->new_order_id = $this->makeId3Digit($box->order_id);
        }        
        return view('front.brickslist', ['boxes' => $boxes, 'nft_types'=>$nft_types, 'users' => Auth::user() ]);
    }

    /**
     * Get total orders.
     *
     * @return void
     */
    public function getTotalOrderCount()
    {
        $total_boxes=Box::count();
        $sold_boxes=Box::whereNotNull('order_id')->count();
        $questions_feedback=User::find(Auth::id());
        $percentage = ($sold_boxes*100)/$total_boxes;
        $data['total_boxes'] = number_format($total_boxes);
        $data['sold_boxes'] = number_format($sold_boxes);
        $data['percentage'] = $percentage;
        if($questions_feedback != null && $questions_feedback->know_about_nft == null){
            $data['questions_feedback'] = 0;
        }else if($questions_feedback != null && $questions_feedback->know_about_nft != null){
            $data['questions_feedback'] = 1;
        }else{
            $data['questions_feedback'] = 2;
        }
        return ApiHelper::apiResponse(200, 'Success', true, $data);
    }

    public function getNftType(){
        $nft_type=NftType::all();
        $data['nft_type'] = $nft_type;
        $data['price'] = [0.01,0.02,0.03,0.04,0.05,0.1,0.5,1];
        return ApiHelper::apiResponse(200, 'Success', true, $data);
    }

    /**
     * upload NFT data.
     *
     * @return void
     */

    public function uploadNFT(Request $request){

        // if($request->input('image_url_hidden') == ''){
        
        //     $request->validate([
        //         'image_url' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
        //     ]);

        // }
        $image_url=$this->fileUpload($request->file('image_url'),$request->input('image_url_hidden'));
        if($image_url != false){
           $boxes = BOX::with('order')->where('order_id',$request->input('brick_order_id'))->get();
          foreach($boxes as $box){
            if($box->owned_by == Auth::id()){
                $box->local_server_image = $image_url['local'];
                $box->title = $request->input('listing_name');
                $box->nft_type_id = $request->input('nft_type');
                $box->website_url = $request->input('website_url');
                $box->description = $request->input('description');
                $box->save();
            }
          }
          if($request->file('image_url') != null){
            $directory =explode(request()->getSchemeAndHttpHost(), $image_url['open_sea']);
            // if (env('ENV_MACHINE') == 'local') {
            //     $image = base_path($directory[1]);
            // } else {
                $image = public_path($directory[1]);
            // }
            $image = str_replace("/nft//nft/","/nft/", $image);
            $response = $this->uploadFileIPFS($image,date('d-m-y-h:i:s').$boxes[0]->id);
            $data = $response->json();
            if (array_key_exists( 'IpfsHash', $data ) ) {
                $uploaded_image_hash = $data['IpfsHash'];
                $boxes[0]->image =  env('IPFS_URL').$uploaded_image_hash;
                $boxes[0]->save();
                $file_path=$this->generateMetaData($boxes[0], $request->file('image_url'));
                $response_file = $this->uploadFileIPFS($file_path,date('d-m-y-h:i:s').$boxes[0]->id);
                $data_file = $response_file->json();
                if (array_key_exists( 'IpfsHash', $data_file ) ) {
                    foreach($boxes as $box){
                        $box->image =  env('IPFS_URL').$uploaded_image_hash;
                        $box->metadata =  env('IPFS_URL').$data_file['IpfsHash'];
                        $box->save();
                    }
                    return ApiHelper::apiResponse(200, 'Success', true, $boxes[0]);
                }
            }

            return ApiHelper::apiResponse(200, 'Error', false, []);

          }else if($request->file('image_url') == null){
            $file_path=$this->generateMetaData($boxes[0], $request->file('image_url'));
            $response_file = $this->uploadFileIPFS($file_path,date('d-m-y-h:i:s').$boxes[0]->id);
            $data_file = $response_file->json();
            if (array_key_exists( 'IpfsHash', $data_file ) ) {
                foreach($boxes as $box){
                    $box->metadata =  env('IPFS_URL').$data_file['IpfsHash'];
                    $box->save();
                }
                return ApiHelper::apiResponse(200, 'Success', true, $boxes[0]);
            }

            return ApiHelper::apiResponse(200, 'Error', false, []);
          }
        }
        return ApiHelper::apiResponse(200, 'Error', false, []);
    }

    public function brickdetail($id){
        $box = Box::with('order','nftType')->where('owned_by',Auth::id())->where('id',$id)->first();
        $nft_type=NftType::all();
        return view('front.brickdetail', ['box' => $box,'nft_types' => $nft_type ]);
    }

    private function fileUpload($file,$file_value){
        if($file != null){
            $directory_path =  public_path('front'.DIRECTORY_SEPARATOR.'nft'.DIRECTORY_SEPARATOR.Auth::id()); 
            $dir_path =  asset('front'.DIRECTORY_SEPARATOR.'nft'.DIRECTORY_SEPARATOR.Auth::id()); 
            $local_dir_path =  'front'.DIRECTORY_SEPARATOR.'nft'.DIRECTORY_SEPARATOR.Auth::id(); 
            if(!File::isDirectory($directory_path)){
                File::makeDirectory($directory_path, 0777, true, true);
            }
            if ($file) {
                
                $imagePath = $file;
                $imageName = Auth::id().date('d-m-y-h:i:s').$imagePath->getClientOriginalName();
                $imageNameOpenSea = Auth::id().date('d-m-y-h:i:s').'open_sea'.$imagePath->getClientOriginalName();
                
                //$path=$file->move($directory_path,$imageNameOpenSea);
                $img =Image::make($imagePath);
                $img->save($directory_path.'/'.$imageNameOpenSea);
                $img->save($directory_path.'/'.$imageName,10);
                $images['local'] = $local_dir_path.DIRECTORY_SEPARATOR.$imageName;
                $images['open_sea'] = $dir_path.DIRECTORY_SEPARATOR.$imageNameOpenSea;
                return $images;
            }
            return false;
        //}else if($file_value != '' && $file_value != 'img/Logo.png' ){
        }else if($file_value != ''){
                $images['local'] = $file_value;
                $images['open_sea'] = asset(DIRECTORY_SEPARATOR.$file_value);
                 return $images;
        }else{
            return false;
        }
    }

    private function generateMetaData($box, $input_file){
        //foreach($boxes as $box){
            $briksInfo = $this->getblockNames($box->token_id);
            $description = 'Briks includes: ' . $briksInfo['total'] . ' (' . $briksInfo['ares'] . ') - ';
            $description .= $box->description;
            $image = $box->image;
            if(!$input_file && empty($box->image)){
                    $defaultFilePath =  public_path().'/metadata_50/19_file.json';
                    $defaultFileContent = json_decode(File::get($defaultFilePath));
                    $image = $defaultFileContent->image;
            }
            $dataArr = ['image' => $image,'tokenId' => $box->token_id,'name'=>$box->title, 'description' => $description];
            $data = json_encode($dataArr);
            $file = $box->id.date('d-m-y-h:i:s').'_file.json';
            $destinationPath=public_path()."/metadata/";
            if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
            File::put($destinationPath.$file,$data);
            return $destinationPath.$file;
        //}
    }
    private function getblockNames($tokenId){
        $briksAre = ['total'=>'','ares'=>''];
        $briks = Box::select('id')->where('token_id', $tokenId)->get()->toArray();
        $briksAre['total'] = count($briks);

        foreach($briks as $key => $value){
            if(count($briks) == 1 || (count($briks) -1) == $key){
                $briksAre['ares'] .= '#' . $value['id'];
            } else {
                $briksAre['ares'] .= '#' . $value['id'] . ', ';
            }
        }        
        return $briksAre;
    }

    private function uploadFileIPFS($image,$name){
          
        // return Http::withHeaders(['pinata_api_key' => '555e2796a49853656d14','pinata_secret_api_key' => '3b10b299fab9149b5f25f03961fbec7ca072c2fed29d5157f77f2de101dad25e'
        // ])->attach( 'file', file_get_contents( $image), $name )->post( 'https://api.pinata.cloud/pinning/pinFileToIPFS', []);
        return Http::withHeaders(['pinata_api_key' => '0eb38b02425a9ae9c964','pinata_secret_api_key' => '36e8f6ffb88fc6cb1761fb5ae334487847abe54ec359ef7d95f845b8d0c72c7a'
        ])->attach( 'file', file_get_contents( $image), $name )->post( 'https://api.pinata.cloud/pinning/pinFileToIPFS', []);
    }

    private function makeId3Digit($id){
        
        if(strlen($id) == 1){
            return '00'.$id;
        }else if(strlen($id) == 2){

            return '0'.$id;
        }
        return $id;
    }



}
