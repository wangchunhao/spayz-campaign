<?php namespace App\Http\Controllers;

use App\Model\Campaign;
use App\Model\Client;
use App\Model\KeywordGroups;
use App\Model\Event;
use App\Model\Channel;
use App\Model\Location;
use App\Model\FilterSave;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class CampaignController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function campaign($campaign_id)
	{
        $data = Campaign::find($campaign_id);
        if($data){
       		return response()->json($data);
        }else{
        	return response()->json(['code'=>'404','message'=>'No message']);
        }

        $data = Campaign::find($campaign_id);
        return response()->json($data);

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
    
    /*
     * Keywords
     * 关键词信息获取
     */
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
    
    /*
     * Event
   	 * campaign活动信息
   	 */
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
    
    /*
     * Save search
    * 塞选条件保存
    *
    * @pragram int id 条件id 检查是否存在
    * @pragram int campaign_id
    * @pragram int admin_id 当前登陆用户ID
    * @pragram string type 条件类型
    * @pragram string name 条件名称
    * @pragram string filters 要保存的条件    (可以在URL添加：&gender=m&age=25)
    *
    */
    
    public function filter_save(Request $request){
    
    	$receive = Input::all();
    	
    	$admin_id = $receive['admin_id'];
    	$campaign_id = $receive['campaign_id'];
    	$name = $receive['name'];
    	$type = $receive['type'];
    	
    	unset($receive['admin_id']);
    	unset($receive['campaign_id']);
    	unset($receive['type']);
//    	unset($receive['created_at']);
//    	unset($receive['updated_at']);
//    	unset($receive['name']);
    	
    	$filter = '';
    	foreach ($receive as $k=>$v){
    		if($k != 'id'){
    			$filter .= '&'.$k.'='.$v;
    		}
    	}
    	if(isset($receive['id'])){
    		FilterSave::firstOrCreate(['id' => $receive['id']]);
    		$data = FilterSave::find($receive['id']);
    	}else{
    		$data = new FilterSave;
    	}
    
    	$data->admin_id = $admin_id;
    	$data->campaign_id = $campaign_id;
    	$data->type = $type;
    	$data->name = $name;
    	$data->created_at = date('Y-m-d H:i:s');
    	$data['filter'] = ltrim($filter,'&');
    		
    	$is = $data->save();
    	
    	if($is){
    		return Response()->json(['code' => '200', 'message' => 'Access'])->setCallback($request->input('callback'));
    	}else{
    		return Response()->json(['code' => '400', 'message' => 'Failed'])->setCallback($request->input('callback'));
    	}
    
    }
    
    /*
     * Get filter
     * 获取全部保存的塞选条件
     */
    public function get_filter(Request $request){

        $type = Input::get('type');
    	$data = FilterSave::where("type",'=',$type)->get();

    	if($data){
            foreach($data as $key=>$val){
                $_d = $this->explodeFilter($val['filter']);
                $_d['id'] = $val['id'];
                $data[$key] = $_d;
            }
			return Response()->json($data)->setCallback($request->input('callback'));
		}else{
			return Response()->json(['code' => '404', 'message' => 'No Message'])->setCallback($request->input('callback'));
		}
    }
    private function explodeFilter($data){
        $data = explode("&",$data);
        $result = array();
        foreach($data as $val){
            $exp = explode("=",$val);
            $result[$exp[0]]=$exp[1];
        }
        return $result;
    }

}
