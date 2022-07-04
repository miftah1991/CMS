<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return redirect()->to('http://localhost:81/login');
});


Route::group(['middleware' => 'web'], function () {
    Route::any('login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout');

    //home controller

    Route::get('Find_Offer_Date_Email','HomeController@Find_Offer_Date_Email')->middleware('auth');;
    Route::get('Find_Met_Date_Email','HomeController@Find_Met_Date_Email')->middleware('auth');;
    Route::get('Find_Eval_Date_Email','HomeController@Find_Eval_Date_Email')->middleware('auth');;
    Route::get('Find_Contract_Date_Email','HomeController@Find_Contract_Date_Email')->middleware('auth');;
    Route::get('Find_Extand_Date_Email','HomeController@Find_Extand_Date_Email')->middleware('auth');;

    Route::get('view_rec_suppaymant/{id}','HomeController@view_rec_suppaymant')->middleware('auth');;




    //Company Controller


  Route::get('Company','CompanyController@index')->middleware('auth');;

    Route::get('Edit_Company/{id}','CompanyController@Edit')->middleware('auth');;
    Route::post('Add_Company','CompanyController@store')->middleware('auth');;

    Route::post('Update_Company','CompanyController@Update')->middleware('auth');;


  Route::get('List_Audits','AuditController@List')->middleware('auth');;

    Route::get('Archive','ArchiveController@index')->middleware('auth');;
    Route::post('Add_Archive','ArchiveController@store')->middleware('auth');;
    Route::get('List_Archive','ArchiveController@List_Archive')->middleware('auth');;
    Route::post('Update_Archive','ArchiveController@Update')->middleware('auth');;
    Route::get('Edit_Archive/{id}','ArchiveController@Edit')->middleware('auth');;
    Route::get('Search_Archive','ArchiveController@Search_Archive')->middleware('auth');;
    Route::get('view_Archive/{id}','ArchiveController@view_Archive')->middleware('auth');;



    Route::get('Get_Project_Code','ArchiveController@Get_Project_Code')->middleware('auth');;
    Route::get('Get_Project_Year','ArchiveController@Get_Project_Year')->middleware('auth');;

    Route::get('Get_Project_Arc_Fid','ArchiveController@Get_Project_Arc_Fid')->middleware('auth');;
    Route::get('Get_Project_Arc_Com_Fid','ArchiveController@Get_Project_Arc_Com_Fid')->middleware('auth');

    Route::post('Add_Archive_Location','ArchiveController@Add_Archive_Location')->middleware('auth');;
    Route::get('Archive_Location','ArchiveController@Archive_Location')->middleware('auth');;
    Route::get('Edit_Archive_Location/{id}','ArchiveController@Edit_Archive_Location')->middleware('auth');;
    Route::post('Update_Archive_Location','ArchiveController@Update_Archive_Location')->middleware('auth');;





Route::get('Fonder','SettingController@Fouder_index')->middleware('auth');;
    Route::get('/Edit_Founder/{id}','SettingController@Edit_Founder')->middleware('auth');
    Route::post('Update_Fouder','SettingController@Update_Fouder')->middleware('auth');
    Route::post('Add_Fouder','SettingController@Add_Fouder')->middleware('auth');

    Route::get('Project','SettingController@Project_index')->middleware('auth');
    Route::get('/Edit_Project/{id}','SettingController@Edit_Project')->middleware('auth');
    Route::post('Update_Project','SettingController@Update_Project')->middleware('auth');
    Route::post('Add_Project','SettingController@Add_Project')->middleware('auth');

    Route::get('Invoice_Type','SettingController@Invoice_Type_index')->middleware('auth');

    Route::get('/Edit_Invoice_Type/{id}','SettingController@Edit_Invoice_Type')->middleware('auth');
    Route::post('Update_Invoice_Type','SettingController@Update_Invoice_Type')->middleware('auth');
    Route::post('Add_Invoice_Type','SettingController@Add_Invoice_Type')->middleware('auth');

    Route::get('role','SettingController@Role_index')->middleware('auth');
    Route::get('/Edit_Role/{id}','SettingController@Edit_Role')->middleware('auth');
    Route::post('Update_Role','SettingController@Update_Role')->middleware('auth');
    Route::post('Add_Role','SettingController@Add_Role')->middleware('auth');





       Route::get('/Register_User', 'Auth\RegisterController@index')->middleware('auth');
    Route::post('Add_User', 'Auth\RegisterController@store')->middleware('auth');
    Route::get('List_User', 'Auth\RegisterController@List')->middleware('auth');
    Route::get('nactive/{id}', 'Auth\RegisterController@nactive')->middleware('auth');
    Route::get('active/{id}', 'Auth\RegisterController@active')->middleware('auth');
    Route::get('Edit_َUser/{id}', 'Auth\RegisterController@Edit')->middleware('auth');
    Route::post('Update_User', 'Auth\RegisterController@Update')->middleware('auth');



    Route::get('/logout', 'LoginController@logout')->middleware('auth');
    Route::get('/home', 'HomeController@index')->middleware('auth');
    Route::get('/Register_Project', 'RegisterController@index')->middleware('auth');
    Route::post('/Add_Register_Project', 'RegisterController@store')->middleware('auth');
    Route::get('/GetInfo_RegiterProject', 'RegisterController@GetInfo_RegiterProject')->middleware('auth');

    Route::get('/Edit_Register_Project/{id}', 'RegisterController@Edit')->middleware('auth');
    Route::post('Update_Register_Project',['as'=>'Update_Register_Project','uses'=>'RegisterController@update'])->middleware('auth');

    Route::get('/View_Register_Project/{id}', 'RegisterController@View_Register_Project')->middleware('auth');
    Route::get('/Print_Register_Project/{id}', 'RegisterController@Print_Register_Project')->middleware('auth');



    Route::get('/Register_Project_List', 'RegisterController@Register_Project_List')->middleware('auth');

    ////////////Aounce Project Controller ////////////////////

    Route::get('/Register_Anouce_project', 'AnounceController@Register_Anouce_project')->middleware('auth');
    Route::post('/Add_Aounce_Project', 'AnounceController@store')->middleware('auth');

    Route::get('/AounceProjectList', 'AnounceController@AounceProjectList')->middleware('auth');
    Route::get('/GetEmpMember', 'AnounceController@GetEmpMember')->middleware('auth');

    Route::get('/Edit_Aounce_Project/{id}', 'AnounceController@Edit')->middleware('auth');
    Route::post('/update_Aounce_Project', 'AnounceController@update')->middleware('auth');

    Route::get('/view_Aounce_Project/{id}', 'AnounceController@view')->middleware('auth');

    Route::get('/print_Aounce_Project/{id}', 'AnounceController@print')->middleware('auth');



    /////////////Register Company//////////////////////////
    Route::get('/Register_Offer_Company', 'ROCController@index')->middleware('auth');

    Route::post('/Store_Offer_Company', 'ROCController@store')->middleware('auth');

    Route::get('/List_Register_Offer_Company', 'ROCController@List')->middleware('auth');

    Route::get('/Edit_Offer_Company/{id}', 'ROCController@Edit')->middleware('auth');
    Route::post('/Update_Offer_Company', 'ROCController@Update')->middleware('auth');
    Route::get('/view_Offer_Company/{id}', 'ROCController@View')->middleware('auth');

    Route::get('/print_Offer_Company/{id}', 'ROCController@print')->middleware('auth');


    //////////////////////Awared  Company //////////////////
    Route::get('/Award_Company', 'AwardController@index')->middleware('auth');
    Route::post('Add_Award', 'AwardController@store')->middleware('auth');

    Route::get('Award_List_Company', 'AwardController@List')->middleware('auth');
    Route::get('Edit_Award_Project/{id}', 'AwardController@Edit')->middleware('auth');
    Route::post('Update_Award', 'AwardController@Update')->middleware('auth');

    Route::get('View_Award_Project/{id}', 'AwardController@View')->middleware('auth');
    Route::get('print_Award_Project/{id}', 'AwardController@print')->middleware('auth');

    /////////////////// Complain_Company Route section /////////////////////
    Route::get('/Complain_Company', 'ComplainController@index')->middleware('auth');
    Route::post('/Add_Complain', 'ComplainController@store')->middleware('auth');

    Route::get('/List_Complain_Company', 'ComplainController@List')->middleware('auth');

    Route::get('/Edit_Complain_Company/{id}', 'ComplainController@Edit')->middleware('auth');
    Route::post('Update_Complain', 'ComplainController@Update')->middleware('auth');
    Route::get('View_Complain_Company/{id}', 'ComplainController@View')->middleware('auth');
    Route::get('print_Complain_Company/{id}', 'ComplainController@print')->middleware('auth');



    /////////////////// Contract Controller  Route section /////////////////////
    Route::get('/Contract_Company', 'ContractController@index')->middleware('auth');

    Route::post('Add_Contract', 'ContractController@store')->middleware('auth');

    Route::get('List_Contract_Company', 'ContractController@List')->middleware('auth');
    Route::get('View_Contract_Company/{id}', 'ContractController@View')->middleware('auth');

    Route::get('print_Contract_Company/{id}', 'ContractController@print')->middleware('auth');

    Route::get('Edit_Contract_Company/{id}', 'ContractController@Edit')->middleware('auth');

    Route::post('Update_Contract', 'ContractController@Update')->middleware('auth');


    Route::get('SMail', 'MailController@index')->middleware('auth');


    //////////////Evaluation controller ////////////////////////////

    Route::get('/Evaluation_Project', 'EvaluationController@index')->middleware('auth');
      Route::post('Add_Evaluation','EvaluationController@store')->middleware('auth');
    Route::get('/List_Evaluation_Project', 'EvaluationController@List')->middleware('auth');

    Route::get('/Edit_Evaluation_Project/{id}', 'EvaluationController@Edit')->middleware('auth');

    Route::post('/Update_Evaluation', 'EvaluationController@Update')->middleware('auth');
    Route::get('View_Evaluation_Project/{id}', 'EvaluationController@View')->middleware('auth');
    Route::get('print_Evaluation_Project/{id}', 'EvaluationController@print')->middleware('auth');


    /////////////////Rreport Evalvation
    Route::get('Evaluation_Report', 'EvaluationReportController@index')->middleware('auth');
    Route::post('Add_Evaluation_Report', 'EvaluationReportController@store')->middleware('auth');
    Route::get('List_Evaluation_Report', 'EvaluationReportController@List')->middleware('auth');
    Route::get('Find_Eval_Report_Duplicate', 'EvaluationReportController@Find_Eval_Report_Duplicate')->middleware('auth');

    Route::get('Edit_Evaluation_Report/{id}', 'EvaluationReportController@Edit')->middleware('auth');

    Route::get('View_Evaluation_Report/{id}', 'EvaluationReportController@View')->middleware('auth');

    Route::post('Update_ٍEvaluation_Report', 'EvaluationReportController@Update')->middleware('auth');
    Route::get('List_Evaluation_Reject_Report', 'EvaluationReportController@List_Evaluation_Reject_Report')->middleware('auth');


    ///////////Paymant Controller ////////////////////


    Route::get('Paymant','PaymantController@index')->middleware('auth');
    Route::post('Add_Paymant','PaymantController@store')->middleware('auth');
    Route::get('List_Paymant','PaymantController@List')->middleware('auth');




    Route::get('View_Paymant/{id}','PaymantController@View')->middleware('auth');
    Route::get('Edit_Paymany/{id}','PaymantController@Edit')->middleware('auth');
    Route::post('Update_Paymant','PaymantController@Update')->middleware('auth');






    Route::post('Find_Paymant','PaymantController@Find_Paymant')->middleware('auth');
    Route::get('View_Sub_Paymant/{id}','PaymantController@View_Sub_Paymant')->middleware('auth');
    Route::post('Add_Sub_Paymant','PaymantController@Add_Sub_Paymant')->middleware('auth');
    Route::get('View_Tracker','PaymantController@View_Tracker')->middleware('auth');
    Route::post('Find_Track','PaymantController@Find_Track')->middleware('auth');

     Route::get('Sub_Paymant_Model','PaymantController@Sub_Paymant_Model')->middleware('auth');

// Contract Report Controller


 Route::get('Contract_Report','ContractReportController@index')->middleware('auth');
    Route::post('Add_Contract_Report','ContractReportController@store')->middleware('auth');
    Route::get('List_Contract_Report','ContractReportController@List')->middleware('auth');

    Route::get('Edit_Contract_Report/{id}','ContractReportController@Edit')->middleware('auth');
    Route::get('Print_Contract_Report/{id}','ContractReportController@Print')->middleware('auth');
    Route::get('View_Contract_Report/{id}','ContractReportController@View')->middleware('auth');


    Route::post('Update_Contract_Report','ContractReportController@Update')->middleware('auth');







    ///////////////Perstange Controller ////////////////////////////
    Route::get('Persantage','WorkPerController@index')->middleware('auth');
    Route::post('Add_Persantage','WorkPerController@store')->middleware('auth');
    Route::get('Get_Perstange','WorkPerController@Get_Perstange')->middleware('auth');
    Route::get('Find_Total_Persantage','WorkPerController@Find_Total_Persantage')->middleware('auth');
    Route::get('Delete_Persantage/{id}','WorkPerController@Delete_Persantage')->middleware('auth');

    Route::get('List_Persantage','WorkPerController@List_Persantage')->middleware('auth');
    Route::get('Print_Persantage/{id}','WorkPerController@print')->middleware('auth');
    Route::get('View_Persantage/{id}','WorkPerController@View')->middleware('auth');



//////////////Invoice Controller /////////////////////

    Route::get('Invoice','InvoiceController@index')->middleware('auth');
    Route::post('Add_Invoice','InvoiceController@store')->middleware('auth');
    Route::get('List_Invoice','InvoiceController@List')->middleware('auth');
    Route::get('View_Invoice/{id}','InvoiceController@View')->middleware('auth');
    Route::get('print_Invoice/{id}','InvoiceController@print')->middleware('auth');
    Route::get('Edit_Inovoice/{id}','InvoiceController@Edit')->middleware('auth');
    Route::post('Update_Invoice','InvoiceController@Update')->middleware('auth');


 ///////////////////Extend Project Controller //////////////////////
    Route::get('Extend_Project','ExtandProjectController@index')->middleware('auth');
    Route::post('Add_Extend','ExtandProjectController@store')->middleware('auth');
    Route::get('List_Extend_Project','ExtandProjectController@List')->middleware('auth');
    Route::get('View_Extand_Project/{id}','ExtandProjectController@View')->middleware('auth');
    Route::get('Edit_Extand_Project/{id}','ExtandProjectController@Edit')->middleware('auth');
    Route::post('Update_Extend','ExtandProjectController@Update')->middleware('auth');
    Route::get('Print_Extand_Project/{id}','ExtandProjectController@Print')->middleware('auth');


    //////////////////Condition Offer ////////////////////////////

    Route::get('Condition_Offer','ConditionOfferController@index')->middleware('auth');
    Route::post('Store_Condition_Offer','ConditionOfferController@store')->middleware('auth');
    Route::get('List_Condition_Offer','ConditionOfferController@List')->middleware('auth');
    Route::get('Find_Total_Condition_Offer_List/{id}','ConditionOfferController@Find_Total_Condition_Offer_List')->middleware('auth');
    Route::get('Edit_Condition_Offer/{id}','ConditionOfferController@Edit')->middleware('auth');
    Route::post('Update_Condition_Offer','ConditionOfferController@Update')->middleware('auth');






    Route::get('Add_Extend_Project_Report/{id}','ExtendProjectReportController@index')->middleware('auth');

    Route::post('Add_Extend_Report','ExtendProjectReportController@store')->middleware('auth');
    Route::get('List_Extend_Project_Report','ExtendProjectReportController@List')->middleware('auth');
    Route::get('Find_Total_Extand_Report_List/{id}','ExtendProjectReportController@Find_Total_Extand_Report_List')->middleware('auth');

    Route::get('View_Extand_Report_Details/{id}','ExtendProjectReportController@View')->middleware('auth');
    Route::get('Print_Extand_Report_Details/{id}','ExtendProjectReportController@Print')->middleware('auth');
    Route::get('Edit_Extand_Report_Details/{id}','ExtendProjectReportController@Edit')->middleware('auth');

    Route::get('Delete_Moany','ExtendProjectReportController@Delete_Moany')->middleware('auth');
    Route::get('Delete_Time','ExtendProjectReportController@Delete_Time')->middleware('auth');



    Route::post('Update_Extend_Report','ExtendProjectReportController@Update')->middleware('auth');


/////////////////// Crime Controller ////////////////
    Route::get('Crime_Project','CrimeController@index')->middleware('auth');
    Route::get('Crime_Project_List','CrimeController@List')->middleware('auth');
    Route::post('Add_Crime','CrimeController@store')->middleware('auth');
    Route::get('View_crime/{id}','CrimeController@View')->middleware('auth');
    Route::get('Edit_Crime/{id}','CrimeController@Edit')->middleware('auth');
    Route::post('Update_Crime','CrimeController@Update')->middleware('auth');
    Route::get('Print_Crime/{id}','CrimeController@Print')->middleware('auth');


    ////////////////////Complete_Project /////////////////////////////////

    Route::get('Complete_Project','CompleteController@index')->middleware('auth');
    Route::post('Add_Complete_Project','CompleteController@store')->middleware('auth');
    Route::get('List_Complete_Project','CompleteController@List')->middleware('auth');
    Route::get('Edit_Complete_Project/{id}','CompleteController@Edit')->middleware('auth');
    Route::post('Update_Complete_Project','CompleteController@Update')->middleware('auth');
    Route::get('View_Complete_Project/{id}','CompleteController@View')->middleware('auth');

    Route::get('print_Complete_Project/{id}','CompleteController@print')->middleware('auth');
//////////////////Reject_Project Route//////////////////////////////////

    Route::get('Reject_Project/{id}','RejectProjectController@index')->middleware('auth');
    Route::post('Add_Reject_Project','RejectProjectController@store')->middleware('auth');
    Route::get('Regject_Project_List','RejectProjectController@List')->middleware('auth');
    Route::get('Edit_Reject_Project/{id}','RejectProjectController@Edit')->middleware('auth');
    Route::post('Update_Reject_Project','RejectProjectController@Update')->middleware('auth');
    Route::get('View_Reject_Project/{id}','RejectProjectController@View')->middleware('auth');





///////////////////// Accepts Project /////////////////////////
    Route::get('Accept_Reject_Project/{id}','AcceptprojectController@index')->middleware('auth');
    Route::post('Add_Accept_Project','AcceptprojectController@store')->middleware('auth');
    Route::get('Accept_Project_List','AcceptprojectController@List')->middleware('auth');
    Route::get('Edit_Accept_Project/{id}','AcceptprojectController@Edit')->middleware('auth');
    Route::post('Update_Accept_Project','AcceptprojectController@Update')->middleware('auth');
    Route::get('View_Accept_Project/{id}','AcceptprojectController@View')->middleware('auth');


    ////////////Ajax Route Controller ///////////////

    Route::get('Find_Code', 'AjaxController@Find_Code')->middleware('auth');



    ////////////////////Process Controller /////////////////////////////




       Route::get('Find_Prcess', 'ProcessController@Find_Prcess')->middleware('auth');
    Route::get('Process', 'ProcessController@Process')->middleware('auth');

    Route::get('view_process/{id}/{tblname?}', 'ProcessController@view_process')->middleware('auth');

    Route::get('Process_Complete', 'ProcessController@Process_Complete')->middleware('auth');

    Route::post('view_process_complete', 'ProcessController@view_process_complete')->middleware('auth');





    Route::get('GetListAounce', 'AjaxController@GetListAounce')->middleware('auth');

    Route::get('Delete_Member_Contact', 'AjaxController@Delete_Member_Contact')->middleware('auth');

    //Route::get('Delete_Member_Extand_Project', 'AjaxController@Delete_Member_Extand_Project')->middleware('auth');

    Route::get('GetDistrict', 'AjaxController@GetDistrict')->middleware('auth');
    Route::get('Find_Project', 'AjaxController@Find_Project')->middleware('auth');

    Route::get('Find_Offer_Company', 'AjaxController@Find_Offer_Company')->middleware('auth');

    Route::get('Delete_CompanyContact', 'AjaxController@Delete_CompanyContact')->middleware('auth');

    Route::get('Find_Project_at_Evaluation', 'AjaxController@Find_Project_at_Evaluation')->middleware('auth');

    Route::get('GetListEval', 'AjaxController@GetListEval')->middleware('auth');
    Route::get('Find_Award_Company', 'AjaxController@Find_Award_Company')->middleware('auth');


    Route::get('Find_Company_Award_Table', 'AjaxController@Find_Company_Award_Table')->middleware('auth');



    Route::get('Find_Project_at_Award', 'AjaxController@Find_Project_at_Award')->middleware('auth');

    Route::get('Find_Project_at_Anounce', 'AjaxController@Find_Project_at_Anounce')->middleware('auth');



    Route::get('Find_Complain_Company', 'AjaxController@Find_Complain_Company')->middleware('auth');
    Route::get('Find_Complain_Comapny', 'AjaxController@Find_Complain_Comapny')->middleware('auth');
    Route::get('Delete_Complain_Company', 'AjaxController@Delete_Complain_Company')->middleware('auth');
    Route::get('Find_Project_Type', 'AjaxController@Find_Project_Type')->middleware('auth');
    Route::get('Delete_Member_Contract', 'AjaxController@Delete_Member_Contract')->middleware('auth');
    Route::get('Find_Contract_Emplist', 'AjaxController@Find_Contract_Emplist')->middleware('auth');
    Route::get('Find_Project_at_Complain', 'AjaxController@Find_Project_at_Complain')->middleware('auth');
    Route::get('Find_Project_at_Contract', 'AjaxController@Find_Project_at_Contract')->middleware('auth');
    Route::get('Find_Project_at_Complete', 'AjaxController@Find_Project_at_Complete')->middleware('auth');
    Route::get('Find_Found', 'AjaxController@Find_Found')->middleware('auth');
    Route::get('Find_Invoice_Type', 'AjaxController@Find_Invoice_Type')->middleware('auth');
    Route::get('Check_Amount_Invoice', 'AjaxController@Check_Amount_Invoice')->middleware('auth');
    Route::get('Find_SubInvoice_List', 'AjaxController@Find_SubInvoice_List')->middleware('auth');
    Route::get('Find_Sub_Paymant', 'AjaxController@Find_Sub_Paymant')->middleware('auth');

    Route::get('Find_Duplicate_Invoice_Type', 'AjaxController@Find_Duplicate_Invoice_Type')->middleware('auth');
    Route::get('Find_Sub_Invoice_List', 'AjaxController@Find_Sub_Invoice_List')->middleware('auth');
    Route::get('Delete_Sub_Invoice_List', 'AjaxController@Delete_Sub_Invoice_List')->middleware('auth');

    Route::get('Delete_Paymant', 'AjaxController@Delete_Paymant')->middleware('auth');

    Route::get('Find_Total_Unite_Sub_Invoice', 'AjaxController@Find_Total_Unite_Sub_Invoice')->middleware('auth');
    Route::get('Find_Sreach_Itme', 'AjaxController@Find_Sreach_Itme')->middleware('auth');

    Route::get('Find_Complete_Project', 'AjaxController@Find_Complete_Project')->middleware('auth');
    Route::get('Find_Project_at_Complete_Persantage', 'AjaxController@Find_Project_at_Complete_Persantage')->middleware('auth');
    Route::get('Find_Contract_List', 'AjaxController@Find_Contract_List')->middleware('auth');
    Route::get('Find_Duplicate_Reject_Project', 'AjaxController@Find_Duplicate_Reject_Project')->middleware('auth');
    Route::get('Find_Duplicate_Extand_Details', 'AjaxController@Find_Duplicate_Extand_Details')->middleware('auth');
    Route::get('Find_Contract_Rupee', 'AjaxController@Find_Contract_Rupee')->middleware('auth');




    Route::get('Find_Discount','AjaxController@Find_Discount')->middleware('auth');





require_once ('report.php');
    require_once ('Email_Time.php');
});
