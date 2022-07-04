
<span class="btn btn-warning btn-block"></span>
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">بخش شرکت اعتراض کننده</h3>
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
                            <td colspan="4"><span class="fa fa-home fa-lg btn btn-warning"></span>عنوان پروژه </td>
                        </tr>

                        <tr>

                            <td colspan="4">{{$data->registerprocurement->Project_Name}}</td>

                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-user fa-lg btn btn-info"></span>    تمویل کننده
                            </td>
                            <td>
                                @isset($data->registerprocurement->founder->FouName){{$data->registerprocurement->founder->FouName}}  @endif
                            </td>
                            <td>
                                <span class="fa  fa-calendar btn btn-info"></span>            تاریخ ثبت اعتراض
                            </td>
                            <td>
                               {{$data->Save_Date}}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>       تاریخ نامه قبولی افر
                            </td>
                            <td class="myfont">
                              {{$data->Offer_Date}}
                            </td>
                            <td>
                                <span class="fa  fa-sort-numeric-desc btn btn-default fa-lg"></span>      کود پروژه
                            </td>
                            <td>
                                {{$data->registerprocurement->Pro_Code}}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>نوع پرژوه
                            </td>
                            <td>
                                {{$data->registerprocurement->procurementtype->ProName}}
                            </td>
                            <td>
                                <span class="fa  fa-reorder fa-lg btn btn-pinterest"></span>  اطلاعیه قرارداد
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Complain')}}/{{$data->Complain_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>

            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">شرکت ها اعتراض کننده</h3>
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
                        <td>اسم شرکت</td>
                        <td>نماینده شرکت</td>
                        <td>شماره تماس</td>
                        <td>ایمل ادرس</td>
                    </tr>
                    @foreach($offer_company_List as $key=>$rcd)
                        <tr class="myfont">
                            <td>{{++$key}}</td>
                            <td>{{$rcd->Name}}</td>
                            <td>{{$rcd->MemberName}}</td>
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

