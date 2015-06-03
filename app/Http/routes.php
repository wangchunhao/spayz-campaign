<?php

Route::get('/campaign/{campaign_id}', 'CampaignController@campaign')->where('campaign_id', '[0-9]+');
Route::get('/client/{client_id}', 'CampaignController@client')->where('client_id', '[0-9]+');


Route::get('/{campaign_id}', 'CampaignController@campaign')->where('campaign_id', '[0-9]+');
Route::get('/{campaign_id}/keywords', 'CampaignController@keywords')->where('campaign_id', '[0-9]+');