@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">

        <div class="anel panel-danger ">

        <div class="panel-heading">
            <div class="panel-title text-center"> ثپت فصیدی</div>

        </div>
            <form method="POST"  action="{{url('Add_Persantage')}}" id="upload_image_form" enctype="multipart/form-data"   >
            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
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
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>کود پروژه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Project_Code" readonly id="Project_Code" class="form-control myfont "  >

                        </div>

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>اسم شرکت برند</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-university"></i>
                            </div>

                            <input type="text" name="name" id="Name" readonly class="form-control "  >

                        </div>

                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>شماره تماس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>

                            <input type="text" name="Phone" readonly id="Phone" class="form-control myfont "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>ثپت تاریخ</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Date"  autocomplete="off" required id="Date" class="form-control "  >

                        </div>

                    </div>
                </div>
            </div>

            <div class="row">




                <div class="col-lg-6">
                    <div class="form-group ">
                        <label>تشریح پرداخت</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="text" name="Per_Name" id="Per_Name" autocomplete="off" class="form-control  " >

                        </div>

                    </div>
                </div>




                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>فیصدی</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-open"></i>
                            </div>


                            <input type="number"  name="Persantage"  min="1" max="100"  id="Persantage" autocomplete="off" class="form-control MulQuntity myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>بودجه پروژه </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-open"></i>
                            </div>


                            <input type="text" name="Amount"  id="Amount"  autocomplete="off"  class="form-control  MulQuntity myfont " >

                        </div>

                    </div>
                </div>



            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>فیصدی مجموعه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Net_Amount" id="Net_Amount" autocomplete="off" class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>تضمین</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                           <input type="file" name="warrenty" id="warrenty" class="form-control">

                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group ">
                        <label>ملاحضات</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="remark"  id="remark" class="form-control">

                        </div>

                    </div>
                </div>

            </div>








                    </div>
<div class="panel-footer">

    <input type="submit" value="  ثپت کردن" id="butsave" class="btn btn-primary">


</div>
    </form>
    </div>

</div>
<div class="col-lg-12">
<table class="table table-bordered" >
<thead>
<tr style="background-color: #9d9d9d;text-align: center;">

    <th>شماره</th>
    <th>نوع پرداخت فیصدی</th>
    <th>تاریخ</th>
    <th>فیصدی</th>
    <th>بودجه</th>
    <th> بودجه مصرف</th>
    <th> حالت</th>
    <th>حدف </th>

</tr>
</thead>

    <tbody id="persantage" style="background-color: white;">


    </tbody>

</table>
</div>
<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>

<script>





    $(document).ready(function () {

        $("#Pro_Fid").select2({

            allowClear: true
        });





        $('#Pro_Fid').on('change',function () {
            var val = $('#Pro_Fid').val();

            $.ajax({

                url: '{{url('Find_Complain_Company')}}',
                method: 'get',
                data: {id: val},
                success: function (response) {
                    console.log(response);
                    $('#Name').val(response.Name);
                    $('#Phone').val(response.Phone);


                }


            });


            $.ajax({

                url: '{{url('Find_Code')}}',
                method: 'get',
                data: {id: val},
                success: function (response) {


                    $('#Project_Code').val(response.Pro_Code);
                    $('#Amount').val(response.Accepts_Fund);



                }

            })


            $("#persantage").empty();
            var tr=''
            var n=1;
            var tot=0;
            $.ajax({

                url:'Get_Perstange',
                type:'get',
                data:{id:val},
                success:function (data) {
                    for(var i=0;i<data.length;i++)
                    {
                        tot=tot+parseInt(data[i].Persantage);


                    }
                    for(var i=0;i<data.length;i++)
                    {

                        if(tot<100)

                        {
                            tr+='<tr style="text-align: center" class="myfont"><td>'+(++n)+'</td><td>'+data[i].Per_Name+'</td><td>'+data[i].Date+'</td><td>'+data[i].Persantage+ '%'+'</td><td>'+data[i].Amount+'</td><td>'+data[i].Net_Amount+'</td><td><span style="color:red" class="fa fa-battery-1"></span></td><td><a href="Delete_Persantage\\'+ data[i].id+'"><span class="btn btn-danger"></span></a> </td></tr>' ;

                        }
                        else
                        {
                            tr+='<tr style="text-align: center" class="myfont"><td>'+(++n)+'</td><td>'+data[i].Per_Name+'</td><td>'+data[i].Date+'</td><td>'+data[i].Persantage+ '%'+'</td><td>'+data[i].Amount+'</td><td>'+data[i].Net_Amount+'</td><td><span style="color:green" class="fa fa-check-square-o"></span></td><td><a href="Delete_Persantage\\'+ data[i].id+'"><span class="btn btn-danger"></span></a> </td></tr>' ;

                        }


                    }

                    $("#persantage").append(tr);

                }


            });






        });

        $('#Date').persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });




        $("#Persantage").on('keyup',function () {

            var val = $('#Pro_Fid').val();
              var pers=parseInt($('#Persantage').val())

            $.ajax({

                url: '{{url('Find_Total_Persantage')}}',
                method: 'get',
                data: {id: val},
                success: function (response) {

                  var sum=parseInt(response);
                  var total=sum+pers;
                  if(total>100)
                  {
                      alert('این فیصد بالا است')

                      $("#butsave").attr("disabled", true);
                      $("#butsave").attr("class", 'btn btn-danger');
                  }
                    else
                  {
                      $("#butsave").attr("disabled", false);
                      $("#butsave").attr("class", 'btn btn-info');

                  }




                }

            })







            var Persantage=$("#Persantage").val();
            var Amount=$("#Amount").val();
            var Net_Amount=parseFloat(Persantage)*(parseFloat(Amount)/100);

            $("#Net_Amount").val(Net_Amount);



        });














        $('#butsave').on('click', function() {

     /*       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            var Date = $('#Date').val();
            var Persantage = $('#Persantage').val();
            var Pro_Fid = $('#Pro_Fid').val();
            var Amount = $('#Amount').val();
            var Per_Name = $('#Per_Name').val();
            var Net_Amount = $('#Net_Amount').val();
            var remark = $('#remark').val();
            var warrenty = $('#warrenty').val();
            if(Date!="" && Persantage!="" && Pro_Fid!="" && Amount!="" && Per_Name!="" && Net_Amount!=""){

                $.ajax({
                    url: '{{url('Add_Persantage')}}',
                    type: "POST",
                    data: {
                        _token: $("#csrf").val(),
                        type: 1,
                        Date: Date,
                        Persantage: Persantage,
                        Pro_Fid:Pro_Fid,
                        Amount: Amount,
                        Per_Name: Per_Name,
                        Net_Amount:Net_Amount,
                        warrenty:warrenty,
                        remark: remark,
                        cache:false,
                        contentType: false,
                        processData: false
                    },
                    cache: false,
                    success: function(dataResult){
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){

                            $('#Date').val('');
                         $('#Persantage').val('');
                           $('#Per_Name').val('');
                            $('#Net_Amount').val('');
                            $('#warrenty').reset();
                            alert("Your Record is Saved !");

                        }
                        else if(dataResult.statusCode==201){
                            alert("Error occured !");
                        }

                    },
                    error:function (res) {


                    }
                });
            }
            else{
                alert('Please fill all the field !');
            }
*/









            $("#persantage").empty();
            var tr=''
            var tot=0;
            var n=1;
            var id=$('#Pro_Fid').val();
            $.ajax({

                url:'Get_Perstange',
                type:'get',
                data:{id:id },
                success:function (data) {
                    for(var i=0;i<data.length;i++)
                    {
                        tot=tot+parseInt(data[i].Persantage);


                    }
                    for(var i=0;i<data.length;i++)
                    {

                        if(tot<100)

                        {
                            tr+='<tr style="text-align: center" class="myfont"><td>'+(++n)+'</td><td>'+data[i].Per_Name+'</td><td>'+data[i].Date+'</td><td>'+data[i].Persantage+ '%'+'</td><td>'+data[i].Amount+'</td><td>'+data[i].Net_Amount+'</td><td><span style="color:red" class="fa fa-battery-1"></span></td><td><a href="Delete_Persantage\\'+ data[i].id+'"><span class="btn btn-danger"></span></a> </td></tr>' ;

                        }
                        else
                        {
                            tr+='<tr style="text-align: center" class="myfont"><td>'+(++n)+'</td><td>'+data[i].Per_Name+'</td><td>'+data[i].Date+'</td><td>'+data[i].Persantage+ '%'+'</td><td>'+data[i].Amount+'</td><td>'+data[i].Net_Amount+'</td><td><span style="color:green" class="fa fa-check-square-o"></span></td><td><a href="Delete_Persantage\\'+ data[i].id+'"><span class="btn btn-danger"></span></a> </td></tr>' ;

                        }


                    }

                    $("#persantage").append(tr);

                }


            });







        });




















    });



    function show()
    {


        $('#rm').parent().parent().remove();

    }

</script>




    @endsection
