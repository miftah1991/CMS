<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p>   @if(Auth::check()){{Auth::user()->name}} @endif</p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
              @if(Session::get('role_id')==19)
            <li class="header"><a href="{{url('home')}}">    صفحه اصلی      </a></li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>حالت پروژه</span>
                        <span class="pull-left-container">

            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('Process')}}">حالت پروژها</a></li>
                        <li><a href="{{url('Process_Complete')}}">پروژه حالت مکمل</a></li>

                    </ul>
                </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>پلان پروژه تدراکاتی</span>
                    <span class="pull-left-container">

            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Register_Project')}}">ثپت قرار دادها</a></li>
                    <li><a href="{{url('Register_Project_List')}}">لیست قراد دادها</a></li>
                    <li><a href="{{url('Regject_Project_List')}}">لست قرارداد لفوه شده</a></li>
                    <li><a href="{{url('Accept_Project_List')}}">لست قرارداد دوباره قبول شده</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>ثپت اعلان و جلسه قراردادها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Register_Anouce_project')}}">ثپت اعلان و مشخصات جلسه</a></li>
                    <li><a href="{{url('AounceProjectList')}}">لست جلسه</a></li>
                    <li><a href="{{url('Show_Anounce_Email')}}"> لست هیت ایمل</a></li>

                </ul>
            </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>ثپت شرطنامه شرکت افر کننده</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('Condition_Offer')}}">ثپت شرطنامه </a></li>
                        <li><a href="{{url('List_Condition_Offer')}}">لست شرطنامه شرکتها</a></li>

                    </ul>
                </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span> شرکت افر کننده</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Register_Offer_Company')}}">ثپت شرکت  افر </a></li>
                    <li><a href="{{url('List_Register_Offer_Company')}}">لست افر شرکت</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>توظیف هیت ارزیابی</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Evaluation_Project')}}"> ثپت هیت ارزیابی</a></li>
                    <li><a href="{{url('List_Evaluation_Project')}}"> لست هیت ارزیابی</a></li>
                    <li><a href="{{url('Show_Evaluation_Email')}}"> لست هیت ایمل</a></li>

                </ul>
            </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>راپور ارزیابی هیت</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('Evaluation_Report')}}"> ثپت هیت ارزیابی</a></li>
                        <li><a href="{{url('List_Evaluation_Report')}}">راپور هیت پروژه قبول شده</a></li>
                        <li><a href="{{url('List_Evaluation_Reject_Report')}}">راپور هیت پروژه رد شده</a></li>

                    </ul>
                </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>ثپت شرکت برنده</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Award_Company')}}">ثپت شرکت برنده</a></li>
                    <li><a href="{{url('Award_List_Company')}}"> لست شرکت برنده</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>شرکت اعتراض دوطلبان</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Complain_Company')}}">ثپت اعتراض داوطلبان</a></li>
                    <li><a href="{{url('List_Complain_Company')}}"> لست اعتراض داوطلبان</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i> <span>ثپت قراردادی</span>
                    <span class="pull-left-container">
              <i class="fa fa-home pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Contract_Company')}}">ثپت خصوصیات قراردادی</a></li>
                    <li><a href="{{url('List_Contract_Company')}}"> لست شرکت قراردادی</a></li>
                    <li><a href="{{url('Show_Contract_Email')}}"> لست هیت ایمل</a></li>

                </ul>
            </li>

                      <li class="treeview">
                          <a href="#">
                              <i class="fa fa-table"></i> <span>ثپت پیش پرداخت </span>
                              <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                          </a>
                          <ul class="treeview-menu">
                              <li><a href="{{url('Persantage')}}">ثپت</a></li>
                              <li><a href="{{url('List_Persantage')}}"> جدول پرداخت پرداخت</a></li>

                          </ul>
                      </li>

                      <li class="treeview">
                          <a href="#">
                              <i class="fa fa-home"></i> <span>ثپت ګزارش هیت قرارداد</span>
                              <span class="pull-left-container">
              <i class="fa fa-home pull-left"></i>
            </span>
                          </a>
                          <ul class="treeview-menu">
                              <li><a href="{{url('Contract_Report')}}">  ثپت ګزارش هیت معاینه</a></li>
                              <li><a href="{{url('List_Contract_Report')}}"> لست کزارش</a></li>

                          </ul>
                      </li>








            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>پرداختها </span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Paymant')}}">ثپت پرداخت</a></li>
                    <li><a href="{{url('List_Paymant')}}"> جدول پرداخت</a></li>
                    <li><a href="{{url('View_Tracker')}}">Goods Tracker</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>بخش انوایس</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Invoice')}}">ثپت انوایس</a></li>
                    <li><a href="{{url('List_Invoice')}}"> جدول انوایس</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-hotel"></i> <span>تعدیلات پروژه</span>
                    <span class="pull-left-container">
              <i class="fa fa-home pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Extend_Project')}}">ثپت تعدیلات</a></li>
                    <li><a href="{{url('List_Extend_Project')}}">جدول تعدیلات درخواست شده</a></li>
                    <li><a href="{{url('List_Extend_Project_Report')}}">جدول ګزارش تعدیلات</a></li>
                    <li><a href="{{url('Show_Extand_Email')}}">لست ایمل</a></li>



                </ul>
            </li>
                      <li class="treeview">
                          <a href="#">
                              <i class="fa fa-hotel"></i> <span>جریمه قراردادی</span>
                              <span class="pull-left-container">
              <i class="fa fa-home pull-left"></i>
            </span>
                          </a>
                          <ul class="treeview-menu">
                              <li><a href="{{url('Crime_Project')}}">ثپت جریمه</a></li>
                              <li><a href="{{url('Crime_Project_List')}}">لست ثبت جریمه</a></li>


                          </ul>
                      </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-coffee"></i> <span>تکمیل پروژه</span>
                    <span class="pull-left-container">
              <i class="fa fa-home pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Complete_Project')}}">ثپت تکمیل پروژه</a></li>
                    <li><a href="{{url('List_Complete_Project')}}">جدول پروژه تکیمل شده</a></li>

                </ul>
            </li>


            <li class="treeview">


                <a href="#">
                    <i class="fa fa-users"></i> <span>کاربران</span>
                    <span class="pull-left-container">
              <i class="fa fa-user pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Register_User')}}">ثپت کاربران</a></li>
                    <li><a href="{{url('List_User')}}">لیست کاربران</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-stack-exchange"></i> <span>تنظیمات</span>
                    <span class="pull-left-container">
              <i style="color: red;" class="fa  fa-cog pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Fonder')}}">تطمویل کننده</a></li>
                    <li><a href="{{url('Project')}}">نوع قرارداد</a></li>
                    <li><a href="{{url('Invoice_Type')}}">انوایس</a></li>


                    <li><a href="{{url('role')}}">نوع کاربر</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-print"></i> <span>  راپور قرارداد تکمیل شده</span>
                    <span class="pull-left-container">
              <i style="color:green;" class="fa fa-print pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Founder_Report')}}">راپورتطمویل کننده </a></li>
                    <li><a href="{{url('ProjectType_Report')}}">راپور نوع قرارداد</a></li>
                    <li><a href="{{url('Found_Report')}}">راپور بودجوی</a></li>

                </ul>
            </li>
                      <li class="treeview">
                          <a href="#">
                              <i class="fa fa-print"></i> <span>  راپور قرارداد نا تکمیل شده</span>
                              <span class="pull-left-container">
              <i style="color:green;" class="fa fa-print pull-left"></i>
            </span>
                          </a>
                          <ul class="treeview-menu">
                              <li><a href="{{url('Founder_Report_incomplete')}}">راپورتطمویل کننده </a></li>
                              <li><a href="{{url('ProjectType_Report_incomplete')}}">راپور نوع قرارداد</a></li>
                              <li><a href="{{url('Found_Report_incomplete')}}">راپور بودجوی</a></li>

                          </ul>
                      </li>

                      <li class="treeview">
                          <a href="#">
                              <i class="fa fa-pie-chart"></i>
                              <span>تفتیش</span>
                              <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                          </a>
                          <ul class="treeview-menu">
                              <li><a href="{{url('List_Audits')}}">لست تفتیش</a></li>


                          </ul>
                      </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open"></i> <span>ارشیف</span>
                    <span class="pull-left-container">
              <i style="color:green;" class="fa fa-print pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Archive')}}">اضافه نمودن ارشیف</a></li>
                    <li><a href="{{url('List_Archive')}}">لیست ارشیف</a></li>
                    <li><a href="{{url('Search_Archive')}}">جستجو ارشیف</a></li>
                    <li><a href="{{url('Archive_Location')}}">الماری</a></li>
                    <li><a href="{{url('Company')}}">شرکتها</a></li>


                </ul>
            </li>
                      @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
