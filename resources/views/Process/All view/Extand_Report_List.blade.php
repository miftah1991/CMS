@extends('layouts.master')

@section('content')

    <div class="row">
        <section class="col-lg-12 col-md-12">




            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">لست راپور هیت تعدیلات پروژه</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools text-center">


                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive " id="tbl_Extand_Report_List">

                        <tr>
                            <td>شماره مسسلسل</td>
                            <td>کود پروژه</td>
                            <td>تعدیلات درخواست</td>
                            <td>ثپت تاریخ</td>
                            <td>راپور تعدیل</td>
                            <td>ورقه تعدیل</td>
                            <td>حکم رد</td>
                            <td>حکم قبول</td>
                            <td>تغیر</td>
                            <td>چاپ</td>
                            <td>نمایش</td>

                        </tr>
                        @foreach($data as $key=>$rcd)

                            <tr class="myfont">
                                <td>{{++$key}}</td>
                                <td>{{$rcd->Pro_Code}}</td>
                                <td>{{$rcd->Extand_Name}}</td>
                                <td>{{$rcd->Save_Date}}</td>
                                <td>
                                    <a href="{{asset('storage/app/public/Extand_Report')}}/{{$rcd->Report_File}}" ><span class="fa fa-download"></span></a>

                                </td>
                               <td>
                                   <a href="{{asset('storage/app/public/Extand_Report')}}/{{$rcd->Extend_File}}" ><span class="fa fa-download"></span></a>
                               </td>

                                <td>
                                    <a href="{{asset('storage/app/public/Extand_Report')}}/{{$rcd->Reject_File}}" ><span class="fa fa-download"></span></a>

                                </td>
                                <td>
                                    <a href="{{asset('storage/app/public/Extand_Report')}}/{{$rcd->Accept_File}}" ><span class="fa fa-download"></span></a>

                                </td>
                            <td>
                                <a href="{{url('Edit_Extand_Report_Details')}}/{{$rcd->exid}}"><span class="fa fa-pencil btn btn-default"></span></a>
                            </td>

                                <Td>
                                    <a href="{{url('Print_Extand_Report_Details')}}/{{$rcd->exid}}"><span class="fa fa-print btn btn-info"></span></a>

                                </Td>
                                <Td>
                                    <a href="{{url('View_Extand_Report_Details')}}/{{$rcd->exid}}"><span class="fa fa-eye btn btn-primary"></span></a>

                                </Td>

                            </tr>

                        @endforeach

                    </table>
                </div>
            </div>


        </section>
    </div>




    <script>
$(document).ready(function () {
    $("#tbl_Extand_Report_List").dataTable();
})


    </script>





@endsection
