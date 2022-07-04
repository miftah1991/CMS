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
                <div class="col-lg-12">
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

                </form>
            </div>
            <input type="text" id="Sreach_Itme" name="Sreach_Itme" class="form-control"  >

            <div class="col-lg-12" style="overflow-y:scroll;height:500px;">
                <table class="table table-bordered table-hover text-center" >
                    <thead class="text-center">
                    <tr>


                    </tr>
                    <tr style="vertical-align:middle;"  >
                        <td>شماره</td>
                        <td >Item</td>
                        <td>Qunity</td>

                        <td>Unit_Price</td>
                        <td>Amount</td>
                        <td>Total_Price</td>
                        <td>Discount</td>
                        <td>Price_Distcount</td>
                        <td>Add</td>
                        <td>Veiw</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                    </thead>
                    <tbody class="text-center" id="tblesubinvoice" >

                    </tbody>
                </table>
            </div>



        </div>



    </div>


@include('Paymant.modal.Sub_Paymant_Model')
@include('Paymant.modal.View_Paymant_Model')



    <script>

        $(document).ready(function () {

            //Find Seach_Itme name

            $("#Sreach_Itme").on('keyup',function () {

                var tr='';
                 var num=0;

                $("#tblesubinvoice").empty();
                var string =$("#Sreach_Itme").val();


                $.ajax({
                    url:'{{url('Find_Sreach_Itme')}}',
                    method:'get',
                    data:{val:string},
                    success:function (data) {
                        for (i = 0; i < data.length; i++) {

                            tr += '<tr style="vertical-align:middle;">' +
                                '<td>' + (++num) + '</td>' +
                                '<td  >' + data[i].Details + '</td>' +
                                '<td style="vertical-align:middle;">' + data[i].Qunity + '</td>' +
                                '<td>' + data[i].Unit_Price + '</td>' +
                                '<td>' + data[i].Amount + '</td>' +
                                '<td>' + data[i].Total_Price + '</td>' +
                                '<td>' + data[i].Discount + '</td>' +
                                '<td>' + data[i].Price_Distcount + '</td>' +
                                '<td>' +
                                '<a href="#" class="btn btn-xs btn-primary"   data-id= "'+data[i].id +'"  data-qunity= "'+data[i].Qunity +'"   data-toggle="modal" data-target="#Sub_Paymant_Modal"><i  class="fa fa-plus"></i></a>' +
                                '</td>' +
                                '<td>' +
                                '<a href="#" class="btn btn-xs btn-info"   data-id= "'+data[i].id +'"   data-toggle="modal" data-target="#View_Paymant_Modal"><i  class="fa fa-envelope-open"></i></a>' +
                                '</td>' +
                                '<td>' +
                                '<a href="{{url('Edit_Paymany')}}/'+data[i].id+'"   class="btn btn-xs btn-success"  ><i  class="fa fa-pencil"></i></a>' +
                                '</td>' +
                                '</tr>';

                        }
                        $("#tblesubinvoice").html(tr);
                    },
                    error:function (res) {
                        console.log(res);

                    }

                })


            })


            $('#spain').hide();

            $('#blink').hide();
            $('#spainwar').hide();



            //Find  sub item details with other attribute  by combpox  at project

            $('#Pro_Fid').on('change',function () {
                var val = $('#Pro_Fid').val();

$("#Pro_Fid").val(val);
                //find subinvoice list
                var tr = '';
                var num=0;
                $("#tblesubinvoice").empty();
                $.ajax({

                    url: '{{url('Find_SubInvoice_List')}}',
                    method: 'get',
                    data: {id: val},
                    success: function (data) {

                        for (i = 0; i < data.length; i++) {

                            tr += '<tr  id="td_'+data[i].id+'" class="myfont">' +
                                '<td>' + (++num) + '</td>' +
                                '<td  style="font-size:11px" >' + data[i].Details + '</td>' +
                                '<td style="font-size:11px">' + data[i].Qunity + '</td>' +
                                '<td style="font-size:11px">' + data[i].Unit_Price + '</td>' +
                                '<td style="font-size:11px">' + data[i].Amount + '</td>' +
                                '<td style="font-size:11px">' + data[i].Total_Price + '</td>' +
                                '<td style="font-size:11px">' + data[i].Discount + '</td>' +
                                '<td style="font-size:11px">' + data[i].Price_Distcount + '</td>' +
                                '<td>' +
                                '<a href="#" class="btn btn-xs btn-primary"   data-id="'+data[i].id +'"  data-amount="'+data[i].Amount+'" data-totalPrice="'+data[i].Total_Price+'" data-qunity= "'+data[i].Qunity +'"   data-toggle="modal" data-target="#Sub_Paymant_Modal"><i  class="fa fa-plus"></i></a>' +
                                '</td>' +
                                '<td>' +
                                '<a href="#" class="btn btn-xs btn-info"   data-id= "'+data[i].id +'"    data-toggle="modal" data-target="#View_Paymant_Modal"><i  class="fa fa-eye-slash"></i></a>' +
                                '</td>' +
                                '<td>' +
                                '<a href="{{url('Edit_Paymany')}}/'+data[i].id+'"   class="btn btn-xs btn-success"  ><i  class="fa fa-pencil"></i></a>' +
                                '</td>' +
                                '<td >' +
                                '<span class="btn btn-danger btn-xs" data-id='+data[i].id+'><i  class="fa fa-remove"></i></span>' +
                                '</td>' +
                                '</tr>';

                        }
                        $("#tblesubinvoice").html(tr);

                    },
                    error: function (data) {
                        console.log(data);

                    }


                });


            });





     //Delete Payment


            $( "#tblesubinvoice" ).on( "click", ".btn-danger", function() {
                var Delete_id = $(this).data("id");
                $.ajax({
            url:'{{url('Delete_Paymant')}}',
                    method: 'get',
                    data: {id: Delete_id},
                    success: function (data) {
                        if (data == true) {

                            $("#td_" + Delete_id).remove();

                        }
                    }

});

            });







// fill hiden attribute   add button

            $( "#tblesubinvoice" ).on( "click", ".btn-primary", function() {

                $("#Pay_Fid").val($(this).data("id")) ;
                $("#Total_Price").val( $(this).data("totalprice"));
                $("#Amount").val($(this).data("amount")) ;

                $("#Qunity").val($(this).data("qunity")) ;

                $("#project_Fid").val($("#Pro_Fid").val()) ;
                $("#Inv_Type_Fid").val('');
            });


            // insert data to database  by  model
$("#btnsave").on('click',function () {

    $('#spain').show();

    var Pay_Fid=$("#Pay_Fid").val();

    var Pro_Fid = $('#project_Fid').val();
    var Inv_Type_Fid = $('#Inv_Type_Fid').val();
    var Inv_unit = $('#Inv_unit').val();
    var Total_Price = $('#Total_Price').val();
    var Inv_P_Distcount = $('#Inv_P_Distcount').val();

    var Net_Amount = $('#Net_Amount').val();
    if(Pay_Fid!="" && Pro_Fid!="" && Inv_Type_Fid!="" && Inv_unit!="" && Total_Price!=""  && Inv_P_Distcount!=""  ){
        $.ajax({


            url: '{{url('Add_Sub_Paymant')}}',
            type: "POST",
            data: {
                _token: $("#csrf").val(),
                Pay_Fid:Pay_Fid,
                Pro_Fid:Pro_Fid,
                Inv_Type_Fid: Inv_Type_Fid,
                Inv_unit: Inv_unit,
                Inv_T_Price: Total_Price,
                Inv_P_Distcount: Inv_P_Distcount,
            },
            cache: false,
            success: function(dataResult){
                console.log(dataResult);
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    $('#Inv_unit').val('');
                    $('#Total_Price').val('');
                    $('#Inv_P_Distcount').val('');

                    setTimeout(function(){$('#spain').hide();}, 1000);
                    $("#Inv_Type_Fid").val('');

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





            $("#Inv_unit").on('keyup',function () {

                var InVal=$("#Inv_unit").val();
                var Total_Price=$("#Total_Price").val();
                var Amount=$("#Amount").val();
                var Tot=parseFloat(InVal)*parseFloat(Total_Price);
           $("#Inv_T_Price").val(Tot);

        var total=parseFloat(InVal)*parseFloat(Amount);






                $("#Inv_P_Distcount").val(total);

            });






            //find duplicate record by Invoice type
            $("#Inv_Type_Fid").on('change',function () {
                var Inv_Type_Fid= $("#Inv_Type_Fid").val();
                var  Pay_Fid= $("#Pay_Fid").val();
                var  project_Fid=$("#project_Fid").val();
                $.ajax({
                    url:'{{url('Find_Duplicate_Invoice_Type')}}',
                    method:'get',
                    data:{Inv_Type_Fid:Inv_Type_Fid,Pay_Fid:Pay_Fid,project_Fid:project_Fid},
                    success:function (res) {

                        if(res.length>0)
                        {



                            $('#blink').show();
                            $('#spainwar').show();
                            $('#btnsave').attr('disabled','true');


                        }
                        else
                        {
                            $('#blink').hide();
                            $('#spainwar').hide();
                            $('#btnsave').removeAttr("disabled");


                        }


                    }




                })


            })

// find list  sub invoice ////////////


            $( "#tblesubinvoice" ).on( "click", ".btn-info", function() {
                $("#tb_linvlice_sub_Iist").empty();
                var row='';
                var seriral=0;
               var Pay_Fid_val= $(this).data("id");
                $.ajax({
                    url:'{{url('Find_Sub_Invoice_List')}}',
                    method:'get',
                    data:{Pay_Fid:Pay_Fid_val},
                    success:function (data) {

                        for (i = 0; i < data.length; i++) {

                            row += '<tr id="rowid_'+data[i].id +'">' +
                                '<td>' + (++seriral) + '</td>' +
                                '<td>' + data[i].name + '</td>' +
                                '<td>' + data[i].Inv_unit + '</td>' +
                                '<td>' + data[i].Inv_T_Price + '</td>' +
                                '<td>' + data[i].Inv_P_Distcount + '</td>' +

                                '<td>' +
                                '<a href="#" class="btn btn-danger"   data-id= "'+data[i].id +'" "><i  class="fa fa-remove"></i></a>' +
                                '</td>' +
                                '</tr>';

                        }
                        $("#tb_linvlice_sub_Iist").html(row);


                    },
                    error:function (res) {
                        console.log(res);

                    }

                    });


            });


         //Delete sub_Invoice from mdoal

            $( "#tb_linvlice_sub_Iist" ).on( "click", ".btn-danger", function() {


                var Delete_id = $(this).data("id");

                $.ajax({
                    url: '{{url('Delete_Sub_Invoice_List')}}',
                    method: 'get',
                    data: {id: Delete_id},
                    success: function (data) {
                        if(data==true)
                        {


                            $("#rowid_"+Delete_id).remove();

                        }

                    }
                })
            });





        })



//check total unit at sub invoice


$("#Inv_unit").on('keyup',function() {
    var vale=parseInt($("#Inv_unit").val());

     var Qunity=parseInt($("#Qunity").val());

    var  Pay_Fid= $("#Pay_Fid").val();
    $.ajax({

        url:'{{'Find_Total_Unite_Sub_Invoice'}}',
        method:'get',
        data:{Pay_Fid:Pay_Fid},
        success:function (res) {
         var tot=parseInt(res);
         var total=tot+vale;
         console.log(total);
         console.log(Qunity);
         if(total >Qunity)
         {

             alert('این تعداد ایوانس بالا است')

             $("#btnsave").attr("disabled", true);
             $("#btnsave").attr("class", 'btn btn-danger');
             $("#Inv_unit").val('');
             $('#Inv_P_Distcount').val('');
         }
         else
         {
             $('#btnsave').removeAttr("disabled");
             $("#btnsave").attr("class", 'btn btn-primary');
         }


        },
        error:function (res) {
            console.log(res);

        }

    })













});










    </script>




    @endsection
