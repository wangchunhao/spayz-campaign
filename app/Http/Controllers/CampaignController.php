<?php namespace App\Http\Controllers;

use App\Model\Campaign;
use App\Model\Client;
use App\Model\KeywordGroups;
use App\Model\Event;
use App\Model\Channel;
use App\Model\Location;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CampaignController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function campaign($campaign_id)
	{
// 		dd(1);
        $data = Campaign::find($campaign_id);
        if($data){
       		return response()->json($data);
        }else{
        	return response()->json(['code'=>'404','message'=>'No message']);
        }
	}
    public function client($client_id)
    {
        $data = Client::find($client_id);
   		if($data){
       		return response()->json($data);
        }else{
        	return response()->json(['code'=>'404','message'=>'No message']);
        }
    }
    public function keywords($campaign_id){
    	
    	$data = KeywordGroups::select(DB::raw('keyword.id,campaign_id,keyword_group.name,keyword_group.description,keyword.name as keyword,keyword.name_en,keyword.enabled'))
    			->leftjoin('keyword','keyword_group.id','=','keyword.keyword_group_id')
    			->where('campaign_id','=',$campaign_id)
    			->get();
    	
    	if($data){
    		return $data->toArray();
    	}else{
    		return response()->json(['code'=>'404','message'=>'No message']);
    	}
    	
    }
    public function event($campaign_id){
    	$page = (Input::get('page'))?Input::get('page'):0;
    	$data = Event::where('campaign_id','=',$campaign_id)
    			->skip($page)
    			->take(10)
    			->get();
    	
   		if($data){
       		return response()->json(['collection'=>$data]);
        }else{
        	return response()->json(['code'=>'404','message'=>'No message']);
        }
    	
    }
    
    public function channel($campaign_id){
    	
    	$data = Channel::where('campaign_id','=',$campaign_id)
    			->get();
    	 
    	if($data){
    		return response()->json(['collection'=>$data]);
    	}else{
    		return response()->json(['code'=>'404','message'=>'No message']);
    	}
    	
    }
    
    public function location(){
    	
    	$data = Location::all();
    	
   		if($data){
    		return response()->json(['collection'=>$data]);
    	}else{
    		return response()->json(['code'=>'404','message'=>'No message']);
    	}
    }

}
