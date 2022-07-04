@extends('layouts.master')

@section('content')

    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">تعدیلات</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" id="btnprint"><i class="fa fa-print"></i>
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
                                <span class="fa  fa-calendar btn btn-info"></span>    تاریخ اغاز قرارداد
                            </td>
                            <td>
                               {{$data->registerprocurement->contract->Start_Date_Contract}}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>      تاریخ ختم قرارداد
                            </td>
                            <td>
                              {{$data->registerprocurement->contract->End_Date_Contract}}

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
                                <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>محل تسلیمی دهی اجناس
                            </td>
                            <td>
                                {{$data->registerprocurement->contract->Place_Item}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-money fa-lg btn btn-default"></span>مقدار تامینات
                            </td>
                            <td>
                                {{$data->registerprocurement->contract->Amount}}
                            </td>
                            <td>
                                <span class="fa  fa-warning fa-lg btn btn-default"></span>میعاد ورنتی
                            </td>
                            <td>
                                {{$data->registerprocurement->contract->Warrenty}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-default"></span>    از تاریخ تسلیمی اجناس
                            </td>
                            <td>
                                {{$data->registerprocurement->contract->Date_From_Item}}
                            </td>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-info"></span>الی تاریخ تسلیمی اجناس
                            </td>
                            <td>
                                {{$data->registerprocurement->contract->Date_To_Item}}
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
                                <span class="fa  fa-university fa-lg btn btn-info"></span>  اسم شرکت
                            </td>
                            <td>
                               @isset($data->registerprocurement->contract->contractcompany->Name) {{$data->registerprocurement->contract->contractcompany->Name}} @endisset
                            </td>
                            <td>
                                <span class="fa  fa-phone fa-lg btn btn-pinterest"></span>      شماره تماس
                            </td>
                            <td>
                                @isset($data->registerprocurement->contract->contractcompany->Phone) {{$data->registerprocurement->contract->contractcompany->Phone}} @endisset

                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-envelope-open fa-lg btn btn-primary"></span>       ادرس ایمل
                            </td>
                            <td>
                                @isset($data->registerprocurement->contract->contractcompany->Email) {{$data->registerprocurement->contract->contractcompany->Email}} @endisset

                            </td>
                            <td>
                                <span class="fa  fa-file btn btn-default"></span> جواز شرکت
                            </td>
                            <td>
                                @isset($data->registerprocurement->contract->contractcompany->Jawaz) {{$data->registerprocurement->contract->contractcompany->Jawaz}} @endisset

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>     تاریخ اغاز جواز
                            </td>
                            <td>
                                @isset($data->registerprocurement->contract->contractcompany->Date_From_Jawaz) {{$data->registerprocurement->contract->contractcompany->Date_From_Jawaz}} @endisset

                            </td>
                            <td>
                                <span class="fa  fa-calendar  btn btn-default"></span>تاریخ ختم جواز
                            </td>
                            <td>
                                @isset($data->registerprocurement->contract->contractcompany->Date_To_Jawaz) {{$data->registerprocurement->contract->contractcompany->Date_To_Jawaz}} @endisset

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-tint fa-lg btn btn-primary"></span>
                                تین این نمبر
                            </td>
                            <td>
                                @isset($data->registerprocurement->contract->contractcompany->Tin) {{$data->registerprocurement->contract->contractcompany->Tin}} @endisset

                            </td>
                            <td>
                                <span class="fa  fa-legal fa-lg btn btn-default"></span>
                                ثپت جواز نمبر
                            </td>
                            <td>
                                @isset($data->registerprocurement->contract->contractcompany->Jawaz) {{$data->registerprocurement->contract->contractcompany->Jawaz}} @endisset

                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">بخش تعدیلات</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">

                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive ">

                        <tr>
                            <td>
                                <span class="fa  fa-reorder fa-lg btn btn-primary"></span>  تعدیلات درخواست
                            </td>
                            <td>
                                {{$data->Extand_Name}}
                            </td>
                            <td>
                                <span class="fa   fa-calendar btn btn-info"></span>ثپت تاریخ
                            </td>
                            <td>
                                {{$data->Save_Date}}
                            </td>
                        </tr>




                    </table>
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">بخش تعدیلات</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">

                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive ">

                        <tr>

                            <td>
                               ملاحظات
                            </td>
                        </tr>
                            <tr>
                            <td>
                                {{$data->Details}}
                            </td>
                        </tr>




                    </table>
                </div>
            </div>
       @if(count($datatime))
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">تعدیلات دربخش تاریخ</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">

                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive ">

                        <tr>
                            <td>روز تعدیل</td>
                            <td>تاریخ ختم در قرارداد</td>
                            <td>تاریخ تعدیل قرارداد</td>
                            <td>نوع تعدیل</td>
                        </tr>
                        @foreach($datatime as $key=>$rcd)
                            <tr class="myfont">

                                <td>{{$rcd->Day}}</td>
                                <td>{{$rcd->Cont_End_Date}}</td>
                                <td>{{$rcd->Extand_Date}}</td>
                                <td>@if($rcd->Req_Fid==2)    حذف کردن @else اضافه کردن @endif</td>
                            </tr>

                        @endforeach

                    </table>
                </div>
            </div>

           @endif
            @if(count($datamonay))
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">تعدیلات دربخش پولی قرارداد</h3>
                        <!-- tools box -->
                        <div class="pull-left box-tools">

                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <table class="table table-responsive ">

                            <tr>
                                <td>مقدار پول تعدیل</td>
                                <td>مقدار قرارداد</td>
                                <td>مقدار اخری تعدیلات</td>
                                <td>نوع تعدیل</td>
                            </tr>
                            @foreach($datamonay as $key=>$rcd)
                                <tr class="myfont">

                                    <td>{{$rcd->Amount}}</td>
                                    <td>{{$rcd->Cont_Amount}}</td>
                                    <td>{{$rcd->Net_Amount}}</td>
                                    <td>@if($rcd->Req_Fid==2)    حذف کردن @else اضافه کردن @endif</td>
                                </tr>

                            @endforeach

                        </table>
                    </div>
                </div>

            @endif
            @if(count($dataitem))
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">تعدیلات دربخش جنس</h3>
                        <!-- tools box -->
                        <div class="pull-left box-tools">

                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <table class="table table-responsive ">

                            <tr>
                                <td>جنس</td>
                                <td>تفصیل جنس</td>

                                <td>نوع تعدیل</td>
                            </tr>
                            @foreach($dataitem as $key=>$rcd)
                                <tr class="myfont">

                                    <td>{{$rcd->item}}</td>
                                    <td>{{$rcd->quntity}}</td>
                                    <td>@if($rcd->Req_Fid==2)    حذف کردن @else اضافه کردن @endif</td>
                                </tr>

                            @endforeach

                        </table>
                    </div>
                </div>

            @endif
            @if(count($dataextra))
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">تعدیلات دربخش نوع دیګر</h3>
                        <!-- tools box -->
                        <div class="pull-left box-tools">

                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <table class="table table-responsive ">

                            <tr>
                                <td>موضوع نوع دیګر تعدیلات</td>
                                     <td>تفصیل نوع دیګر تعدیلات</td>


                                <td>نوع تعدیل</td>
                            </tr>
                            @foreach($dataextra as $key=>$rcd)
                                <tr class="myfont">

                                    <td>{{$rcd->item_extra}}</td>
                                    <td>{{$rcd->details_extra}}</td>
                                    <td>@if($rcd->Req_Fid==2)    حذف کردن @else اضافه کردن @endif</td>
                                </tr>

                            @endforeach

                        </table>
                    </div>
                </div>

            @endif
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
