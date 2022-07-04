@extends('layouts.master')

@section('content')


<br>
    <div class="box box-info col-lg-12">
        <div class="box-header">
            لیست ګزارش ارزیابی و برنده شرکت
        </div>

        <div class="box-body">

            <div class="row">
                <form action="{{url('Find_Paymant')}}" method="post">
                <div class="col-lg-10">
                    <div class="form-group ">
                        @csrf
                        <label>لیست پروژه منظور شده</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Pro_Fid" id="Pro_Fid"  required class="form-control">
                                <option value="">لطفا پروژه انتخاب کنید</option>
                                @foreach($register_project as $rcd)

                                    <option value="{{$rcd->id}}">{{$rcd->Project_Name}}</option>
                                @endforeach

                            </select>

                        </div>

                    </div>
                </div>
<div class="col-lg-2">
    <br>
    <input type="submit" value="چستجو" class="btn btn-info">
</div>
                </form>
            </div>
            <table class="table table-bordered table-hover text-center">
                <thead class="text-center">
                <tr >
                    <th>شماره</th>
                    <th>Item</th>
                    <th>Qunity</th>

                    <th>Unit_Price</th>
                    <th>Amount</th>
                    <th>Total_Price</th>
                    <th>Discount</th>
                    <th>Price_Distcount</th>

                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $key=>$rcd)
                <tr >
                    <td>{{++$key}}</td>
                    <td>@isset($rcd->Details)  {{$rcd->Details}} @endif</td>
                    <td>@isset($rcd->Qunity){{$rcd->Qunity}}  @endif</td>
                    <td>@isset($rcd->Unit_Price){{$rcd->Unit_Price}}  @endif</td>
                    <td>@isset($rcd->Amount){{$rcd->Amount}}  @endif</td>
                    <td>@isset($rcd->Total_Price){{$rcd->Total_Price}}  @endif</td>
                    <td>@isset($rcd->Discount){{$rcd->Discount}}  @endif</td>
                    <td>@isset($rcd->Price_Distcount){{$rcd->Price_Distcount}}  @endif</td>
                    <td>   <a href="View_Sub_Paymant/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-pencil btn btn-default">   </i></a>

                    </td>
                    @endforeach
                <tr>
                    <td colspan="6"></td>
                </tr>
                </tbody>
            </table>


        </div>



    </div>
<div class="modal fade modal-large " id="Find_Complain_Comapny" role="dialog" aria-hidden="true">
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
