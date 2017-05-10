<?php

namespace App\Http\Controllers; // กำหนดที่อยู่ของ Controller

use App\Http\Controllers\Controller; //เรียกใช้ Controller หลักของ Laravel 5.0
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class testController extends Controller {

    public function getShow() {
        $show = false;
        $text = 'Test';
        return view('webpage', array('show' => $show, 'text' => $text));
    }

    public function getEnter() {
        $name = Input::get('name');
        $qry = DB::table('artist')->where('name', $name)->get();
        $qry = DB::table('artist')
                ->leftJoin('album', 'artist.assn', '=', 'album.ano')
                ->where('artist.name', '=', $name)
                ->select('album.*')
                ->get();

        $num = count($qry);
        $text = 'Find Artist Name';
        $show = true;
        if ($num == 0) {
            $show = FALSE;
            $text = 'Not Find Artist Name';
        }

        return view('webpage', array("qry" => $qry, "show" => $show, "num" => $num, "text" => $text, "name" => $name));
    }

    public function getInsert() {
        return view('insert');
    }

    public function getSelectArt() {
        /* select fund form database table fund */
        $art = DB::table('album')->pluck('name', 'ano')->toArray();
        return view('insert', compact('art', $art));
    }

    public function getAdd($art, $artno) {
        DB::table('artwithalbum')->insert(
                ['assn' => $art, 'atssn' => $artno]
        );
        return self::getSelectArt();
    }

//    public function getSave() {
//        $art = Input::get('art');
//        $name = Input::get('name');
//        $type = Input::get('type');
//        $nch = DB::table('artist')->pluck('name', 'artno')->toArray();
//        $num = count($nch);
//        $qryname = $nch->
//       
//        
//    }


}
