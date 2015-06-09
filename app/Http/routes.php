<?php
Route::get('/campaign/{campaign_id}', 'CampaignController@campaign')->where('campaign_id', '[0-9]+');
Route::get('/client/{client_id}', 'CampaignController@client')->where('client_id', '[0-9]+');

Route::get('/{campaign_id}', 'CampaignController@campaign')->where('campaign_id', '[0-9]+');
Route::get('/{campaign_id}/keywords', 'CampaignController@keywords')->where('campaign_id', '[0-9]+');
Route::get('/{campaign_id}/event', 'CampaignController@event')->where('campaign_id', '[0-9]+');
Route::get('/{campaign_id}/channel', 'CampaignController@channel')->where('campaign_id', '[0-9]+');

Route::get('/location', 'CampaignController@location');

// Route::get('', 'WelcomeController@index');
$campaignurl = '/campaignadmin';
Route::get('/','CampaignAdminController@index');
Route::get('/lists','CampaignAdminController@lists');
Route::get('/login','CampaignAdminController@Login');
Route::get('/adduser','CampaignAdminController@Adduser');
Route::get('/edit','CampaignAdminController@edit');
Route::post('/update','CampaignAdminController@update');
Route::post('/add','CampaignAdminController@add');
Route::post('/del','CampaignAdminController@del');
Route::post('/log','CampaignAdminController@log');
Route::get('/addclient', 'CampaignAdminController@addclient');
Route::get('/addcampaign', 'CampaignAdminController@addcampaign');

