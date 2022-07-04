<div class="row">
    <section class="col-lg-12 col-md-12">
        <div class="box box-info">

            <div class="box-body">

                <table class="table table-responsive ">




                    <tr>
                        <td colspan="4"><span class="fa fa-home fa-lg btn btn-warning"></span> اسم قرارداد   </td>
                    </tr>

                    <tr>

                        <td colspan="4">{{$data->Project_Name}}</td>

                    </tr>

                    <tr>
                        <td>
                            <span class="fa  fa-user fa-lg btn btn-info"></span>    تمویل کننده
                        </td>
                        <td>
                            @isset($data->founder->FouName){{$data->founder->FouName}}  @endif
                        </td>
                        <td>
                            <span class="fa  fa-user fa-code btn btn-info"></span>     شماره حکم
                            {{$data->Order_Number}}
                        </td>
                    </tr>


                    <tr>
                        <td >
                            <span class="fa  fa-calendar fa-lg btn btn-primary"></span>       حکم تاریخ
                        </td>
                        <td class="myfont">
                            {{$data->Order_Date}}
                        </td>
                        <td>
                            <span class="fa   fa-money btn btn-default fa-lg"></span>          قیمت تخمنی
                        <td class="myfont">
                            {{$data->Rupee_Amount}}
                        </td>
                    </tr>

                    <tr>
                        <td >
                            <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>نوع پرژوه
                        </td>
                        <td>
                            {{$data->procurementtype->ProName}}
                        </td>
                        <td>
                            <span class="fa   fa-money fa-lg btn btn-default"></span>بودجه منظور شده
                        </td>
                        <td class="myfont">
                            {{$data->Accepts_Fund}}
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-info-circle"></i>
                <h3 class="box-title">مسول شرکت و موقعیت پروژه</h3>
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
                            <span class="fa  fa-user btn btn-primary"></span>   مسول پروژه
                        </td>
                        <td>
                            @isset($data->Project_Member){{$data->Project_Member}}  @endif
                        </td>
                        <td>
                            <span class="fa  fa-phone fa-lg btn btn-info"></span>      شماره تماس
                        </td>
                        <td class="myfont">
                            {{$data->Member_Phone}}
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <span class="fa  fa-envelope-open fa-lg btn btn-primary"></span>       ادرس ایمل
                        </td>
                        <td class="myfont">
                            {{$data->Member_Email}}
                        </td>
                        <td>
                            <span class="fa  fa-location-arrow fa-lg btn btn-default"></span>موقعیت پروژه
                        </td>
                        <td>
                            {{$data->Location}}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span class="fa  fa-location-arrow fa-lg btn btn-default"></span>ولایت
                        </td>
                        <td>
                            {{$data->district->province->name}}
                        </td>
                        <td>
                            <span class="fa  fa-location-arrow fa-lg btn btn-default"></span>والسوالی
                        </td>
                        <td>
                            {{$data->district->name}}
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-info-circle"></i>
                <h3 class="box-title">فایل ها به مربوطه پروژه</h3>
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
                            <span class="fa  fa-reorder fa-lg btn btn-pinterest"></span>  پشنهاد منظور تدادرکات
                        </td>
                        <td>
                            <a href="{{asset('storage/app/public/files')}}/{{$data->Requst_File}}" ><span class="fa fa-download"></span></a>
                        </td>
                        <td>
                            <span class="fa   fa-desktop btn btn-pinterest"></span>    فورم ابتدایی
                        </td>
                        <td>
                            <a href="{{asset('storage/app/public/files')}}/{{$data->Basic_File}}" ><span class="fa fa-download"></span></a>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <span class="fa  fa-list btn btn-primary"></span>       پلان تدادرکاتی
                        </td>
                        <td>
                            <a href="{{asset('storage/app/public/files')}}/{{$data->Plan_File}}" ><span class="fa fa-download "></span></a>
                        </td>
                        <td>
                            <span class="fa  fa-file btn btn-warning"></span>مشخصات پشنهاد شده
                        </td>
                        <td>
                            <a href="{{asset('storage/app/public/files')}}/{{$data->Attribute_File}}" ><span class="fa fa-download"></span></a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span class="fa   fa-file btn btn-default"></span>منظوری بودیجه
                        </td>
                        <td>
                            <a href="{{asset('storage/app/public/files')}}/{{$data->Fund_File}}" ><span class="fa fa-download"></span></a>
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>

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
                            {{$data->remarks}}
                        </td>
                    </tr>






                </table>
            </div>
        </div>
    </section>
</div>