@extends('layouts.master')

@section('content')

    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">قرارداد</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" id="btnprint" ><i class="fa fa-print"></i>
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
                            <td colspan="4">
                                <span class="btn btn-warning btn-block"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-user fa-lg btn btn-info"></span>    تمویل کننده
                            </td>
                            <td>
                                @isset($data->registerprocurement->founder->FouName){{$data->registerprocurement->founder->FouName}}  @endif
                            </td>
                            <td>
                                تاریخ اغاز قرارداد
                            </td>
                            <td class="myfont">
                               {{$data->Start_Date_Contract}}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>      تاریخ ختم قرارداد
                            </td>
                            <td class="myfont">
                              {{$data->End_Date_Contract}}
                            </td>
                            <td>
                                <span class="fa  fa-codepen btn btn-default fa-lg"></span>      کود پروژه
                            </td>
                            <td class="myfont">
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
                                <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>محل تسلیمی دهی اجناس
                            </td>
                            <td>
                                {{$data->Place_Item}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>مقدار تامینات
                            </td>
                            <td class="myfont">
                                {{$data->Amount}}
                            </td>
                            <td>
                                <span class="fa  fa-warning fa-lg btn btn-default"></span>میعاد ورنتی
                            </td>
                            <td class="myfont">
                                {{$data->Warrenty}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-default"></span>از تاریخ تسلیمی اجناس
                            </td>
                            <td class="myfont">
                                {{$data->Date_From_Item}}
                            </td>
                            <td>
                                <span class="fa  fa-reorder fa-lg btn btn-info"></span>الی تاریخ تسلیمی اجناس
                            </td>
                            <td class="myfont">
                                {{$data->Date_To_Item}}
                            </td>
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
                            <td colspan="4">
                                <span class="btn btn-info btn-block"></span>
                            </td>
                        </tr>
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
                            <td class="myfont">
                                @isset($data->contractcompany->Phone) {{$data->contractcompany->Phone}} @endisset

                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-envelope-open fa-lg btn btn-primary"></span>       ادرس ایمل
                            </td>
                            <td class="myfont">
                                @isset($data->contractcompany->Email) {{$data->contractcompany->Email}} @endisset

                            </td>
                            <td>
                                <span class="fa  fa-location-arrow fa-lg btn btn-default"></span>جواز شرکت
                            </td>
                            <td class="myfont">
                                @isset($data->contractcompany->Jawaz) {{$data->contractcompany->Jawaz}} @endisset

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>     تاریخ اغاز جواز
                            </td>
                            <td class="myfont">
                                @isset($data->contractcompany->Date_From_Jawaz) {{$data->contractcompany->Date_From_Jawaz}} @endisset

                            </td>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-default"></span>تاریخ ختم جواز
                            </td>
                            <td class="myfont">
                                @isset($data->contractcompany->Date_To_Jawaz) {{$data->contractcompany->Date_To_Jawaz}} @endisset

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-tint fa-lg btn btn-primary"></span>
                                تین این نمبر
                            </td>
                            <td class="myfont">
                                @isset($data->contractcompany->Tin) {{$data->contractcompany->Tin}} @endisset

                            </td>
                            <td>
                                <span class="fa  fa-legal fa-lg btn btn-default"></span>
                                ثپت جواز نمبر
                            </td>
                            <td class="myfont">
                                @isset($data->contractcompany->Jawaz) {{$data->contractcompany->Jawaz}} @endisset

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
                            <tr class="myfont">
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

        $(document).ready(function () {

            $("#btnprint").on('click',function () {

                window.print();



            })


        })

</script>





    @endsection
