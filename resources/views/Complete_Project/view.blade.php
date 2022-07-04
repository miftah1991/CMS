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
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">

                    <table class="table table-responsive ">




                        <tr>
                            <td colspan="4"><span class="fa fa-home fa-lg btn btn-warning"></span>عنوان پروژه</td>
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
                                شماره حکم
                            </td>
                            <td class="myfont">
                               {{$data->registerprocurement->Order_Number}}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>       حکم تاریخ
                            </td>
                            <td>
                              {{$data->registerprocurement->Order_Date}}
                            </td>
                            <td>
                                <span class="fa  fa-rupee btn btn-default fa-lg"></span>        قیمت تخمنی
                            </td>
                            <td class="myfont">
                              {{$data->registerprocurement->Rupee_Amount}}
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
                                <span class="fa  fa-dollar fa-lg btn btn-default"></span>بودجه منظور شده
                            </td>
                            <td class="myfont">
                                {{$data->registerprocurement->Accepts_Fund}}
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">تکمیل قرارداد</h3>
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
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>  تاریخ تکمیل قرارداد
                            </td>
                            <td class="myfont">
                                @isset($data->Complate_Date){{$data->Complate_Date}}  @endif
                            </td>
                            <td>
                                <span class="fa  fa-phone fa-lg btn btn-pinterest"></span>    تصدیق پروژه
                            </td>
                            <td>

                                <a href="{{asset('storage/app/public/Complete')}}/{{$data->Confirm_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-envelope-open fa-lg btn btn-primary"></span>       تضمین
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Complete')}}/{{$data->Warrenty_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                            <td>
                                <span class="fa  fa-location-arrow fa-lg btn btn-default"></span>

                                تامینات
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Complete')}}/{{$data->Taminat_File}}" ><span class="fa fa-download"></span></a>
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
                            <td colspan="4">
                                <span class="btn btn-info btn-block"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-user fa-lg btn btn-info"></span>   مسول پروژه
                            </td>
                            <td>
                                @isset($data->registerprocurement->Project_Member){{$data->registerprocurement->Project_Member}}  @endif
                            </td>
                            <td>
                                <span class="fa  fa-phone fa-lg btn btn-primary"></span>      شماره تماس
                            </td>
                            <td class="myfont">
                                {{$data->registerprocurement->Member_Phone}}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-envelope-open fa-lg btn btn-primary"></span>       ادرس ایمل
                            </td>
                            <td class="myfont">
                                {{$data->registerprocurement->Member_Email}}
                            </td>
                            <td>
                                <span class="fa  fa-location-arrow fa-lg btn btn-default"></span>موقعیت پروژه
                            </td>
                            <td>
                                {{$data->registerprocurement->Location}}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-location-arrow fa-lg btn btn-default"></span>ولایت
                            </td>
                            <td>
                                {{$data->registerprocurement->district->province->name}}
                            </td>
                            <td>
                                <span class="fa  fa-location-arrow fa-lg btn btn-default"></span>والسوالی
                            </td>
                            <td>
                                {{$data->registerprocurement->district->name}}
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
                                {{$data->Remarks}}
                            </td>
                        </tr>






                    </table>
                </div>
            </div>

        </section>
    </div>




    <script>



</script>





    @endsection
