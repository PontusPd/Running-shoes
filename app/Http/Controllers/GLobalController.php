<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Menu;
use App\Models\Slides;
use App\Models\Products;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class GlobalController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
    protected function fetchTable($table)
    {
        return $fetchTable = $table;
    }

    protected function getTitle($title)
    {
        return $title;
    }
    protected function getText($text)
    {
        return $text;
    }

    protected function getSublinks()
    {
        $subLinks = DB::table('submenu')->get();    
        return $subLinks;
    }
    public function header()
    {
        $test = 12;
        $brands = DB::table('brands')->get();
        return View::make('Runningshoes/includes/aside')->with(array(
            'brands' => $brands,
            'test' => $test,
            ));
    }
}