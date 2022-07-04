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
            لیست شرکت ها افر شده

        </div>

        <div class="box-body">


            <table class="table table-bordered table-hover text-center" id="tbloffer">
                <thead class="text-center">
                <tr >
                    <th>شماره</th>
                    <th>کود پروژه</th>
                    <th>تاریخ ثپت افر</th>

<th>حالت ًپروژه</th>
                    <th></th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $key=>$rcd)
                <tr class="myfont" >
                    <td>{{++$key}}</td>
                    <td>@isset($rcd->registerprocuremnet->Pro_Code)  {{$rcd->registerprocuremnet->Pro_Code}} @endif</td>
                    <td>@isset($rcd->Offer_Date){{$rcd->Offer_Date}}  @endif</td>

                    <td>
                        @if($rcd->registerprocuremnet->is_complete==1)
                            مکمل

                        @else
                            جریان

                        @endif
                    </td>
                    <td>
                        @if($rcd->registerprocuremnet->is_complete==1)
                            <span class="fa fa-check" style="color: green"></span>

                        @else

                            <span class="fa fa-spinner fa-spin fa-1x " style="color: blue"></span>
                        @endif
                    </td>

                    <td> <i class="fa fa-user btn btn-warning btn-xs" data-id="{{$rcd->id}}"  data-toggle="modal" data-target="#Find_Offer_Comapny" ></i><a href="print_Offer_Company/@isset($rcd->id){{$rcd->id}}@endif">  <i class="fa fa-print btn btn-primary btn-xs"></i></a>

                        @if($rcd->registerprocuremnet->is_complete==0)


                        <a href="Edit_Offer_Company/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-pencil btn btn-xs btn-default">   </i></a>

                        @endif

                         <a href="view_Offer_Company/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-barcode btn btn-info btn-xs"> </i></a>

                    </td>
                    @endforeach

                </tbody>
            </table>


        </div>



    </div>
<div class="modal fade modal-large " id="Find_Offer_Comapny" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title btn btn-warning btn-block" id="exampleModalLongTitle">لست شرکت افر کننده </h5>


            </div>
            <div class="modal-body  ">

                <div class="row">
                    <section class="col-lg-12 col-md-12">
                        <div class="box box-info">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title"></h3>
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
                                     <td>اسم شرکت</td>
                                     <td>جواز</td>
                                     <td>اسم نماینده</td>
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


                $("#tbloffer").dataTable();




            setTimeout(function(){

                $('#exampleModal').hide("modal");
                $('#exampleModal').addClass("hide");


            }, 2000);





            $(".fa-user").on('click',function () {
              $("#ListEmp").empty();
           var id=$(this).data("id");
                var n=0;
              var tr=''
         $.ajax({

             url:'Find_Offer_Company',
             type:'get',
             data:{data:id},
             success:function (data) {
                 for(var i=0;i<data.length;i++)
                 {
                     tr+='<tr class="myfont"><td>'+(++n)+'</td><td>'+data[i].Name+'</td><td>'+data[i].Jawaz+'</td><td>'+data[i].MemberName+'</td><td>'+data[i].Phone+'</td><td>'+data[i].Email+'</td></tr>' ;
                 }

                 $("#ListEmp").append(tr);
             }


         })

          })



        })

    </script>




    @endsection
