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

                        <div class="col-lg-3">
                            <div class="box box-danger box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">قرارداد اجناس</h3>
                                </div>
                                <div class="box-body">
                                   مجموعه
                                    <span class="badge bg-danger">{{$totaliteme}}</span>
                                </div>
                                <!-- /.box-body -->
                                <!-- Loading (remove the following to stop the loading)-->
                                <div class="overlay">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </div>
                                <!-- end loading -->
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="box box-success box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">قرارداد ساختمانی</h3>
                                </div>
                                <div class="box-body">
                                    مجموعه
                                    <span class="badge bg-danger">{{$totalbulding}}</span>
                                </div>
                                <!-- /.box-body -->
                                <!-- Loading (remove the following to stop the loading)-->
                                <div class="overlay">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </div>
                                <!-- end loading -->
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="box box-primary box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">قرارداد مشورتی وغیرمشورتی</h3>
                                </div>
                                <div class="box-body">
                                    مجموعه
                                    <span class="badge bg-primary">{{$totalmetting}}</span>
                                </div>
                                <!-- /.box-body -->
                                <!-- Loading (remove the following to stop the loading)-->
                                <div class="overlay">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </div>
                                <!-- end loading -->
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="box box-warning box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">
                                       تدراکاتی ملی افغانستان

                                    </h3>
                                </div>
                                <div class="box-body">
                                    مجموعه
                                    <span class="badge bg-primary">{{$totalmetting}}</span>
                                </div>
                                <!-- /.box-body -->
                                <!-- Loading (remove the following to stop the loading)-->
                                <div class="overlay">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </div>
                                <!-- end loading -->
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
                        <div class="col-lg-2 progress-xs">
                            <br>
                            <div class="progress progress-bar progress-bar-green" style="width: 70%;"></div>
                            <span id="total"></span>

                        </div>
                    </div>
                    <br>
                    <div class="btn btn-primary btn-block"></div>
                    <br>
<div class="row">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-3">


    </div>
    <div class="col-lg-3">

    </div>
    <div class="col-lg-3">

    </div>
</div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="info-box" style="margin-top: 4px;">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">مجموعه اجناس قراردادی</span>
                                    <span class="info-box-number" > <span class="badge bg-aqua"  id="totalitem"></span></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-lg-3">

                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-hospital-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">مجموعه قرارداد ساختمانی</span>
                                    <span class="info-box-number"><span class="badge bg-green"  id="totalbiuding"></span></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">مجموعه قرارداد مشورتی وغیرمشورتی</span>
                                    <span class="info-box-number" > <span class="badge bg-yellow"  id="totalmetting"></span></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-red-active"><i class="fa fa-files-o"></i></span>

                                <div class="info-box-content">
                <span class="info-box-text">


                    تدارکاتی ملی

                    </span>
                                    <span class="info-box-number" > <span class="badge bg-yellow"  id="totalmetting"></span></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-lg-12" style="overflow-y:scroll;height:400px;" >


                            <table class="table table-bordered" >
                                <thead>
                                <tr class="text-center bg-aqua">
                                    <td>شماره</td>
                                    <td>کود پروژه</td>
                                    <td>اسم پروژه</td>


                                </tr>
                                </thead>
                                <tbody id="rptyear">









                                </tbody>
                            </table>


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

            $('#countvalue').each(function (_, self) {
                jQuery({
                    Counter: 0
                }).animate({
                    Counter: $(self).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function () {
                        $(self).text(Math.ceil(this.Counter));
                    }
                });
            });

$("#btnrpt").on('click',function () {
    var val=$("#Date").val();

    var tr='';
    $("#rptyear").empty();
    $.ajax({
       url:'Find_Project_Type_Year_Report_List_incomplete',
        method:'get',
        data:{data:val},
        success:function (res) {
           if(res.length>0)
           {
               var number=0;
               for(var i=0;i<res.length;i++)
               {
                 tr+='<tr class="text-center myfont"><td>'+(++number)+'</td><td>'+res[i].Pro_Code+'</td><td>'+res[i].Project_Name+'</td></tr>' ;
               }
               $("#rptyear").append(tr);
           }

        },
        error:function (res) {
           console.log(res);

        }



    });
/*$("#total").empty();
    $.ajax({
        url:'Find_Year_Total',
        method:'get',
        data:{data:val},
        success:function (res) {
        $("#total").append(res[0].total);



        },
        error:function (res) {
         console.log(res)  ;
        }



    });*/

$("#totalitem").empty();
$("#totalbiuding").empty();
$("#totalmetting").empty();

    $.ajax({
        url:'Find_Year_Total_Project_Type_incomplete',
        data:{data:val},
        success:function (res) {

            for(var i=0;i<res.length;i++)
            {
              if(res[i].id==1)
              {

                  $("#totalitem").append(res[i].total);
              }
                if(res[i].id==2)
                {

                    $("#totalbiuding").append(res[i].total);
                }
                if(res[i].id==3)
                {

                    $("#totalmetting").append(res[i].total);
                }
            }


        },
        error:function (res) {
            console.log(res)  ;
        }



    });

})




        })

    </script>









    @endsection