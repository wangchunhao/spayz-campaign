<?php 
namespace App\Http\Controllers;
use App\Model\Channel;
use Zizaco\Entrust;
use App\Model\Role;
use App\Model\Users;
use App\Model\Campaign;
use App\Model\Client;
use App\Model\KeywordGroups;
use App\Model\Event;
use App\Model\Location;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Routing\ResponseFactory;
use Request;
use Redirect;
class CampaignAdminController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *Controller for admin user
	 * @return Response
	 */
    public function __construct()
    {
        // $this->middleware('auth');
    }
	public function index()
	{
        return view('campaignadmin.index');
	}
	public function Login(){
    	return view('campaignadmin.login');
    }
    public function log(){
    	$user = new Users();
    	$username = Request::input('username');
    	$password = Request::input('password');
    	$data = $user->where('username','=',$username)->get();
    	return response()->json($data);
    }
    public function Adduser(){
    	return view('campaignadmin.adduser');
    }
    public function lists(){
        $type = input::get('type');
        if($type == 'user'){
            $data = Users::select()->orderBy('id','DESC')->get()->toArray();
            return view('campaignadmin.userlist')->with('data',$data);
        }else if($type == 'client'){
            $data = Client::all();
            return view('campaignadmin.clientlist')->with('data',$data);
        }else if($type == 'campaign'){
            $data = Campaign::select(DB::raw('campaign.id,campaign.name,campaign.description,client.name as client_name'))
                ->leftjoin('client','client.id','=','campaign.client_id')
                ->get();
            return view('campaignadmin.campaignlist')->with('data',$data);
        }
        
    }
    //修改
    public function edit(){
    	$id = input::get('id');
        $type = input::get('type');
    	if($type == 'user'){
            $data = Users::find($id);
            return view('campaignadmin.user_edit')->with('data',$data);
        }else if($type == 'client'){
            $data = Client::find($id);
            return view('campaignadmin.client_edit')->with('data',$data);
        }else if($type == 'campaign'){
            $data = Campaign::find($id);
            $client = Client::all();
            return view('campaignadmin.campaign_edit')->with('data',$data)->with('client',$client);
        }
    }

    public function update(){
        $type = Request::input('type');
		$user = new Users();
        $client = new Client();
        $campaign = new Campaign();
        $data['id'] = Request::input('id');
		if($type == 'user'){
            $data['username'] = Request::input('username');
            $data['email'] = Request::input('email');
            $data['password'] = Request::input('password');
            $user->where('id', $data['id'])->update($data);
        }else if($type == 'client'){
            $data['name'] = Request::input('name');
            $data['description'] = Request::input('description');
            $client->where('id', $data['id'])->update($data);
        }else if($type == 'campaign'){
            $data['name'] = Request::input('name');
            $data['description'] = Request::input('description');
            $data['client_id'] = Request::input('client_id');
            $campaign->where('id', $data['id'])->update($data);
        }
		return Redirect::to('lists?type='.$type);    	
    }
    //删除
    public function del(){
        $type = Request::input('type');
        $id = Request::input('id');
        if($type == 'user'){
            $del = Users::find($id);
            $del->delete();
        }else if($type == 'client'){
            $del = Client::find($id);
            $del->delete();
        }else if($type == 'campaign'){
            $del = Campaign::find($id);
            $del->delete();
        }
    	if($del){
    		return response()->json(["status"=>'ok','message'=>'deleted!']);
    	}else{
    		return response()->json(["status"=>'fail','message'=>'deleted fail!']);
    	}
    }
    //添加
    public function add(){
    	$user = new Users();
        $client = new Client();
        $campaign = new Campaign();
        $type = Request::input('type');
    	if($type == 'user'){
            $user->username = Request::input('username');
            $user->email = Request::input('email');
            $user->password = bcrypt(Request::input('password'));
            $user->save();
        }else if($type == 'client'){
            $client->name = Request::input('name');
            $client->description = Request::input('description');
            $client->save();
        }else if($type == 'campaign'){
            $campaign->name = Request::input('name');
            $campaign->description = Request::input('description');
            $campaign->client_id = Request::input('client_id');
            $campaign->save();
        }
    	return Redirect::to('lists?type='.$type);
    }
    public function addclient(){
        return view('campaignadmin.addclient');
    }
    public function addcampaign(){
        $data = Client::all();
        return view('campaignadmin.addcampaign')->with('data',$data);
    }

}
