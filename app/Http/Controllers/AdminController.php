<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\FrontEnd;

use App\Level;
use App\User;
use App\Quize;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function dashboard()
    {
        $levels = Level::all();
        $users = User::all();
        $quizes = Quize::all();
        return view('backend.dashboard', [
            'levels'  =>  $levels,
            'users'  =>  $users,
            'quizes'  =>  $quizes,
        ]);
    }

    public function create(Request $request)
    {
        //  `id`, `HomePageHeading`, `Android_Link`,
        //  `IOS_Link`, `Featuries_Page_Heading`, `Featuries_Side_Heading`,
        //  `Featuries_Small_Heading`, `Featuries_1`, `Featuries_2`, `Featuries_3`, `Featuries_4`,
        //  `DETAILS_Page_heading`, `DETAILS_Side_Heading`, `DETAILS_Small_Heading`, `DETAILS_1`, `DETAILS_2`,
        //  `DETAILS_3`, `AnoutPageHeading`, `About_Pragraph_Heading`, `SERVICE_ITEM_Page_Heading`, `SERVICE_ITEM_Heading`,
        //  `SERVICE_ITEM_1`, `SERVICE_ITEM_2`, `SERVICE_ITEM_3`, `SERVICE_ITEM_4`, `About_Slider_img1`, `About_Slider_img2`,
        //  `About_Slider_img3`, `Manager_scoap_heading`, `Manager_scoap`, `Manager_img`, `Manager_name`,
        //  `created_at`, `updated_at`
        $frontend = new FrontEnd();



        $frontend->HomePageHeading               = $request['HomePageHeading'];
        $frontend->Android_Link                  = $request['Android_Link'];
        $frontend->IOS_Link                      = $request['IOS_Link'];
        $frontend->Featuries_Page_Heading        = $request['Featuries_Page_Heading'];
        $frontend->Featuries_Side_Heading        = $request['Featuries_Side_Heading'];
        $frontend->Featuries_Small_Heading       = $request['Featuries_Small_Heading'];
        $frontend->Featuries_1                   = $request['Featuries_1'];
        $frontend->Featuries_2                   = $request['Featuries_2'];
        $frontend->Featuries_3                   = $request['Featuries_3'];
        $frontend->Featuries_4                   = $request['Featuries_4'];
        $frontend->DETAILS_Page_heading          = $request['DETAILS_Page_heading'];
        $frontend->DETAILS_Side_Heading          = $request['DETAILS_Side_Heading'];
        $frontend->DETAILS_Small_Heading         = $request['DETAILS_Small_Heading'];
        $frontend->DETAILS_1                     = $request['DETAILS_1'];
        $frontend->DETAILS_2                     = $request['DETAILS_2'];
        $frontend->DETAILS_3                     = $request['DETAILS_3'];
        $frontend->AnoutPageHeading              = $request['AnoutPageHeading'];
        $frontend->About_Pragraph_Heading        = $request['About_Pragraph_Heading'];
        $frontend->SERVICE_ITEM_Page_Heading     = $request['SERVICE_ITEM_Page_Heading'];
        $frontend->SERVICE_ITEM_Heading          = $request['SERVICE_ITEM_Heading'];
        $frontend->SERVICE_ITEM_1                = $request['SERVICE_ITEM_1'];
        $frontend->SERVICE_ITEM_2                = $request['SERVICE_ITEM_2'];
        $frontend->SERVICE_ITEM_3                = $request['SERVICE_ITEM_3'];
        $frontend->SERVICE_ITEM_4                = $request['SERVICE_ITEM_4'];
        $frontend->About_Slider_img1             = $request['About_Slider_img1'];
        $frontend->About_Slider_img2             = $request['About_Slider_img2'];
        $frontend->About_Slider_img3             = $request['About_Slider_img3'];
        $frontend->Manager_scoap_heading         = $request['Manager_scoap_heading'];
        $frontend->Manager_scoap                 = $request['Manager_scoap'];
        $frontend->Manager_img                   = $request['Manager_img'];
        $frontend->Manager_name                  = $request['Manager_name'];
        $frontend->save();

        return redirect()->back()->with(['message' => 'All Fields Added Successfully Thanx for fuken Entering']);
    }

}
