@extends('layouts.master')
@section('content')



    <br>
    <div class="col-lg-12 ">

        <div class="panel panel-danger ">
            <div class="panel-heading">
                <div class="panel-title text-center"></div>

            </div>

                <div class="panel-body">
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"> د افغانستان برشنا شرکت</span>
                                    <span class="info-box-number" id="countvalue">{{$dabs}}</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                    <span class="progress-description">
                   مجموعه تعداد قرارداد برشنا شرکت
                  </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="info-box bg-purple">
                                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">بانک جهانی</span>
                                    <span class="info-box-number" >{{$nabank}}</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                    <span class="progress-description">
                   مجموعه تعداد قرارداد بانک جهانی
                  </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">بانک اسیایی</span>
                                    <span class="info-box-number">{{$asiabank}}</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                    <span class="progress-description">
                   مجموعه تعداد قرارداد بانک اسیاسی
                  </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">تدارکاتی ملی</span>
                                    <span class="info-box-number">{{$asiabank}}</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                    <span class="progress-description">
                   مجموعه تعداد قرارداد بانک اسیاسی
                  </span>
                                </div>
                                <!-- /.info-box-content -->
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
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text" >د افغانستان برشنا شرکت</span>
                <span class="info-box-number" id="dabstotal"></span>

                <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                    مجموعه تعداد تطمویل کننده
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <div class="col-lg-3">
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">بانک جهانی</span>
                <span class="info-box-number" id="nasbank"></span>

                <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                  مجموعه تعداد بانکی نړیوال
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <div class="col-lg-3">
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">بانک اسیاسی</span>
                <span class="info-box-number" id="asiabank"></span>

                <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                    مجموعه تعداد بانک اسیاسی
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <div class="col-lg-3">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">

               تدراکاتی ملی

                </span>
                <span class="info-box-number" id="asiabank"></span>

                <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                   مجموعه تعد تدراکاتی ملی
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

</div>

                    <div class="row">

                        <div class="col-lg-12" style="overflow-y:scroll;height:290px;" >


                            <table class="table table-bordered" >
                                <thead>
                                <tr class="text-center bg-aqua">
                                    <td>شماره</td>
                                    <td>کود پروژه</td>
                                    <td>اسم پروژه </td>
                                    <td>تطمویل کننده</td>


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
       url:'Find_Year_Report',
        method:'get',
        data:{data:val},
        success:function (res) {
           if(res.length>0)
           {
               var number=0;
               for(var i=0;i<res.length;i++)
               {
                 tr+='<tr class="text-center  myfont"><td>'+(++number)+'</td><td>'+res[i].Pro_Code+'</td><td>'+res[i].Project_Name+'</td><td>'+res[i].FouName+'</td></tr>' ;
               }
               $("#rptyear").append(tr);
           }

        }



    });
$("#total").empty();
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



    });

$("#dabstotal").empty();
$("#asiabank").empty();
$("#nasbank").empty();

    $.ajax({
        url:'Find_Year_Total_Founder',
        method:'get',
        data:{data:val},
        success:function (res) {

            for(var i=0;i<res.length;i++)
            {
              if(res[i].id==1)
              {

                  $("#dabstotal").append(res[i].total);
              }
                if(res[i].id==2)
                {

                    $("#nasbank").append(res[i].total);
                }
                if(res[i].id==3)
                {

                    $("#asiabank").append(res[i].total);
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