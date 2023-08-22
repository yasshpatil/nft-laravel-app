@extends('layouts.app-main')
@section('title','NFT Project')
@section('content')

    <div class="box_wrap " style="display:none;">

    <div class="filters">
        <div class="filter_expand">
        <ul>
                                <li class="dropdown">
                                    <a href="#" class="menuitem price" onclick="showSelectList('price');">
                                        <span>Price</span>
                                        @if(app('request')->input('price') > 0)
                                            <b class="display_price">{{app('request')->input('price')}} ETH</b>
                                        @else
                                            <b class="display_price">All Prices</b>
                                        @endif
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdowncontent dropdown_price">
                                            <input type="hidden" name="bricks_price" id="bricks_price" value="{{app('request')->input('price') > 0 ? app('request')->input('price') : ''}}">
                                                <ul class="price_ul">
                                                   
                                                </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="menuitem type" onclick="showSelectList('type');">
                                        <span>Type</span>
                                        @if(app('request')->input('type') > 0)
                                            <b class="display_type"></b>
                                        @else
                                            <b class="display_type">All Types</b>
                                        @endif
                                       
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdowncontent dropdown_type">
                                            <input type="hidden" name="bricks_type" id="bricks_type" value="{{app('request')->input('type') > 0 ? app('request')->input('type') : ''}}">
                                            <ul class="nft_type_ul">
                                               
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown adddate">
                                    <a href="#" class="menuitem addate">
                                        <span>Date</span>
                                        <b> <input type="date" name="bricks_date" id="bricks_date" value="{{app('request')->input('date')}}"></b>
                                    </a>
                                   
                                </li>
                                <li class="seaarchingli" onclick="searchBricks()">
                                    <div class="searchme">
                                        <img src="img/search.png" alt="search">
                                    </div>
                                </li>
                                <li class="seaarchingli" onclick="window.location.href=window.location.origin;">
                                    <div class="searchme">
                                        <img src="img/reset.jpg" alt="reset">
                                    </div>
                                </li>
                            </ul>
        </div>
        <div class="filter_trigger">
            <img src="img/Archive/FILTER-1.svg" alt="Filter Button">
        </div>
    </div> 
        <div class="boxes_action">
            <div class="max_min">
                <img src="img/full_screen.svg" alt="Full Scren">
            </div>
            <div class="zoom_button">
                <button class="zoom-in">
                    <img src="img/zoom_in.svg" alt="ZOOM IN">
                </button>
                <div class="zoom_percentage" id="zoom_percentage">50%</div>
                <button class="zoom-out">
                    <img src="img/zoom_out.svg" alt="ZOOM OUT">
                </button>
            </div>
        </div>
        <div class="boxes">
            <div class="box_container" id="panzoom">
                @foreach ($boxes as $box)
                    @if(($box->width != NULL || $box->width != '') && ($box->height != NULL || $box->height != ''))
                        @if (in_array($box->id, $filter_array))
                            <div class="box box-sold filtered"  id="box_{{$box->box_row_number}}_{{$box->box_column_number}}"  data-row="{{$box->box_row_number}}" data-column="{{$box->box_column_number}}" data-owned="{{$box->owned_by}}" data-box="{{$box->id}}">
                                <img src="{{asset($box->local_server_image)}}" data-bricks-width="{{$box->bricks_width}}" data-bricks-height="{{$box->bricks_height}}">
                            </div>
                        @else
                            <div class="box box-sold" id="box_{{$box->box_row_number}}_{{$box->box_column_number}}"  data-row="{{$box->box_row_number}}" data-column="{{$box->box_column_number}}" data-owned="{{$box->owned_by}}" data-box="{{$box->id}}">
                                <img src="{{asset($box->local_server_image)}}" data-bricks-width="{{$box->bricks_width}}" data-bricks-height="{{$box->bricks_height}}" data-single-width="{{$box->single_box_width}}" data-single-height="{{$box->single_box_height}}">
                            </div>
                        @endif

                    @else
                        @if ($box->owned_by > 0)
                            <div class="box box-sold" id="box_{{$box->box_row_number}}_{{$box->box_column_number}}"  data-row="{{$box->box_row_number}}" data-bricks-width="{{$box->bricks_width}}" data-bricks-height="{{$box->bricks_height}}" data-column="{{$box->box_column_number}}" data-owned="{{$box->owned_by}}" data-box="{{$box->id}}"></div>
                        @else
                            <div class="box box-for-sale" id="box_{{$box->box_row_number}}_{{$box->box_column_number}}"  data-row="{{$box->box_row_number}}" data-column="{{$box->box_column_number}}" data-owned="{{$box->owned_by}}" data-box="{{$box->id}}"></div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>

</div>
<!-- WRAPPER END -->
@endsection
