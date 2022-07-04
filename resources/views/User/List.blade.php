@extends('layouts.master')

@section('content')

    @if($msg=Session::get('msg'))
        <div class="alert alert-info   show" role="alert">
            {{$msg}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif

<br>
    <div class="box box-info col-lg-12">
        <div class="box-header">
            لیست ګزارش ارزیابی و برنده شرکت
        </div>

        <div class="box-body">


            <table class="table table-bordered table-hover text-center" id="tblcomplete">
                <thead class="text-center">
                <tr >
                    <th>شماره</th>
                    <th>اسم کارمند</th>
                    <th>ایمل کارمند</th>

                    <th>نوع حساب</th>
                    <th>نوع فعالیت</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $key=>$rcd)
                <tr >
                    <td>{{++$key}}</td>
                    <td>@isset($rcd->name)  {{$rcd->name}} @endif</td>
                    <td>@isset($rcd->email){{$rcd->email}}  @endif</td>

                    <td>{{$rcd->role->Role_Name}}</td>

                    <td>
                        @if($rcd->active==1 )
                            <a href="{{url('nactive',['id'=> $rcd->id])}}" class="btn btn-xs btn-danger">غیر فعال کردن</a>
                        @else
                            <a href="{{url('active',['id'=> $rcd->id])}}" class="btn btn-xs btn-success">فعال کردن</a>
                        @endif

                    </td>
                    <td>
                        <a href="Edit_َUser/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-pencil btn btn-info"> </i></a>


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




            $("#tblcomplete").dataTable();









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
                            tr+='<tr><td>'+(i)+'</td><td>'+data[i].Name+'</td><td>'+data[i].Jawaz+'</td><td>'+data[i].MemberName+'</td><td>'+data[i].Phone+'</td><td>'+data[i].Email+'</td></tr>' ;
                        }

                        $("#ListEmp").append(tr);
                    }


                })

            })



        })

    </script>




    @endsection
