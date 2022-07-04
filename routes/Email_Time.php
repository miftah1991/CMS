<?php

Route::get('Send_Mail_Eval_Time/{id}', 'MailController@Send_Mail_Eval_Time')->middleware('auth');
Route::post('Insert_Email_Eval_Time', 'MailController@Insert_Email_Eval_Time')->middleware('auth');
Route::get('Send_Mail_Offer/{id}', 'MailController@Send_Mail_Offer')->middleware('auth');
Route::post('Insert_Email_Offer', 'MailController@Insert_Email_Offer')->middleware('auth');
Route::get('Send_Mail_Contract/{id}', 'MailController@Send_Mail_Contract')->middleware('auth');
Route::post('Insert_Email_Contract', 'MailController@Insert_Email_Contract')->middleware('auth');

Route::get('Send_Mail_Extand/{id}', 'MailController@Send_Mail_Extand')->middleware('auth');
Route::post('Insert_Mail_Extand', 'MailController@Insert_Mail_Extand')->middleware('auth');


Route::get('Show_Evaluation_Email', 'MailController@Show_Evaluation_Email')->middleware('auth');
Route::get('Show_Anounce_Email', 'MailController@Show_Anounce_Email')->middleware('auth');
Route::get('Show_Contract_Email', 'MailController@Show_Contract_Email')->middleware('auth');
Route::get('Show_Extand_Email', 'MailController@Show_Extand_Email')->middleware('auth');



Route::get('Send_Item_Email/{id}', 'MailController@Send_Item_Email')->middleware('auth');
Route::post('Insert_Email_Item_Contract', 'MailController@Insert_Email_Item_Contract')->middleware('auth');


Route::get('Send_Mail_Tazmin/{id}', 'MailController@Send_Mail_Tazmin')->middleware('auth');
Route::post('Insert_Email_Tazmin_Contract', 'MailController@Insert_Email_Tazmin_Contract')->middleware('auth');



?>
