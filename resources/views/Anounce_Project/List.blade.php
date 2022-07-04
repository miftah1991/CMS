@extends('layouts.master')

@section('content')

    @if($msg=Session::get('msg'))



        <div class="modal show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">خبرتیا</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{$msg}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">بسته</button>

                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="box box-info col-lg-12">
        <div class="box-header">
            لست قرارداد اعلان شده

        </div>

        <div class="box-body">


            <table class="table table-bordered table-hover text-center" id="tbleanouce">
                <thead class="text-center">
                <tr >
                    <th>شماره</th>
                    <th>کود پروژه</th>
                    <th>تاریخ  قبل از داوطلبی</th>

                    <th>تاریخ افرکشایی</th>
                    <th> وقت باقی </th>
                    <th>حالت</th>
                    <th></th>
                    <th>ارسال ایمل</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $key=>$rcd)

                    @php











                    $d = null;
                    $h = null;
                    $m = null;
                    $red = null;
                    $now = new DateTime($rcd->Met_Date);
                    $date = new jDateTime(true, true, 'Asia/Kabul');
                    $to = $date->date("Y-m-d", false, false);

                    $estimate_date = new DateTime($to);


                    $interval = $now->diff($estimate_date);
                    $days = $interval->format('%R%a');
                    if(strpos($days, "-") !== false){
                    if(substr($days, 1) != 0){ $d = substr($days, 1) . " روز"; }
                    }
                    $month = $interval->format('%R%m');
                    if(strpos($month, "-") !== false){
                    if(substr($month, 1) != 0){ $h = substr($month, 1) . " ماه"; }

                    }







                    @endphp
                <tr class="myfont">
                    <td>{{++$key}}</td>
                    <td>@isset($rcd->registerproject->Pro_Code)  {{$rcd->registerproject->Pro_Code}} @endif</td>
                    <td>@isset($rcd->Offer_Date){{$rcd->Offer_Date}}  @endif</td>
                    <td>@isset($rcd->Met_Date){{$rcd->Met_Date}}  @endif</td>
                    <td style="color: red;"><span class="bg badge-danger font-cb">{{$d}}</span><br>
                        <span class="bg badge-danger font-cb">{{$month}}</span></td>
                    <td>
                        @if($rcd->registerproject->is_complete==1)
                            مکمل

                        @else
                            جریان

                        @endif
                    </td>
                    <td>
                        @if($rcd->registerproject->is_complete==1)
                            <span class="fa fa-check" style="color: green"></span>

                        @else

                            <span class="fa fa-spinner fa-spin fa-1x " style="color: blue"></span>
                        @endif
                    </td>
<td>
    @if($rcd->registerproject->is_complete==0)
        <a href="{{url('Send_Mail_Offer')}}/{{$rcd->id}}"><i class="fa fa-envelope-open"></i></a>
    @endif
</td>

                    <td> <i class="fa fa-user btn btn-warning  btn-xs" data-id="{{$rcd->id}}"  data-toggle="modal" data-target="#exampleModalCenter" ></i><a href="print_Aounce_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-print btn-xs btn btn-primary"></i> </a>

                        @if($rcd->registerproject->is_complete==0)
                        <a href="Edit_Aounce_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-pencil btn btn-default btn-xs">   </i></a>
                        @endif
                         <a href="view_Aounce_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-barcode  btn-xs btn btn-info"> </i></a>

                    </td>
                    @endforeach

                </tbody>
            </table>


        </div>



    </div>
<div class="modal fade modal-large " id="exampleModalCenter" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title btn btn-warning btn-block" id="exampleModalLongTitle">لست هیات </h5>


            </div>
            <div class="modal-body  ">

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


                                <table class="table table-responsive">
                                 <thead>
                                 <tr>
                                     <td>شماره</td>
                                     <td>اسم هیت</td>
                                     <td>شماره تماس</td>
                                     <td>ایمل ادرس</td>
                                 </tr>
                                 </thead>
<tbody id="ListEmp">

</tbody>
                                </table>

                            </div>
                        </div>

                    </section>
                </div>






            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بسته</button>

            </div>
        </div>
    </div>
</div>





    <script>

        $(document).ready(function () {

            setTimeout(function(){

                $('#exampleModal').hide("modal");
                $('#exampleModal').addClass("hide");


                }, 2000);
            $("#tbleanouce").dataTable();

          $(".fa-user").on('click',function () {
              $("#ListEmp").empty();
           var id=$(this).data("id");
var n=0;

              var tr=''
         $.ajax({

             url:'GetListAounce',
             type:'get',
             data:{data:id},
             success:function (data) {
                 for(var i=0;i<data.length;i++)
                 {
                     tr+='<tr class="myfont"><td>'+(++n)+'</td><td>'+data[i].Emp_Name+'</td><td>'+data[i].Phone+'</td><td>'+data[i].Email+'</td></tr>' ;
                 }

                 $("#ListEmp").append(tr);
             }


         })

          })



        })

    </script>




    @endsection
