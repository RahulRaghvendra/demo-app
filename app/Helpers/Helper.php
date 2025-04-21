<?php
/**
 * File: Helper.php
 * Author: Sohan Bairwa (S@DEV)
 * Created: 29-04-2024
 * Description: this Helper class 
 */
namespace App\Helpers;

use App\Models\ConfigData;
use App\Models\OrgAddressModel;
use App\Models\OrgAttachmentModel;
use App\Models\DesignationRights;
use App\Models\OrgPaymentTermsModel;
use App\Models\Notify;
use App\Models\UserRatesModel;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Str;
class Helper
{
    
	public static function permissionCheck($menu_id=null, $or=false){
        
	   // Super Admin check
	   if (auth()->user()->type == "a") {
        return true;
    }

    $menu_rights = Session::get('menu_rights'); // simple array like [1011, 1012, ...]

    if (is_array($menu_id)) {
        if ($or) {
            foreach ($menu_id as $id) {
                if (in_array($id, $menu_rights)) {
                    return true;
                }
            }
            return false;
        } else {
            foreach ($menu_id as $id) {
                if (!in_array($id, $menu_rights)) {
                    return false;
                }
            }
            return true;
        }
    }

    // Single permission check
    return in_array($menu_id, $menu_rights);
	}
	
	public static function formatNullableDate($date ,$format ='Y-m-d') //formatNullableDate($date, $format = 'd-m-Y')
	{
		if ($date === null) {
			return null;
		}
		return  $convertedDate = Carbon::createFromFormat('d-m-Y', $date)->format($format); // Carbon::createFromFormat('Y-m-d', $date)->format($format);
	}
	public static function formatDate($date ,$format ='d-m-Y') //formatNullableDate($date, $format = 'd-m-Y')
	{
		if ($date === null) {
			return null;
		}
	
		 if (strpos($date, ' ') !== false) {
       
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    } else {
       
        return Carbon::createFromFormat('Y-m-d', $date)->format($format);
    }
	}

	
	public static function userId()
	{
		return auth()->user()->id;
	}

	
	//for generating status
	
	//for trimming the text
	

 



}