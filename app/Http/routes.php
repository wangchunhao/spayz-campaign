<?php
<<<<<<< HEAD
Route::get('/campaign/{campaign_id}', 'CampaignController@campaign')->where('campaign_id', '[0-9]+');
Route::get('/client/{client_id}', 'CampaignController@client')->where('client_id', '[0-9]+');

Route::get('/{campaign_id}', 'CampaignController@campaign')->where('campaign_id', '[0-9]+');
Route::get('/{campaign_id}/keywords', 'CampaignController@keywords')->where('campaign_id', '[0-9]+');
Route::get('/{campaign_id}/event', 'CampaignController@event')->where('campaign_id', '[0-9]+');
Route::get('/{campaign_id}/channel', 'CampaignController@channel')->where('campaign_id', '[0-9]+');

Route::get('/location', 'CampaignController@location');
=======

Route::get('/campaign/{campaign_id}', 'CampaignController@campaign')->where('campaign_id', '[0-9]+');
Route::get('/client/{client_id}', 'CampaignController@client')->where('client_id', '[0-9]+');


Route::get('/{campaign_id}', 'CampaignController@campaign')->where('campaign_id', '[0-9]+');
Route::get('/{campaign_id}/keywords', 'CampaignController@keywords')->where('campaign_id', '[0-9]+');
>>>>>>> fc735e5ce7655de35d9a0bc73b69bc7cbd685680
