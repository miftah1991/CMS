@extends('layouts.master')

@section('content')


<br>
    <div class="box box-info col-lg-12">
        <div class="box-header">
            لست انوایسها
        </div>

        <div class="box-body">


            <table class="table table-bordered table-hover text-center" id="tblinvvoice">
                <thead class="text-center">
                <tr >
                    <th>شماره</th>
                    <th>کود پروژه</th>
                    <th>اسم پروژه</th>

<th>بودجه مجموعی</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $key=>$rcd)
                <tr  class="myfont">
                    <td>{{++$key}}</td>
                    <td>@isset($rcd->Pro_Code)  {{$rcd->Pro_Code}} @endif</td>
                    <td>@isset($rcd->Project_Name){{$rcd->Project_Name}}  @endif</td>
                    <td>@isset($rcd->Accepts_Fund){{$rcd->Accepts_Fund}}  @endif</td>

                    <td> <a href="print_Invoice/@isset($rcd->id){{$rcd->id}}@endif">  <i class="fa fa-print btn btn-primary btn-xs"></i></a>
                         <a href="View_Invoice/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-barcode btn btn-info btn-xs"> </i></a>

                    </td>
                    @endforeach

                </tbody>
            </table>


        </div>



    </div>
<div class="modal fade modal-large " id="Find_Complain_Comapny" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title btn btn-warning btn-block" id="exampleModalLongTitle">لست شرکت افر کننده </h5>

                </button>
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



            $("#tblinvvoice").dataTable();









            $(".fa-user").on('click',function () {
                $("#ListEmp").empty();
                var id=$(this).data("id")
                var tr=''
                $.ajax({

                    url:'Find_Complain_Comapny',
                    type:'get',
                    data:{data:id},
                    success:function (data) {
                        for(var i=0;i<data.length;i++)
                        {
                            tr+='<tr class="myfont"><td>'+(i)+'</td><td>'+data[i].Name+'</td><td>'+data[i].Jawaz+'</td><td>'+data[i].MemberName+'</td><td>'+data[i].Phone+'</td><td>'+data[i].Email+'</td></tr>' ;
                        }

                        $("#ListEmp").append(tr);
                    }


                })

            })



        })

    </script>




    @endsection
