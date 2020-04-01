<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class AjaxBlogsController extends Controller
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
                $data = DB::table('blog_comments')
                    ->where('id', '<', $request->id)
                    ->Where('id_blogs', $id)
                    ->orderBy('id', 'DESC')
                    ->limit(5)
                    ->get();
            } else {
                $data = DB::table('blog_comments')
                    ->Where('id_blogs', $id)
                    ->orderBy('id', 'DESC')
                    ->limit(5)
                    ->get();
            }
            $output = '';
            $last_id = '';
            if (!$data->isEmpty()) {
                foreach ($data as $value) {
                    $output .= '
                    <div class="posted-by">
                        <div class="pb-pic">
                            <div
                                style="width: 27px; height: 27px; text-align: center; background: #ddd; font-weight: bold; color: #666">
                                ' . strtoupper(substr($value->name, 0, 1)) . '
                            </div>
                        </div>
                        <div class="pb-text">
                            <h5 style="font-weight: bold">' . ucwords($value->name) . '
                                <span style="color: #b2b2b2; font-size: 12px; font-weight: 400; text-transform: uppercase; margin-left: 10px; letter-spacing: 2px; -webkit-font-smoothing: antialiased">- ' . $this->time_elapsed_string($value->created_at) . '</span>
                            </h5>
                            <p>' . $value->comment . '</p>
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