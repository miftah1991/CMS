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
           لست ایمل ارسال شده

        </div>

        <div class="box-body">


            <table class="table table-bordered table-hover text-center" id="tblevalvation">
                <thead class="text-center">
                <tr >
                    <th>شماره</th>
                    <th>کود پروژه</th>
                    <th>موضوع ایمل</th>
                    <th>نوع ایمل</th>
                    <th>تپت تاریخ ایمل</th>
                    <th>وقت ایمل</th>


                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $key=>$rcd)


                <tr  class="myfont">
                    <td>{{++$key}}</td>
                    <td>@isset($rcd->registerprocurement->Pro_Code)  {{$rcd->registerprocurement->Pro_Code}} @endif</td>
                    <td>@isset($rcd->Subject)  {{$rcd->Subject}} @endif</td>
                    <td>@isset($rcd->Type){{$rcd->Type}}  @endif</td>
                    <td>@isset($rcd->Date){{$rcd->Date}}  @endif</td>



                    <td>
                        @isset($rcd->time){{$rcd->time}}  @endif
                    </td>

                </tr>
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


                $("#tblevalvation").dataTable();


          $(".fa-user").on('click',function () {
              $("#ListEmp").empty();
           var id=$(this).data("id");
           var n=0;
              var tr=''
         $.ajax({

             url:'GetListEval',
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
