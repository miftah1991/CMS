@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">

    <div class="panel panel-danger ">
        <div class="panel-heading">
            <div class="panel-title text-center"> تغیر کردن اجناس پروژه</div>

        </div>
        <form >
            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
        <div class="panel-body">
            <div class="row">
                <div class="fa fa-spinner  fa-spin fa-3x fa-fw" style="color:green;" id="spain"></div>
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>لیست پروژه منظور شده</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>
<input type="hidden" name="id" id="id" value="{{$data->id}}">
                            <select name="Pro_Fid" id="Pro_Fid"  required class="form-control">
                                <option value="">لطفا پروژه انتخاب کنید</option>
                                @foreach($register_project as $rcd)

                                    <option value="{{$rcd->id}}" @if($data->Pro_Fid=$rcd->id) selected="selected" @endif >{{$rcd->Project_Name}}</option>
                                @endforeach

                            </select>

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
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

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>اسم شرکت قرارداد کننده</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-university"></i>
                            </div>

                            <input type="text" name="name" id="Name" readonly class="form-control myfont "  >

                        </div>

                    </div>

                </div>
                <div class="col-lg-4">
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
            </div>

            <div class="row">




                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>تشریحات اجناس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="text" name="Details" value="{{$data->Details}}"  id="Details" class="form-control myfont " >

                        </div>

                    </div>
                </div>

            </div>

            <div class="row">


                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>Quntity</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-open"></i>
                            </div>


                            <input type="text"  name="Qunity"  value=" {{$data->Qunity}}"  id="Qunity" class="form-control myfont MulQuntity " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>Unite Price </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-open"></i>
                            </div>


                            <input type="text" name="Unit_Price"   value="{{$data->Unit_Price}}"  id="Unit_Price" class="form-control  MulQuntity  myfont numbers" >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>Total Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Total_Price" value="{{$data->Total_Price}}" id="Total_Price" class="form-control myfont numbers " >

                        </div>

                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>Discount</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Discount" value="{{$data->Discount}}" id="Discount" max="100" readonly class="form-control myfont numbers " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label></label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Amount" value="{{$data->Amount}}"  id="Amount" class="form-control myfont numbers " >

                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>Price After Discount</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Price_Distcount" value="{{$data->Price_Distcount}}" id="Price_Distcount" class="form-control myfont numbers " >

                        </div>

                    </div>
                </div>
            </div>







                    </div>
<div class="panel-footer">

    <input type="button" value=" تغیر کردن" id="btn_update" class="btn btn-primary">


</div>
        </form>

   <div class="row">
       <div class="col-lg-12" style="overflow-y:scroll;height:500px;">

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
                   <th>Edit </th>
               </tr>
               </thead>
               <tbody class="text-center" id="tblesubinvoice">



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

   /*     $(".numbers").each(function() {
            $(this).format({format:"#,###", locale:"us"});
        });
*/
        $('#spain').hide();


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
                    $('#Email').val(response.Email);
                    $('#Jawaz').val(response.Jawaz);


                }









            });

            //find subinvoice list
            var tr='';
            $("#tblesubinvoice").empty();
                     $.ajax({

                url: '{{url('Find_SubInvoice_List')}}',
                method: 'get',
                data: {id: val},
                success: function (data) {

                    for( i=0;i<data.length;i++)
                    {

                        tr+='<tr class="myfont"><td>'+i+'</td><td>'+data[i].Details+'</td><td>'+data[i].Qunity+'</td><td>'+data[i].Unit_Price+'</td><td>'+data[i].Amount+'</td><td>'+data[i].Total_Price+'</td><td>'+data[i].Discount+'</td><td>'+data[i].Price_Distcount+'</td><td><a href="{{url('Edit_Paymany')}}/'+data[i].id+'"   class="btn btn-xs btn-success"  ><i  class="fa fa-pencil"></i></a></td></tr>';

                    }
                    $("#tblesubinvoice").append(tr);

                },
                error:function (data) {
                    console.log(data);

                }









            });



            $.ajax({

                url: '{{url('Find_Code')}}',
                method: 'get',
                data: {id: val},
                success: function (response) {
                    $('#Ano_Fid').val(response.id);

                    $('#Project_Code').val(response.Pro_Code);

                }

            })








        });

        $('#Save_Date').persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });


        //view and add sub paymant modal






$(".MulQuntity").on('keyup',function () {

    var QVal=$("#Qunity").val();
    var UnitVal=$("#Unit_Price").val();
    var Tot=parseFloat(QVal)*parseFloat(UnitVal);
    $("#Total_Price").val(Tot);


});

        $(".MulQuntity").on('keyup',function () {

            var TotVal=$("#Total_Price").val();
            var DisVal=$("#Discount").val();
            var Net_Price=parseFloat(TotVal)-(parseFloat(TotVal) * parseFloat(DisVal)/100);
           // alert(Net_Price);
            $("#Price_Distcount").val(Net_Price);

            var UnitVal=$("#Unit_Price").val();
            var Net_Amount=parseFloat(UnitVal)-(parseFloat(UnitVal)*parseFloat(DisVal)/100);
              $("#Amount").val(Net_Amount);


        });


        $("#Inv_unit").on('keyup',function () {

            var InVal=$("#Inv_unit").val();
            var UnitVal=$("#Unit_Price").val();
            var Tot=parseFloat(InVal)*parseFloat(UnitVal);
            $("#Inv_T_Price").val(Tot);

         var InvTot=parseFloat( $("#Amount").val()* parseFloat( InVal));



            $("#Inv_P_Distcount").val(InvTot);

        });




    })







    $("#btn_update").on('click',function () {

        $('#spain').show();

        var Qunity=$("#Qunity").val();
            var id=$("#id").val();
        var Unit_Price = $('#Unit_Price').val();
        var Amount = $('#Amount').val();
        var Total_Price = $('#Total_Price').val();
        var Discount = $('#Discount').val();
        var Price_Distcount = $('#Price_Distcount').val();
        var Details = $('#Details').val();
        var Save_Date = $('#Save_Date').val();
        var Pro_Fid = $('#Pro_Fid').val();
        if(Unit_Price!="" && Qunity!="" && Amount!="" && Total_Price!="" && Discount!=""  && Price_Distcount!="" && Details!=""  && Save_Date!=""  && Pro_Fid!=""  ){
            $.ajax({


                url: '{{url('Update_Paymant')}}',
                type: "POST",
                data: {
                    _token: $("#csrf").val(),
                    Unit_Price:Unit_Price,
                    id:id,
                    Qunity:Qunity,
                    Total_Price:Total_Price,
                    Amount: Amount,
                    Discount: Discount,
                    Price_Distcount: Price_Distcount,
                    Details:Details,
                    Save_Date: Save_Date,
                    Pro_Fid: Pro_Fid,
                },
                cache: false,
                success: function(dataResult){
                    console.log(dataResult);
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $('#Unit_Price').val('');
                        $('#Amount').val('');
                        $('#Total_Price').val('');
                        $('#Discount').val('');
                        $('#Price_Distcount').val('');
                        $('#Details').val('');
                        $('#Save_Date').val('');


                        setTimeout(function(){$('#spain').hide();}, 1000);
                        var referrer =  document.referrer;
                        window.location.href = referrer;

                    }
                    else if(dataResult.statusCode==201){
                        alert("Error occured !");
                    }

                },
                error:function (res) {

                    console.log(res);
                }

            })
        }
        else{
            alert('Please fill all the field !');
        }



    })






</script>




    @endsection
