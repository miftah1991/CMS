<span class="btn btn-warning btn-block"></span>
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">بخش قراداد کننده</h3>
                    <!-- tools box -->

                    <!-- /. tools -->
                </div>
                <div class="box-body">

                    <table class="table table-responsive ">

                        <tr>

                            <td>
                                <span class="fa  fa-calendar btn btn-info"></span>    تاریخ اغاز قرارداد
                            </td>
                            <td>
                               {{$data->Start_Date_Contract}}
                            </td>
                            <td>
                                <span class="fa  fa-calendar btn btn-default"></span> تاریخ صدرو تضمین کار
                            </td>
                            <td>
                                {{$data->Export_Strat_Date}}
                            </td>

                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-calendar  btn btn-primary"></span>      تاریخ ختم قرارداد
                            </td>
                            <td>
                              {{$data->End_Date_Contract}}
                            </td>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>تاریخ ختم صدور تضمین
                            </td>
                            <td>
                                {{$data->Export_End_Date}}
                            </td>

                        </tr>

                        <tr>

                            <td>
                                <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>محل تسلیمی دهی اجناس
                            </td>
                            <td>
                                {{$data->Place_Item}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-money fa-lg btn btn-default"></span>مقدار تامینات
                            </td>
                            <td>
                                {{$data->Amount}}
                            </td>
                            <td>
                                <span class="fa  fa-warning fa-lg btn btn-default"></span>میعاد ورنتی
                            </td>
                            <td>
                                {{$data->Warrenty}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-default"></span>    از تاریخ تسلیمی اجناس
                            </td>
                            <td>
                                {{$data->Date_From_Item}}
                            </td>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-info"></span>الی تاریخ تسلیمی اجناس
                            </td>
                            <td>
                                {{$data->Date_To_Item}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-bank  btn btn-primary"></span>      بانک مربوطه
                            </td>
                            <td>
                                {{$data->Bank}}
                            </td>
                            <td>
                                <span class="fa  fa-file  btn btn-warning"></span>مبلع تضمین اجرا کار
                            </td>
                            <td>
                                {{$data->Warrent_Rupee}}
                            </td>
                        </tr>

                        <tr>

                        </tr>
                    </table>
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">شرکت قرارداد کننده</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive ">


                        <tr>
                            <td>
                                <span class="fa  fa-university fa-lg btn btn-pinterest"></span>  اسم شرکت
                            </td>
                            <td>
                               @isset($data->contractcompany->Name) {{$data->contractcompany->Name}} @endisset
                            </td>
                            <td>
                                <span class="fa  fa-phone fa-lg btn btn-pinterest"></span>      شماره تماس
                            </td>
                            <td>
                                @isset($data->contractcompany->Phone) {{$data->contractcompany->Phone}} @endisset

                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-envelope-open fa-lg btn btn-primary"></span>       ادرس ایمل
                            </td>
                            <td>
                                @isset($data->contractcompany->Email) {{$data->contractcompany->Email}} @endisset

                            </td>
                            <td>
                                <span class="fa  fa-file btn btn-default"></span> جواز شرکت
                            </td>
                            <td>
                                @isset($data->contractcompany->Jawaz) {{$data->contractcompany->Jawaz}} @endisset

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>     تاریخ اغاز جواز
                            </td>
                            <td>
                                @isset($data->contractcompany->Date_From_Jawaz) {{$data->contractcompany->Date_From_Jawaz}} @endisset

                            </td>
                            <td>
                                <span class="fa  fa-calendar  btn btn-default"></span>تاریخ ختم جواز
                            </td>
                            <td>
                                @isset($data->contractcompany->Date_To_Jawaz) {{$data->contractcompany->Date_To_Jawaz}} @endisset

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-tint fa-lg btn btn-primary"></span>
                                تین این نمبر
                            </td>
                            <td>
                                @isset($data->contractcompany->Tin) {{$data->contractcompany->Tin}} @endisset

                            </td>
                            <td>
                                <span class="fa  fa-legal fa-lg btn btn-default"></span>
                                ثپت جواز نمبر
                            </td>
                            <td>
                                @isset($data->contractcompany->Jawaz) {{$data->contractcompany->Jawaz}} @endisset

                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">فایل های مربوطه پروژه</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive ">

                        <tr>
                            <td>
                                <span class="fa  fa-file btn btn-default"></span>تاییدی از صحت و مستقم
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Contract')}}/{{$data->Helth_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                            <td>
                                <span class="fa  fa-file fa-lg btn btn-primary"></span>فایل تضمین
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Contract')}}/{{$data->Tazmin_File}}" ><span class="fa fa-download"></span></a>
                            </td>

                        </tr>

                        <tr>

                            <td>
                                <span class="fa  fa-file fa-lg btn btn-warning"></span>تضمین حسن اجرا کار
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Contract')}}/{{$data->Warrenty_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-reorder fa-lg btn btn-pinterest"></span>  مشخصات قرارداد
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Contract')}}/{{$data->Contract_Information_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                            <td>
                                <span class="fa   fa-desktop btn btn-pinterest"></span> بل احجام
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Contract')}}/{{$data->Bill_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-file fa-lg btn btn-primary"></span>     شرایط پرداخت
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Contract')}}/{{$data->Term_Cond_File}}" ><span class="fa fa-download "></span></a>
                            </td>
                            <td>
                                <span class="fa  fa-file fa-lg btn btn-warning"></span>جواز شرکت ×
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Contract')}}/{{$data->contractcompany->Jawaz_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                        </tr>



                    </table>
                </div>
            </div>
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">لست هیت  معاینه شرکت قرارداد</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive ">

                        <tr>
                            <td>شماره مسسلسل</td>
                            <td>اسم هیت</td>
                            <td>شماره تماس</td>
                            <td>ایمل ادرس</td>
                        </tr>
                        @foreach($Member_List as $key=>$rcd)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$rcd->Emp_Name}}</td>
                                <td>{{$rcd->Phone}}</td>
                                <td>{{$rcd->Email}}</td>
                            </tr>

                        @endforeach

                    </table>
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">ملاحظات</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive ">





                        <tr>
                            <td>
                                {{$data->remark}}
                            </td>
                        </tr>






                    </table>
                </div>
            </div>
        </section>
    </div>




    <script>



</script>

