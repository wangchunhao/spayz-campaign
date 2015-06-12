<?php
Route::get('/campaign/{campaign_id}', 'CampaignController@campaign')->where('campaign_id', '[0-9]+');
Route::get('/client/{client_id}', 'CampaignController@client')->where('client_id', '[0-9]+');
Route::get('/filter', 'CampaignController@filter_save');
Route::get('/getFilter', 'CampaignController@get_filter');


Route::get('/{campaign_id}', 'CampaignController@campaign')->where('campaign_id', '[0-9]+');
Route::get('/{campaign_id}/keywords', 'CampaignController@keywords')->where('campaign_id', '[0-9]+');
Route::get('/{campaign_id}/event', 'CampaignController@event')->where('campaign_id', '[0-9]+');
Route::get('/{campaign_id}/channel', 'CampaignController@channel')->where('campaign_id', '[0-9]+');

Route::get('/location', 'CampaignController@location');
