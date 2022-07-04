@extends('layouts.master')

@section('content')

    <section class="content">
        <!-- Small boxes (Stat box) -->


       <div class="row">

           <div class="col-lg-12">


               <div class="panel panel-info active">

                   <div class="panel panel-heading">

                   </div>
                   <div class="panel-body">


                           <section class="col-lg-4 col-md-4">
                               <div class="box box-info">

                                   <div class="box-body myfont">

                                       <span id="offer_date"> تاریخ افرکشایی <span class="label label-warning pull-left">{{$offer_date->count()}}</span></span>




                                   </div>
                               </div>

                           </section>


                       <section class="col-lg-4 col-md-4">
                           <div class="box box-success">

                               <div class="box-body">




                                   <span id="met_date" >d تاریخ قبل از داوطلبی <span class="label label-warning pull-left">{{$met_date->count()}}</span></span>



                               </div>
                           </div>

                       </section>
                       <section class="col-lg-4 col-md-4">
                           <div class="box box-info">

                               <div class="box-body">



                                   <span id="eval_date" > ایمل هیت ارزیابی <span class="label label-warning pull-left">{{$eval_date->count()}}</span></span>






                               </div>
                           </div>

                       </section>






                   </div>

               </div>


           </div>



       </div>


        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>

                        <!-- tools box -->
                        <div class="pull-left box-tools">
                            <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">


                        <div class="row">
                            <div class="col-lg-12">


                                <table class="table table-bordered table-hover text-center" id="tbleanouce">


                                </table>







                            </div>

                        </div>





                    </div>
                </div>

            </section>
        </div>

        <!-- Main row -->
    </section>

    <style type="text/css">
        .divmsg {
            background: green;
            color: #fff;
            display: inline-block;
            margin: 1px;
            padding: 10px;
            border-radius:5px;
        }

        .divred {
            background: red !important;
        }

        #btntoggle, #btnstoptoggle {
            margin: 10px 20px;
            padding:10px;
        }
    </style>


    <script>
        $(document).ready(function () {

            var blink = null;

                if (blink == null)
                {
                    blink = setInterval(blinkMessage, 500);
                }
            function blinkMessage() {
                $(".divmsg").toggleClass("divred");
            }

            $("#Pro_Fid").select2({

                allowClear: true
            });


            setTimeout(function(){$('.overlay').hide();}, 2000);


            $("#offer_date").on('click',function () {

                $("#tbleanouce").empty();
               var div='';
                var tblrcd='<thead class="text-center">\n' +
                    '                                    <tr >\n' +
                    '                                        <th>sشماره</th>' +
                    '                                        <th>کود پروژه</th>' +
                    '                                        <th>تاریخ افرکشایی</th>' +
                    '                                        <th>وقت باقی</th>' +
                    '                                     <th></th>' +

                    '                                    </thead><tbody >';



              $.ajax({

                  url:'{{url('Find_Offer_Date_Email')}}',
                  method:'get',
                  success:function(res) {
                      console.log(res);
                      for (i=0;i<res.length;i++)
                      {

                          if(res[i].day==2)
                          {
                              div='<div class="divmsg"> </div>'
                          }
                          else
                          {
                              div='';
                          }

tblrcd +=
    '                                                      <tr  class="myfont">' +
    '                                                            <td>'+i+'</td>' +
    '                                                            <td>'+res[i].Pro_Code+'</td>' +
    '                                                            <td>'+res[i].Offer_Date+'</td>' +
    '                                                            <td class="text-red">'+res[i].day+'</td>' +
    '                                                         <td>  ' +div +'</td>' +
    '                                                       </tr>'

                      }

                      tblrcd+='<tbody >';
                      $("#tbleanouce").append(tblrcd);

                  }

              })

            })

//Met date  list email
            $("#met_date").on('click',function () {
                $("#tbleanouce").empty();

                var tblrcd='<thead class="text-center">\n' +
                    '                                    <tr >\n' +
                    '                                        <th>شماره</th>' +
                    '                                        <th>کود پروژه</th>' +
                    '                                        <th>تاریخ قبل از داوطلبی</th>' +
                    '                                        <th>وقت باقی</th>' +
                    '                                     <th></th>' +

                    '                                    </thead><tbody >';



                $.ajax({

                    url:'{{url('Find_Met_Date_Email')}}',
                    method:'get',
                    success:function(res) {
                        console.log(res);
                        for (i=0;i<res.length;i++)
                        {

                            tblrcd +=
                                '                                                      <tr  class="myfont">' +
                                '                                                            <td>'+i+'</td>' +
                                '                                                            <td>'+res[i].Pro_Code+'</td>' +
                                '                                                            <td>'+res[i].Met_Date+'</td>' +
                                '                                                            <td class="text-red">'+res[i].day+'</td>' +
                                '                                                         <td>             ' +
                                '                                                <div class="divmsg">' +

                                '                                                </div> </td>' +
                                '                                                       </tr>'

                        }

                        tblrcd+='<tbody >';
                        $("#tbleanouce").append(tblrcd);

                    }

                })

            })

// eval date eval_date
            $("#eval_date").on('click',function () {
                $("#tbleanouce").empty();

                var tblrcd='<thead class="text-center">\n' +
                    '                                    <tr >\n' +
                    '                                        <th>شماره</th>' +
                    '                                        <th>کود پروژه</th>' +
                    '                                        <th>تاریخ اغاز ارزیابی</th>' +
                    '                                        <th>وقت باقی</th>' +
                    '                                     <th></th>' +

                    '                                    </thead><tbody >';



                $.ajax({

                    url:'{{url('Find_Eval_Date_Email')}}',
                    method:'get',
                    success:function(res) {
                        console.log(res);
                        for (i=0;i<res.length;i++)
                        {

                            tblrcd +=
                                '                                                      <tr  class="myfont">' +
                                '                                                            <td>'+i+'</td>' +
                                '                                                            <td>'+res[i].Pro_Code+'</td>' +
                                '                                                            <td>'+res[i].Start_Date+'</td>' +
                                '                                                            <td class="text-red">'+res[i].day+'</td>' +
                                '                                                         <td>             ' +
                                '                                                <div class="divmsg">' +

                                '                                                </div> </td>' +
                                '                                                       </tr>'

                        }

                        tblrcd+='<tbody >';
                        $("#tbleanouce").append(tblrcd);

                    }

                })

            })
        })


    </script>
@endsection
