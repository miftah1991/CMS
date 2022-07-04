@extends('layouts.master')

@section('content')

    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">شرکت برنده</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body  ">

                    <table class="table table-responsive ">

                        <tr>
                            <td colspan="4"><span class="fa fa-home fa-lg btn btn-warning"></span>اسم قرارداد   </td>
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
                                <span class="fa  fa-calendar fa-lg btn btn-info"></span>
                                         تاریخ اعطایی قرارداد


                            </td>
                            <td>
                               {{$data->Contract_Date}}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>        تاریخ نامه قبولی افر
                            </td>
                            <td>
                              {{$data->Offer_Date}}
                            </td>
                            <td>
                                <span class="fa  fa-sort-numeric-desc btn btn-default fa-lg"></span>       کود پروژه
                            </td>
                            <td>
                                {{$data->registerprocurement->Pro_Code}}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>   نوع پرژوه
                            </td>
                            <td>
                                {{$data->registerprocurement->procurementtype->ProName}}
                            </td>
                            <td>
                                <span class="fa  fa-money fa-lg btn btn-default"></span>بودجه منظور شده
                            </td>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <span class="btn btn-primary btn-block btn-xs"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-pinterest"></span>   تاریخ اعطایی قرارداد
                            </td>
                            <td>
                                {{$data->Contract_Date}}
                            </td>
                            <td>
                                <span class="fa   fa-calendar btn btn-pinterest"></span>    تاریخ نامه قبولی افر
                            </td>
                            <td>
                                {{$data->Offer_Date}}
                            </td>
                        </tr>



                        <tr>

                            <td>
                                <span class="fa  fa-money btn btn-primary"></span>واحد پولی
                            </td>
                            <td>
                                {{$data->rupee}}
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
                                <span class="fa  fa-file btn btn-pinterest"></span>  اطلاعیه قرارداد
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Award')}}/{{$data->Contract_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                            <td>
                                <span class="fa   fa-file btn btn-pinterest"></span>  منظوری کمیسون تدارکات ملی
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Award')}}/{{$data->Camison_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-file fa-lg btn btn-primary"></span>      نامه قبولی افر
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Award')}}/{{$data->Offer_File}}" ><span class="fa fa-download "></span></a>
                            </td>

                        </tr>



                    </table>
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">مسول شرکت و خصوصیات شرکت</h3>
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
                                <span class="fa  fa-user fa-lg btn btn-pinterest"></span>  اسم شرکت
                            </td>
                            <td>
                                @isset($company->Name) {{$company->Name}} @endisset
                            </td>
                            <td>
                                <span class="fa  fa-phone fa-lg btn btn-pinterest"></span>      شماره تماس
                            </td>
                            <td>
                                @isset($company->Phone) {{$company->Phone}} @endisset
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-envelope-open fa-lg btn btn-primary"></span>       ادرس ایمل
                            </td>
                            <td>
                                @isset($company->Email) {{$company->Email}} @endisset

                            </td>
                            <td>
                                <span class="fa  fa-sort-numeric-desc fa-lg btn btn-default"></span>جواز شرکت
                            </td>
                            <td>
                                @isset($company->Jawaz) {{$company->Jawaz}} @endisset

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




    <script>



</script>





    @endsection
