@extends('layouts.master')

@section('content')

    <div class="row" id="sectionprint">
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

                            <td colspan="4">{{$data->Project_Name}}</td>

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
                                @isset($data->founder->FouName){{$data->founder->FouName}}  @endif
                            </td>
                            <td>
                                شماره حکم
                            </td>
                            <td class="myfont">
                               {{$data->Order_Number}}
                            </td>
                        </tr>


                        <tr>
                            <td class="myfont">
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>       حکم تاریخ
                            </td>
                            <td class="myfont">
                              {{$data->Order_Date}}
                            </td>
                            <td>
                                <span class="fa  fa-dollar btn btn-default fa-lg"></span>        قیمت تخمنی
                            </td>
                            <td class="myfont">
                              {{$data->Rupee_Amount}}
                            </td>
                        </tr>

                        <tr>
                            <td class="myfont">
                                <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>نوع پرژوه
                            </td>
                            <td>
                                {{$data->procurementtype->ProName}}
                            </td>
                            <td>
                                <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>بودجه منظور شده
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
                    <h3 class="box-title">مسول  و موقعیت پروژه</h3>
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
                                <span class="fa  fa-umbrella fa-lg btn btn-pinterest"></span>   مسول پروژه
                            </td>
                            <td>
                                @isset($data->Project_Member){{$data->Project_Member}}  @endif
                            </td>
                            <td>
                                <span class="fa  fa-phone fa-lg btn btn-pinterest"></span>      شماره تماس
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

$(document).ready(function () {

    $("#btnprint").on('click',function () {

window.print();



    })


})

</script>





    @endsection
