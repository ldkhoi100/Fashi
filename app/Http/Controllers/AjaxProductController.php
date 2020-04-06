<?php

namespace App\Http\Controllers;

use DateTime;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AjaxProductController extends Controller
{
    //Time elapsed
    function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    function load_data_product(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->id > 0) {
                $data = DB::table('reviews')
                    ->where('id', '<', $request->id)
                    ->Where('id_products', $id)
                    ->orderBy('id', 'DESC')
                    ->limit(5)
                    ->get();
            } else {
                $data = DB::table('reviews')
                    ->Where('id_products', $id)
                    ->orderBy('id', 'DESC')
                    ->limit(5)
                    ->get();
            }
            $output = '';
            $last_id = '';
            if (!$data->isEmpty()) {
                foreach ($data as $value) {
                    $output .= '
                    <div class="co-item">
                    <div class="avatar-pic">
                        <div
                            style="width: 27px; height: 27px; text-align: center; background: #ddd; font-weight: bold; color: #666">
                            ' . strtoupper(substr($value->name, 0, 1)) .
                        '</div>
                    </div>
                    <div class="avatar-text">
                        <div class="at-rating">';
                    if ($value->rating == 1) {
                        $output .= '
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>';
                    }
                    if ($value->rating == 2) {
                        $output .= '
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>';
                    }
                    if ($value->rating == 3) {
                        $output .= '
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>';
                    }
                    if ($value->rating == 4) {
                        $output .= '
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>';
                    }
                    if ($value->rating == 5) {
                        $output .= '
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>';
                    }
                    if ($value->rating == 0) {
                        $output .= '
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <span style="color:#999591; font-size:12px;"> (No rating)</span>';
                    }
                    $output .= '
                    </div>
                        <h5>' . ucwords($value->name) . '
                            <span>' . $this->time_elapsed_string($value->created_at) . '</span>
                        </h5>
                        <div class="at-reply" style="width: auto; word-break: break-all;">' . $value->comment . '</div>
                    </div>
                </div>
        ';
                    $last_id = $value->id;
                }
                $output .= '
       <div id="load_more" style="display: flex; align-items: center; justify-content: center;">
        <button type="button" name="load_more_button" class="btn btn-light" data-id="' . $last_id . '" id="load_more_button"
        style="color:red; background: #fff2f0; width: 196px; height:40px; display: flex;
        justify-content: center; align-items: center; font-weight:700;">LOAD MORE</button>
       </div>
       ';
            } else {
                $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-light form-control">No Data Found</button>
       </div>
       ';
            }
            echo $output;
        }
    }
}