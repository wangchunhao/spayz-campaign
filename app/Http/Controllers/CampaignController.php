<?php namespace App\Http\Controllers;
use App\Model\Campaign;
use App\Model\Client;

class CampaignController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function campaign($campaign_id)
	{
        $data = Campaign::find($campaign_id);
        return response()->json($data);
	}
    public function client($client_id)
    {
        $data = Client::find($client_id);
        return response()->json($data);
    }
    public function keywords($campaign_id){
        echo $campaign_id;
    }
}
