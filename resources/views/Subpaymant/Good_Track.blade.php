@extends('layouts.master')

@section('content')


<br>
    <div class="box box-info col-lg-12">
        <div class="box-header">
          لست اجناس تسلیم شده
        </div>

        <div class="box-body">

            <div class="row">
                <form action="{{url('Find_Track')}}" method="post">
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
    <input type="submit" value="جستجو" class="btn btn-info">
</div>
                </form>
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
