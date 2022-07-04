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
          لیست تعدیلات
        </div>

        <div class="box-body">


            <table class="table table-bordered table-hover text-center" id="tblextand">
                <thead class="text-center">
                <tr >
                    <th>شماره</th>
                    <th>کود پروژه</th>
                    <th>ثپت تاریخ</th>


                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody class="text-center myfont">
                @foreach($data as $key=>$rcd)
                <tr >
                    <td>{{++$key}}</td>
                    <td>@isset($rcd->Pro_Code)  {{$rcd->Pro_Code}} @endif</td>
                    <td>@isset($rcd->Project_Name){{$rcd->Project_Name}}  @endif</td>


                    <td>
                         <a href="View_Extand_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-barcode btn btn-info"> </i></a>


                    </td>
                    @endforeach

                </tbody>
            </table>


        </div>



    </div>





    <script>

        $(document).ready(function () {



            $("#tblextand").dataTable();



            setTimeout(function(){

                $('#exampleModal').hide("modal");
                $('#exampleModal').addClass("hide");


            }, 2000);




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
