@extends('layouts.master')
@section('content')



    <br>
    <div class="col-lg-12 ">

        <div class="panel panel-primary ">
            <div class="panel-heading">
                <div class="panel-title text-center"></div>

            </div>

                <div class="panel-body">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="box box-danger box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">قرارداد ساختمانی</h3>

                                    <div class="box-tools pull-right">

                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="nav nav-stacked">

                                        <li><a href="#">افغانی  <span class="pull-left badge bg-blue">{{$totalbulding_af}}</span></a></li>
                                        <li><a href="#">دالر  <span class="pull-left badge bg-blue">{{$totalbulding_da}}</span></a></li>


                                    </ul>
                                </div>

                                <!-- /.box-body -->
                            </div>

                        </div>

                        <div class="col-lg-4">
                            <div class="box box-success box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">قرارداد اجناس</h3>
                                </div>
                                <div class="box-body">
                                    <ul class="nav nav-stacked">
                                        <li><a href="#">افغانی  <span class="pull-left badge bg-blue">{{$totaliteme_af}}</span></a></li>
                                        <li><a href="#">دالر  <span class="pull-left badge bg-blue">{{$totaliteme_da}}</span></a></li>



                                    </ul>
                                </div>
                                <!-- end loading -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="box box-primary box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">قرارداد مشورتی وغیرمشورتی</h3>
                                </div>
                                <div class="box-body">
                                    <ul class="nav nav-stacked">
                                        <li><a href="#">افغانی  <span class="pull-left badge bg-blue">{{$totalmetting_af}}</span></a></li>
                                        <li><a href="#">دالر  <span class="pull-left badge bg-blue">{{$totalmetting_da}}</span></a></li>


                                    </ul>
                                </div>
                                <!-- end loading -->
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="btn btn-success btn-block"></div>
                        <Br>
                        <div class="col-lg-3">
                            <div class="box box-success box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">د افغانستان برشنا شرکت</h3>

                                    <div class="box-tools pull-right">

                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="nav nav-stacked">
                                        <li><a href="#">افغانی  <span class="pull-left badge bg-blue">{{$dabs_af}}</span></a></li>
                                        <li><a href="#">دالر  <span class="pull-left badge bg-blue">{{$dabs_da}}</span></a></li>

                                    </ul>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="box box-primary box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        بانک جهانی</h3>

                                    <div class="box-tools pull-right">

                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="nav nav-stacked">
                                        <li><a href="#">افغانی  <span class="pull-left badge bg-blue">{{$nbank_af}}</span></a></li>
                                        <li><a href="#">دالر  <span class="pull-left badge bg-blue">{{$nbank_da}}</span></a></li>


                                    </ul>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="box box-danger box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        بانک اسیایی</h3>

                                    <div class="box-tools pull-right">

                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="nav nav-stacked">

                                        <li><a href="#">افغانی  <span class="pull-left badge bg-blue">{{$asiabank_af}}</span></a></li>
                                        <li><a href="#">دالر  <span class="pull-left badge bg-blue">{{$asiabank_da}}</span></a></li>

                                    </ul>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="box  box-warning box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        تدارکاتی ملی</h3>

                                    <div class="box-tools pull-right">

                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="nav nav-stacked">

                                        <li><a href="#">افغانی  <span class="pull-left badge bg-blue">{{$asiabank_af}}</span></a></li>
                                        <li><a href="#">دالر  <span class="pull-left badge bg-blue">{{$asiabank_da}}</span></a></li>

                                    </ul>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="btn btn-warning btn-block"></div>
                        <br>
                        <div class="col-lg-2">
                          تاریخ
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="Date" id="Date" autocomplete="off" class="form-control" id="Date" required>
                        </div>
                        <div class="col-lg-2">

                            <input type="button" name="btn" id="btnrpt" value="چستجو راپور" class="btn btn-primary">

                        </div>

                    </div>
                    <br>
                    <div class="btn btn-primary btn-block"></div>
                    <br>


                    <div class="row">

                        <div class="col-lg-6" style="background-color:wheat;margin-top: 4px;">
                            <div class="info-box" style="margin-top: 4px;">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-hospital-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">د افغانستان برشنا شرکت</span>

                                    <div class="col-md-6 text-center"><span class="info-box-text" >  دالر   </span><span class="badge bg-aqua"  id="Total_Dabs_DA"></span>
                                    </div>
                                    <div class="col-md-6 text-center "><span class="info-box-text" >  افغانی   </span><span class="badge bg-aqua"  id="Total_Dabs_AF"></span>
                                    </div>

                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">بانک جهانی</span>
                                    <div class="col-md-6 text-center"><span class="info-box-text" >  دالر   </span><span class="badge bg-green"  id="Total_Nbank_DA"></span>
                                    </div>
                                    <div class="col-md-6 text-center "><span class="info-box-text" >  افغانی   </span><span class="badge bg-green"  id="Total_Nbank_AF"></span>
                                    </div>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-bank"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">بانک اسیایی</span>
                                    <div class="col-md-6 text-center"><span class="info-box-text" >  دالر   </span><span class="badge bg-red"  id="Total_Abank_DA"></span>
                                    </div>
                                    <div class="col-md-6 text-center "><span class="info-box-text" >  افغانی   </span><span class="badge bg-red"  id="Total_Abank_AF"></span>
                                    </div>
                                </div>
                                <!-- /.info-box-content -->
                            </div>

                        </div>

                        <div class="col-lg-6" style="background-color:wheat;margin-top: 4px;">
                            <div class="info-box" style="margin-top: 4px;">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">مجموعه اجناس قراردادی</span>
                                    <div class="col-md-6 text-center"><span class="info-box-text" >  دالر   </span><span class="badge bg-red"  id="Total_Item_DA"></span>
                                    </div>
                                    <div class="col-md-6 text-center "><span class="info-box-text" >  افغانی   </span><span class="badge bg-red"  id="Total_Item_AF"></span>
                                    </div>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-hospital-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">مجموعه قرارداد ساختمانی</span>
                                    <div class="col-md-6 text-center"><span class="info-box-text" >  دالر   </span><span class="badge bg-red"  id="Total_Bulding_DA"></span>
                                    </div>
                                    <div class="col-md-6 text-center "><span class="info-box-text" >  افغانی   </span><span class="badge bg-red"  id="Total_Bulding_AF"></span>
                                    </div>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">مجموعه قرارداد مشورتی وغیرمشورتی</span>
                                    <div class="col-md-6 text-center"><span class="info-box-text" >  دالر   </span><span class="badge bg-red"  id="Total_Meeting_DA"></span>
                                    </div>
                                    <div class="col-md-6 text-center "><span class="info-box-text" >  افغانی   </span><span class="badge bg-red"  id="Total_Meeting_AF"></span>
                                    </div>
                                </div>
                                <!-- /.info-box-content -->
                            </div>

                        </div>


                    </div>









                </div>





                <div class="panel-footer">




                </div>
            </form>
        </div>

    </div>
    <link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

    <script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>

    <script>

$(document).ready(function () {



$("#btnrpt").on('click',function () {
    var val=$("#Date").val();





    $.ajax({
        url:'Find_Year_Total_Found_Founder',
        method:'get',
        data:{data:val},
        success:function (res) {


            for(var i=0;i<res.length;i++)
            {

              if(res[i].id==1 && res[i].rupee=="da")
              {

                  $("#Total_Dabs_DA").append(res[i].total);
              }
                if(res[i].id==1 && res[i].rupee=="af")
                {

                    $("#Total_Dabs_AF").append(res[i].total);
                }

                if(res[i].id==2 && res[i].rupee=="da")
                {

                    $("#Total_Nbank_DA").append(res[i].total);
                }
                if(res[i].id==2 && res[i].rupee=="af")
                {

                    $("#Total_Nbank_AF").append(res[i].total);
                }
                if(res[i].id==3 && res[i].rupee=="da")
                {

                    $("#Total_Abank_DA").append(res[i].total);
                }
                if(res[i].id==3 && res[i].rupee=="af")
                {

                    $("#Total_Abank_AF").append(res[i].total);
                }

            }


        },
        error:function (res) {
            console.log(res)  ;
        }



    });


    //Projectype Projec Report
    $.ajax({
        url:'Find_Year_Total_Found_ProjecType',
        method:'get',
        data:{data:val},
        success:function (res) {

console.log(res);
            for(var i=0;i<res.length;i++)
            {

                if(res[i].id==1 && res[i].rupee=="da")
                {

                    $("#Total_Item_DA").append(res[i].total);
                }
                if(res[i].id==1 && res[i].rupee=="af")
                {

                    $("#Total_Item_AF").append(res[i].total);
                }

                if(res[i].id==2 && res[i].rupee=="da")
                {

                    $("#Total_Bulding_DA").append(res[i].total);
                }
                if(res[i].id==2 && res[i].rupee=="af")
                {

                    $("#Total_Bulding_AF").append(res[i].total);
                }
                if(res[i].id==3 && res[i].rupee=="da")
                {

                    $("#Total_Meeting_DA").append(res[i].total);
                }
                if(res[i].id==3 && res[i].rupee=="af")
                {

                    $("#Total_Meeting_AF").append(res[i].total);
                }

            }


        },
        error:function (res) {
            console.log(res)  ;
        }



    });

});

});



    </script>









    @endsection