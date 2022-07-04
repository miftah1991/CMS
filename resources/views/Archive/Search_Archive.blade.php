@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">
    @if($msg=Session::get('msg'))
        <div class="alert alert-info   show" role="alert">
            {{$msg}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif
    <div class="panel panel-info ">
        <div class="panel-heading">
            <div class="panel-title text-center">ثپت سیستم ارشیف</div>

        </div>

        <div class="panel-body">



<div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>کود پروژه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Project_Code"  id="Project_Code" autocomplete="off" class="form-control myfont "  >

                        </div>

                    </div>
                </div>
    <div class="col-lg-4">
        <div class="form-group ">
            <label>شرکت قرارداد کننده</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-product-hunt"></i>
                </div>

                <select name="Com_Fid" id="Com_Fid"  required class="form-control">
                    <option value="">لطفا شرکت انتخاب کنید</option>
                    @foreach($company as $rcd)

                        <option value="{{$rcd->id}}">{{$rcd->Name}}</option>
                    @endforeach

                </select>

            </div>

        </div>
    </div>
                <div class="col-lg-2">
                    <div class="form-group ">
                        <label>خانه الماری</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Arc_Fid" id="Arc_Fid"  required class="form-control">
                                <option value=""> خانه انتخاب کنید</option>
                                @foreach($Location as $rcd)

                                    <option value="{{$rcd->id}}">{{$rcd->name}}</option>
                                @endforeach

                            </select>

                        </div>

                    </div>
                </div>

    <div class="col-lg-2">
        <div class="form-group ">
            <label>سال</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-file-text-o"></i>
                </div>

                <input type="text" name="Year" id="Year" required autocomplete="off" class="form-control myfont " >

            </div>

        </div>
    </div>
</div>
                <div class="col-lg-12" style="overflow-y:scroll;height:600px;">


            <table class="table table-bordered table-hover text-center" id="tbloffer">
                <thead class="text-center">
                <tr >

                    <th>کود پروژه</th>
                    <th>شرکت قرارداد کننده</th>
                    <th>موقعیت پروژه</th>
                    <th>سال</th>
                    <th>فایل</th>
                </tr>
                </thead>
                <tbody class="text-center" id="ListEmp"  >


                </tbody>
            </table>
                </div>








            </div>






    </div>

</div>
<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>

<script>

    $(document).ready(function () {


        $("#Project_Code").on('keyup',function () {

            var tr='';
            $("#ListEmp").empty();
            var code=$("#Project_Code").val();
            $.ajax({
                url:'{{url('Get_Project_Code')}}',
                method:'get',
                data:{code:code},
                success:function (data) {
               for (var i=0;i<data.length;i++)
               {
                   tr+='<tr class="myfont"><td>'+data[i].Project_Code+'</td><td>'+data[i].Name+'</td><td>'+data[i].name+'</td><td>'+data[i].Year+'</td><td><a href="{{asset('storage/app/public/Archive')}}/'+data[i].Project_File+'" ><span class="fa fa-download"></span></a></td></tr>' ;
               }

                    $("#ListEmp").append(tr);

                },
                error:function (res) {
                    console.log(res);

                }




            })


        })
////////////////Search by year/////////////////////////



        $("#Year").on('keyup',function () {

            var tr='';
            $("#ListEmp").empty();
            var code=$("#Year").val();
            $.ajax({
                url:'{{url('Get_Project_Year')}}',
                method:'get',
                data:{code:code},
                success:function (data) {
                    for (var i=0;i<data.length;i++)
                    {
                        tr+='<tr class="myfont"><td>'+data[i].Project_Code+'</td><td>'+data[i].Name+'</td><td>'+data[i].name+'</td><td>'+data[i].Year+'</td><td><a href="{{asset('storage/app/public/Archive')}}/'+data[i].Project_File+'" ><span class="fa fa-download"></span></a></td></tr>' ;
                    }

                    $("#ListEmp").append(tr);

                },
                error:function (res) {
                    console.log(res);

                }




            })


        })



////////////////Search by BY comobox/////////////////////////



        $("#Arc_Fid").on('change',function () {

            var tr='';
            $("#ListEmp").empty();
            var code=$("#Arc_Fid").val();
            $.ajax({
                url:'{{url('Get_Project_Arc_Fid')}}',
                method:'get',
                data:{code:code},
                success:function (data) {
                    for (var i=0;i<data.length;i++)
                    {
                        tr+='<tr class="myfont"><td>'+data[i].Project_Code+'</td><td>'+data[i].Name+'</td><td>'+data[i].name+'</td><td>'+data[i].Year+'</td><td><a href="{{asset('storage/app/public/Archive')}}/'+data[i].Project_File+'" ><span class="fa fa-download"></span></a></td></tr>' ;
                    }

                    $("#ListEmp").append(tr);

                },
                error:function (res) {
                    console.log(res);

                }




            })


        })

// search by Company


        $("#Com_Fid").on('change',function () {

            var tr='';
            $("#ListEmp").empty();
            var code=$("#Com_Fid").val();
            $.ajax({
                url:'{{url('Get_Project_Arc_Com_Fid')}}',
                method:'get',
                data:{code:code},
                success:function (data) {
                    for (var i=0;i<data.length;i++)
                    {
                        tr+='<tr class="myfont"><td>'+data[i].Project_Code+'</td><td>'+data[i].Name+'</td><td>'+data[i].name+'</td><td>'+data[i].Year+'</td><td><a href="{{asset('storage/app/public/Archive')}}/'+data[i].Project_File+'" ><span class="fa fa-download"></span></a></td></tr>' ;
                    }

                    $("#ListEmp").append(tr);

                },
                error:function (res) {
                    console.log(res);

                }




            })


        })

    });


</script>




    @endsection