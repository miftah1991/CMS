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

                                   <div class="box-body ">

                                       <span id="offer_date">







                                               اطلاع ایمل تاریخ افرکشایی <span class="fa fa-volume-up text-red"></span>

                                                                                  <i class="fa  fa-2x fa-bell badge-wrapper pull-left ">
                                                                                        @if($offer_date->count()>0)
  <span class='badge badge-secondary'>{{$offer_date->count()}}</span>
                                                                                            @endif
</i>

                                          </span>




                                   </div>
                               </div>

                           </section>


                       <section class="col-lg-4 col-md-4">
                           <div class="box box-success">

                               <div class="box-body">




                                   <span id="met_date" >


                                        اطلاع ایمل تاریخ قبل از داوطلبی <span class="fa fa-volume-up text-info"></span>

                                       <i class="fa fa-2x fa-bell badge-wrapper pull-left ">
                                           @if($met_date->count()>0)
  <span class='badge badge-secondary'>{{$met_date->count()}}</span>
                                               @endif
</i>



                                   </span>



                               </div>
                           </div>

                       </section>
                       <section class="col-lg-4 col-md-4">
                           <div class="box box-info">

                               <div class="box-body">



                                   <span id="eval_date" >



                                      اطلاع ایمل هیت ارزیابی <span class="fa fa-volume-up text-red"></span>


<i class="fa fa-2x fa-bell badge-wrapper pull-left ">
    @if($eval_date->count()>0)
    <span class='badge badge-secondary'>{{$eval_date->count()}}</span>
        @endif
</i>




                             </span>






                               </div>
                           </div>

                       </section>

                       <div class="row">
                           <div class="col-lg-12 btn btn-warning btn-block"></div>


                       </div>
                       <br>
                       <section class="col-lg-4 col-md-4">
                           <div class="box box-info">

                               <div class="box-body ">

                                       <span id="Contract_date">







                                        اطلاع ایمل شروع قرارداد <span class="fa fa-volume-up text-red"></span>


                                                                                  <i class="fa  fa-2x fa-bell badge-wrapper pull-left ">

                                                               @if($Contract_date->count()>0)                          <span class='badge badge-secondary'>{{$Contract_date->count()}}</span>
                                                                                      @endif
</i>

                                          </span>




                               </div>
                           </div>

                       </section>

                       <section class="col-lg-4 col-md-4">
                           <div class="box box-info">

                               <div class="box-body ">

                                       <span id="Extand_date">







                                            اطلاع ایمل تاریخ  تعدیل قرارداد <span class="fa fa-volume-up text-red"></span>


                                                                                  <i class="fa  fa-2x fa-bell badge-wrapper pull-left ">

                                                               @if($Extand_date->count()>0)                          <span class='badge badge-secondary'>{{$Extand_date->count()}}</span>
                                                                                      @endif
</i>

                                          </span>




                               </div>
                           </div>

                       </section>
                       <section class="col-lg-4 col-md-4">
                           <div class="box box-info">

                               <div class="box-body ">

                                       <span id="eval_time_date">



<span class="text-info">                                            ایمل تعقیبی هیت ارزیابی
</span>





                                                                                  <i class="fa  fa-2x fa-bell badge-wrapper pull-left ">

                                                               @if($eval->count()>=1)                          <span class='badge badge-secondary'>{{$eval->count()}}</span>
                                                                                      @endif
</i>

                                          </span>




                               </div>
                           </div>

                       </section>
                       <div class="row">
                           <div class="col-lg-12 btn btn-info btn-block"></div>

                       </div>
                       <br>
                       <div class="row">

                           <section class="col-lg-4 col-md-4">
                               <div class="box box-info">

                                   <div class="box-body ">

                                       <span id="Contract">





<span class="text-info">                                      ایمل تعقیبی قرارداد
</span>



                                                                                  <i class="fa  fa-2x fa-bell badge-wrapper pull-left ">

                                                               @if($cont->count()>0)
                                                                                          <span class='badge badge-secondary'>{{$cont->count()}}</span>
                                                                                      @endif
</i>

                                          </span>




                                   </div>
                               </div>

                           </section>

                           <section class="col-lg-4 col-md-4">
                               <div class="box box-info">

                                   <div class="box-body ">

                                       <span id="Extand" >







                                   <span class="text-info">
                                       ایمل تعقیبی تعدیلات قرارداد </span>


                                                                                  <i class="fa  fa-2x fa-bell badge-wrapper pull-left ">

                                                               @if($ext->count()>0)                          <span class='badge badge-secondary'>{{$ext->count()}}</span>
                                                                                      @endif
</i>

                                          </span>




                                   </div>
                               </div>

                           </section>
                           <section class="col-lg-4 col-md-4">
                               <div class="box box-info">

                                   <div class="box-body ">
                                       <span id="Item_Date" >
                                   <span class="text-info">
                                       ایمل تعقیبی قرارداد اجناس </span>

                                                                                  <i class="fa  fa-2x fa-bell badge-wrapper pull-left ">

                                                               @if($item->count()>0)                          <span class='badge badge-secondary'>{{$item->count()}}</span>
                                                                                      @endif
</i>

                                          </span>




                                   </div>
                               </div>

                           </section>

                       </div>
                       <div class="row">
                           <section class="col-lg-4 col-md-4">
                               <div class="box box-info">

                                   <div class="box-body ">
                                       <span id="Tazmin" >
                                   <span class="text-info">
                                       ایمل تعقیبی تضمین قرارداد </span>

                                                                                  <i class="fa  fa-2x fa-bell badge-wrapper pull-left ">

                                                               @if($Tazmin->count()>0)                          <span class='badge badge-secondary'>{{$Tazmin->count()}}</span>
                                                                                      @endif
</i>

                                          </span>




                                   </div>
                               </div>

                           </section>
                       </div>
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
        <div class="row">
            <section class="col-lg-12 col-md-12 eval" style="display: none;">
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
                                    <thead class="text-center">
                                                                    <tr >
                                                                           <th>شماره</th>
                                                                         <th>کود پروژه</th>
                                                                           <th>تاریخ اغاز ارزیابی</th>
                                                                        <th>تاریخ ختم ارزیابی</th>
                                                                            <th>وقت کذشته</th>
                                                                         <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                       </thead>


                                    <tbody >
                                    @foreach($eval as $key=>$rcd)




                                        @php
                                        $count=0;

                                            if($rcd->eval_ten==1 )
                                            {
                                            $count+=1;
                                            }
                                            if ($rcd->eval_15==1 )
                                            {
                                              $count+=1;
                                            }
                                            if( $rcd->eval_20==1)
                                            {
                                              $count+=1;
                                            }
                                             if($rcd->eval_30==1)
                                             {
                                               $count+=1;
                                             }



                                                 $d = null;




                                                   $now = new DateTime($rcd->Start_Date);

                                                      $date = new jDateTime(true, true, 'Asia/Kabul');
                                                        $to = $date->date("Y-m-d", false, false);
                                                           $net = new DateTime($to);

                                $interval = $now->diff($net);
                                $days = $interval->format('%R%a');
                                if(strpos($days, "+") !== false){
                                    if(substr($days, 1) != 0)
                                    { $d = substr($days, 1) ; }
                                }

                                        @endphp
@if($d>=1 and $d<=30)

                                    <tr  class="myfont">
                                  <td>{{++$key}}</td>
                                   <td>{{$rcd->Pro_Code}}</td>
                                     <td>
                                         {{$rcd->Start_Date}}


                                     </td>
                                        <td>
                                            {{$rcd->End_Date}}


                                        </td>
                                      <td class="text-red"> {{ $d}}</td>
                                      <td>  <a href="{{url('Send_Mail_Eval_Time')}}/{{$rcd->id}}"   class="btn btn-xs btn-primary"  ><i  class="fa fa-envelope"></i></a></td>
                                   <td>
                                       @if($d==10 )
                                           <i class="fa fa-2x fa-exclamation-circle blink"></i>

                                           @elseif($d==15)
                                           <i class="fa fa-2x fa-exclamation-circle blink"></i>
                                       @elseif($d==20)
                                           <i class="fa fa-2x fa-exclamation-circle blink"></i>
                                       @elseif($d==30)
                                           <i class="fa fa-2x fa-exclamation-circle blink"></i>
                                           @endif
                                   </td>
                                        <td>
                                            @if($rcd->eval_ten==1 or $rcd->eval_15==1 or $rcd->eval_20==1 or $rcd->eval_30==1)
                                                <span style="color:green" class="fa fa-2x fa-check-square-o"></span>


                                            @endif

                                        </td>
                                        <td>
                                            {{$count}}
                                        </td>
                                 </tr>
                                    @endif
                                  @endforeach
                                </table>







                            </div>

                        </div>





                    </div>
                </div>

            </section>
        </div>
        <div class="row">
            <section class="col-lg-12 col-md-12 con" style="display: none;">
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
                                    <thead class="text-center">
                                    <tr >
                                        <th>شماره</th>
                                        <th>کود پروژه</th>
                                        <th>تاریخ اغاز قرارداد</th>
                                        <th>تاریخ ختم قرارداد</th>
                                        <th>وقت کذشته</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>


                                    <tbody >
                                    @foreach($cont as $key=>$rcd)




                                        @php
                                            $count=0;

                                                if($rcd->con_10==1 )
                                                {
                                                $count+=1;
                                                }
                                                if ($rcd->con_15==1 )
                                                {
                                                  $count+=1;
                                                }
                                                if( $rcd->con_20==1)
                                                {
                                                  $count+=1;
                                                }
                                                 if($rcd->con_30==1)
                                                 {
                                                   $count+=1;
                                                 }



                                                     $d = null;




                                                       $now = new DateTime($rcd->Start_Date_Contract);

                                                          $date = new jDateTime(true, true, 'Asia/Kabul');
                                                            $to = $date->date("Y-m-d", false, false);
                                                               $net = new DateTime($to);

                                    $interval = $now->diff($net);
                                    $days = $interval->format('%R%a');
                                    if(strpos($days, "+") !== false){
                                        if(substr($days, 1) != 0)
                                        { $d = substr($days, 1) ; }
                                    }

                                        @endphp


                                            <tr  class="myfont">
                                                <td>{{++$key}}</td>
                                                <td>{{$rcd->Pro_Code}}</td>
                                                <td>
                                                    {{$rcd->Start_Date_Contract}}


                                                </td>
                                                <td>
                                                    {{$rcd->End_Date_Contract}}


                                                </td>
                                                <td class="text-red"> {{ $d}}</td>
                                                <td>  <a href="{{url('Send_Mail_Contract')}}/{{$rcd->id}}"   class="btn btn-xs btn-primary"  ><i  class="fa fa-envelope"></i></a></td>
                                                <td>
                                                    @if($d==10 )
                                                        <i class="fa fa-2x fa-exclamation-circle blink"></i>

                                                    @elseif($d==15)
                                                        <i class="fa fa-2x fa-exclamation-circle blink"></i>
                                                    @elseif($d==20)
                                                        <i class="fa fa-2x fa-exclamation-circle blink"></i>
                                                    @elseif($d==30)
                                                        <i class="fa fa-2x fa-exclamation-circle blink"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($rcd->con_10==1 or $rcd->con_15==1 or $rcd->con_20==1 or $rcd->con_30==1)
                                                        <span style="color:green" class="fa fa-2x fa-check-square-o"></span>


                                                    @endif

                                                </td>
                                                <td>
                                                    {{$count}}
                                                </td>
                                            </tr>

                                    @endforeach
                                </table>







                            </div>

                        </div>





                    </div>
                </div>

            </section>
        </div>
        <div class="row">
            <section class="col-lg-12 col-md-12 ext" style="display: none;">
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
                                    <thead class="text-center">
                                    <tr >
                                        <th>شماره</th>
                                        <th>کود پروژه</th>
                                        <th>تاریخ اغاز بررسی تعدیل</th>
                                        <th>تاریخ ختم بررسی تعدیل</th>
                                        <th>وقت کذشته</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>
<?php
//print_r($ext);
?>

                                    <tbody >
                                    @foreach($ext as $key=>$rcd)




                                        @php
                                            $count=0;

                                                if($rcd->ext_10==1 )
                                                {
                                                $count+=1;
                                                }
                                                if ($rcd->ext_15==1 )
                                                {
                                                  $count+=1;
                                                }
                                                if( $rcd->ext_20==1)
                                                {
                                                  $count+=1;
                                                }
                                                 if($rcd->ext_30==1)
                                                 {
                                                   $count+=1;
                                                 }



                                                     $d = null;




                                                       $now = new DateTime($rcd->Start_Date);

                                                          $date = new jDateTime(true, true, 'Asia/Kabul');
                                                            $to = $date->date("Y-m-d", false, false);
                                                               $net = new DateTime($to);

                                    $interval = $now->diff($net);
                                    $days = $interval->format('%R%a');
                                    if(strpos($days, "+") !== false){
                                        if(substr($days, 1) != 0)
                                        { $d = substr($days, 1) ; }
                                    }

                                        @endphp


                                            <tr  class="myfont">
                                                <td>{{++$key}}</td>
                                                <td>{{$rcd->Pro_Code}}</td>
                                                <td>
                                                    {{$rcd->Start_Date}}


                                                </td>
                                                <td>
                                                    {{$rcd->End_Date}}


                                                </td>
                                                <td class="text-red">{{$d}}</td>
                                                <td>  <a href="{{url('Send_Mail_Offer')}}/"   class="btn btn-xs btn-primary"  ><i  class="fa fa-envelope"></i></a></td>
                                                <td>
                                                    @if($d==10 )
                                                        <i class="fa fa-2x fa-exclamation-circle blink"></i>

                                                    @elseif($d==15)
                                                        <i class="fa fa-2x fa-exclamation-circle blink"></i>
                                                    @elseif($d==20)
                                                        <i class="fa fa-2x fa-exclamation-circle blink"></i>
                                                    @elseif($d==30)
                                                        <i class="fa fa-2x fa-exclamation-circle blink"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($rcd->ext_10==1 or $rcd->ext_15==1 or $rcd->ext_20==1 or $rcd->ext_30==1)
                                                        <span style="color:green" class="fa fa-2x fa-check-square-o"></span>


                                                    @endif

                                                </td>
                                                <td>
                                                    {{$count}}
                                                </td>
                                            </tr>

                                    @endforeach
                                </table>







                            </div>

                        </div>





                    </div>
                </div>

            </section>
        </div>
        <div class="row">
            <section class="col-lg-12 col-md-12 item_record_table" style="display: none;">
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
                                    <thead class="text-center">
                                    <tr >
                                        <th>شماره</th>
                                        <th>کود پروژه</th>
                                        <th> تاریخ اغاز تسلیمی اجناس</th>
                                        <th> تاریخ ختم تسلیمی اجناس</th>
                                        <th>وقت باقی</th>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>


                                    <tbody >

                                    @foreach($item as $key=>$rcd)




                                        @php



                                                     $d = null;




                                                       $now = new DateTime($rcd->Date_To_Item);

                                                          $date = new jDateTime(true, true, 'Asia/Kabul');
                                                            $to = $date->date("Y-m-d", false, false);
                                                               $net = new DateTime($to);

                                    $interval = $now->diff($net);
                                    $days = $interval->format('%R%a');
                                    if(strpos($days, "+") !== false){
                                        if(substr($days, 1) != 0)
                                        { $d = substr($days, 1) ; }
                                    }

                                        @endphp


                                            <tr  class="myfont">
                                                <td>{{++$key}}</td>
                                                <td>{{$rcd->Pro_Code}}</td>
                                                <td>
                                                    {{$rcd->Date_From_Item}}


                                                </td>
                                                <td>
                                                    {{$rcd->Date_To_Item}}
                                                </td>
                                                <td class="text-red">{{$rcd->day}}</td>
                                                <td>  <a href="{{url('Send_Item_Email')}}/{{$rcd->id}}"   class="btn btn-xs btn-primary"  ><i  class="fa fa-envelope"></i></a></td>
                                                <td>

                                                </td>
                                                <td>
                                                    @if($rcd->item_email==1)
                                                        <span style="color:green" class="fa fa-2x fa-check-square-o"></span>


                                                    @endif

                                                </td>

                                            </tr>

                                    @endforeach
                                </table>







                            </div>

                        </div>





                    </div>
                </div>

            </section>
        </div>
        <div class="row">
            <section class="col-lg-12 col-md-12 Tazmin_record_table" style="display: none;">
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
                                    <thead class="text-center">
                                    <tr >
                                        <th>شماره</th>
                                        <th>کود پروژه</th>
                                        <th>تاریخ اغاز صدرو تضمین کار</th>
                                        <th> تاریخ ختم صدور تضمین</th>
                                        <th>وقت باقی</th>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>


                                    <tbody >
                                    @foreach($Tazmin as $key=>$rcd)




                                            <tr  class="myfont">
                                                <td>{{++$key}}</td>
                                                <td>{{$rcd->Pro_Code}}</td>
                                                <td>
                                                    {{$rcd->Export_Strat_Date}}


                                                </td>
                                                <td>
                                                    {{$rcd->Export_End_Date}}


                                                </td>
                                                <td class="text-red"> {{ $rcd->day}}</td>
                                                <td>  <a href="{{url('Send_Mail_Tazmin')}}/{{$rcd->id}}"   class="btn btn-xs btn-primary"  ><i  class="fa fa-envelope"></i></a></td>
                                                <td>

                                                </td>
                                                <td>


                                                </td>

                                            </tr>

                                    @endforeach
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


        .blink {
            color: red;

        }
        .badge-wrapper {
            position: relative;
        }

        .badge {
            position: absolute;
            top: 0;
            right: -5px;
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: red;
        }
    </style>


    <script>
        $(document).ready(function () {




            $("#Pro_Fid").select2({

                allowClear: true
            });


            setTimeout(function(){$('.overlay').hide();}, 2000);


            $("#offer_date").on('click',function () {

                $("#tbleanouce").empty();
               var div='';
                var tblrcd='<thead class="text-center">\n' +
                    '                                    <tr >\n' +
                    '                                        <th>شماره</th>' +
                    '                                        <th>کود پروژه</th>' +
                    '                                        <th>تاریخ افرکشایی</th>' +
                    '                                        <th>وقت باقی</th>' +
                    '                                     <th></th>' +
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
                              div='<i class="fa fa-2x fa-exclamation-circle blink"></i>'
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
    '                                                         <td>  <a href="{{url('Send_Mail_Offer')}}/'+res[i].id+'"   class="btn btn-xs btn-primary"  ><i  class="fa fa-envelope"></i></a></td>' +
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
                var div='';
                var tblrcd='<thead class="text-center">\n' +
                    '                                    <tr >\n' +
                    '                                        <th>شماره</th>' +
                    '                                        <th>کود پروژه</th>' +
                    '                                        <th>تاریخ قبل از داوطلبی</th>' +
                    '                                        <th>وقت باقی</th>' +
                    '                                     <th></th>' +
                    '                                     <th></th>' +
                    '                                    </thead><tbody >';



                $.ajax({

                    url:'{{url('Find_Met_Date_Email')}}',
                    method:'get',
                    success:function(res) {
                        console.log(res);
                        for (i=0;i<res.length;i++)
                        {
                            if(res[i].day==2)
                            {
                                div='<i class="fa fa-2x fa-exclamation-circle blink"></i>'
                            }
                            else
                            {
                                div='';
                            }
                            tblrcd +=
                                '                                                      <tr  class="myfont">' +
                                '                                                            <td>'+i+'</td>' +
                                '                                                            <td>'+res[i].Pro_Code+'</td>' +
                                '                                                            <td>'+res[i].Met_Date+'</td>' +
                                '                                                            <td class="text-red">'+res[i].day+'</td>' +
                                '                                                         <td>  <a href="{{url('Send_Mail_Offer')}}/'+res[i].id+'"   class="btn btn-xs btn-primary"  ><i  class="fa fa-envelope"></i></a></td>' +
                                '                                                         <td>  ' +div +'</td>' +
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
                var div='';
                var tblrcd='<thead class="text-center">\n' +
                    '                                    <tr >\n' +
                    '                                        <th>شماره</th>' +
                    '                                        <th>کود پروژه</th>' +
                    '                                        <th>تاریخ اغاز ارزیابی</th>' +
                    '                                        <th>وقت باقی</th>' +
                    '                                     <th></th>' +
                    '                                     <th></th>' +
                    '                                    </thead><tbody >';



                $.ajax({

                    url:'{{url('Find_Eval_Date_Email')}}',
                    method:'get',
                    success:function(res) {
                        console.log(res);
                        for (i=0;i<res.length;i++)
                        {
                            if(res[i].day==2)
                            {
                                div='<i class="fa fa-2x fa-exclamation-circle blink"></i>'
                            }
                            else
                            {
                                div='';
                            }
                            tblrcd +=
                                '                                                      <tr  class="myfont">' +
                                '                                                            <td>'+i+'</td>' +
                                '                                                            <td>'+res[i].Pro_Code+'</td>' +
                                '                                                            <td>'+res[i].Start_Date+'</td>' +
                                '                                                            <td class="text-red">'+res[i].day+'</td>' +
                                '                                                         <td>  <a href="{{url('Send_Mail_Eval_Time')}}/'+res[i].id+'"   class="btn btn-xs btn-primary"  ><i  class="fa fa-envelope"></i></a></td>' +
                                '                                                         <td>             ' +
                                '                                                         <td>  ' +div +'</td>' +
                                '                                                       </tr>'

                        }

                        tblrcd+='<tbody >';
                        $("#tbleanouce").append(tblrcd);

                    }

                })

            })

   // Contract date email

            $("#Contract_date").on('click',function () {
                $("#tbleanouce").empty();
                var div='';
                var tblrcd='<thead class="text-center">' +
                    '                                    <tr >' +
                    '                                        <th>شماره</th>' +
                    '                                        <th>کود پروژه</th>' +
                    '                                        <th>تاریخ اغاز قرارداد</th>' +
                    '                                        <th>وقت باقی</th>' +
                    '                                     <th></th>' +
                    '                                     <th></th>' +
                    '                                    </thead><tbody >';



                $.ajax({

                    url:'{{url('Find_Contract_Date_Email')}}',
                    method:'get',
                    success:function(res) {
                        console.log(res);
                        for (i=0;i<res.length;i++)
                        {
                            if(res[i].day==2)
                            {
                                div='<i class="fa fa-2x fa-exclamation-circle blink"></i>'
                            }
                            else
                            {
                                div='';
                            }
                            tblrcd +=
                                '                                                      <tr  class="myfont">' +
                                '                                                            <td>'+i+'</td>' +
                                '                                                            <td>'+res[i].Pro_Code+'</td>' +
                                '                                                            <td>'+res[i].Start_Date_Contract+'</td>' +
                                '                                                            <td class="text-red">'+res[i].day+'</td>' +
                                '                                                         <td>  <a href="{{url('Send_Mail_Contract')}}/'+res[i].id+'"   class="btn btn-xs btn-primary"  ><i  class="fa fa-envelope"></i></a></td>' +
                                '                                                         <td>             ' +
                                '                                                         <td>  ' +div +'</td>' +
                                '                                                       </tr>'

                        }

                        tblrcd+='<tbody >';
                        $("#tbleanouce").append(tblrcd);

                    }

                })

            })

 // Extand_date email
            $("#Extand_date").on('click',function () {

                $("#tbleanouce").empty();
                var div='';
                var tblrcd='<thead class="text-center">' +
                    '                                    <tr >' +
                    '                                        <th>شماره</th>' +
                    '                                        <th>کود پروژه</th>' +
                    '                                        <th>تاریخ اغاز بررسی تعدیل</th>' +
                    '                                        <th>وقت باقی</th>' +
                    '                                     <th></th>' +
                    '                                     <th></th>' +
                    '                                    </thead><tbody >';



                $.ajax({

                    url:'{{url('Find_Extand_Date_Email')}}',
                    method:'get',
                    success:function(res) {
                        console.log(res);
                        for (i=0;i<res.length;i++)
                        {
                            if(res[i].day==2)
                            {
                                div='<i class="fa fa-2x fa-exclamation-circle blink"></i>'
                            }
                            else
                            {
                                div='';
                            }
                            tblrcd +=
                                '                                                      <tr  class="myfont">' +
                                '                                                            <td>'+i+'</td>' +
                                '                                                            <td>'+res[i].Pro_Code+'</td>' +
                                '                                                            <td>'+res[i].Start_Date+'</td>' +
                                '                                                            <td class="text-red">'+res[i].day+'</td>' +
                                '                                                         <td>  <a href="{{url('Send_Mail_Contract')}}/'+res[i].id+'"   class="btn btn-xs btn-primary"  ><i  class="fa fa-envelope"></i></a></td>' +
                                '                                                         <td>             ' +
                                '                                                         <td>  ' +div +'</td>' +
                                '                                                       </tr>'

                        }

                        tblrcd+='<tbody >';
                        $("#tbleanouce").append(tblrcd);

                    }

                })

            })
            ///Item_Date


            $("#eval_time_date").on('click',function () {
                $(".con").hide();
                $(".eval").show();
                $(".ext").hide();
                $(".Tazmin_record_table").hide();
                $(".item_record_table").hide();
            })

            $("#Contract").on('click',function () {
                $(".eval").hide();
                $(".con").show();
                $(".ext").hide();
                $(".Tazmin_record_table").hide();
                $(".item_record_table").hide();
            })


            $("#Extand").on('click',function () {
                $(".eval").hide();
                $(".con").hide();
                $(".item_record_table").hide();
                $(".Tazmin_record_table").hide();
                $(".ext").show();

            })
            $("#Item_Date").on('click',function () {
                $(".eval").hide();
                $(".con").hide();
                $(".ext").hide();
                $(".Tazmin_record_table").hide();
                $(".item_record_table").show();


            })
            $("#Tazmin").on('click',function () {
                $(".eval").hide();
                $(".con").hide();
                $(".ext").hide();
                $(".item_record_table").hide();
                $(".Tazmin_record_table").show();

            })


        })


    </script>
@endsection
