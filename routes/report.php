<?php



Route::get('Founder_Report','ReportFounderController@Founder_Report')->middleware('auth');
Route::get('Founder_Report_incomplete','ReportFounderController@Founder_Report_incomplete')->middleware('auth');


Route::get('Find_Year_Report','ReportFounderController@Find_Year_Report')->middleware('auth');
Route::get('Find_Year_Report_incomplete','ReportFounderController@Find_Year_Report_incomplete')->middleware('auth');

Route::get('Find_Year_Total','ReportFounderController@Find_Year_Total')->middleware('auth');
Route::get('Find_Year_Total_incomplete','ReportFounderController@Find_Year_Total_incomplete')->middleware('auth');

Route::get('Find_Year_Total_Founder','ReportFounderController@Find_Year_Total_Founder')->middleware('auth');
Route::get('Find_Year_Total_Founder_incomplete','ReportFounderController@Find_Year_Total_Founder_incomplete')->middleware('auth');

Route::get('ProjectType_Report','ReportProjecTypeController@index')->middleware('auth');
Route::get('ProjectType_Report_incomplete','ReportProjecTypeController@index_incomplete')->middleware('auth');




Route::get('Find_Project_Type_Year_Report_List','ReportProjecTypeController@Find_Project_Type_Year_Report_List')->middleware('auth');
Route::get('Find_Project_Type_Year_Report_List_incomplete','ReportProjecTypeController@Find_Project_Type_Year_Report_List_incomplete')->middleware('auth');


Route::get('Find_Year_Total_Project_Type','ReportProjecTypeController@Find_Year_Total_Project_Type')->middleware('auth');
Route::get('Find_Year_Total_Project_Type_incomplete','ReportProjecTypeController@Find_Year_Total_Project_Type_incomplete')->middleware('auth');

Route::get('Found_Report','ReportFoundController@index')->middleware('auth');
Route::get('Found_Report_incomplete','ReportFoundController@index_incomplete')->middleware('auth');



Route::get('Find_Year_Total_Found_Founder','ReportFoundController@Find_Year_Total_Found_Founder')->middleware('auth');
Route::get('Find_Year_Total_Found_Founder_incomplete','ReportFoundController@Find_Year_Total_Found_Founder_incomplete')->middleware('auth');

Route::get('Find_Year_Total_Found_ProjecType','ReportFoundController@Find_Year_Total_Found_ProjecType')->middleware('auth');

Route::get('Find_Year_Total_Found_ProjecType_incomplete','ReportFoundController@Find_Year_Total_Found_ProjecType_incomplete')->middleware('auth');





?>