@extends('layouts.master')

@section('content')


<br>
    <div class="box box-info col-lg-12">
        <div class="box-header">
         لست ګزراش اجناس تسلیم شده
        </div>

        <div class="box-body">

            <div class="row">


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

                        <td>Veiw</td>

                    </tr>
                    </thead>
                    <tbody class="text-center" id="tblesubinvoice" >

@foreach($data as $key=>$rcd)


    @php

        $subpaymant=DB::table('subpaymant')->join('registerprocurement','registerprocurement.id','subpaymant.Pro_Fid')
                 ->select(DB::raw('sum(Inv_unit)as total'))



                 ->where('is_complete',0)
                 ->where('reject_id',0)
                 ->where('Pay_Fid',$rcd->id)
                 ->first();


    @endphp



                  <tr  @if( $subpaymant->total!=$rcd->Qunity) class="myfont text-red" @else class="myfont "@endif >
                        <td>{{++$key}}</td>
                        <td  style="font-size:11px" >{{$rcd->Details}}</td>
                        <td style="font-size:11px">{{$rcd->Qunity}} </td>
                        <td style="font-size:11px">{{$rcd->Unit_Price}} </td>
                      <td style="font-size:11px">{{$rcd->Amount}} </td>
                        <td style="font-size:11px">{{$rcd->Total_Price}} </td>
                        <td style="font-size:11px">{{$rcd->Discount}}</td>
                        <td style="font-size:11px">{{$rcd->Price_Distcount}} </td>

                        <td>
                            <a href="#" class="btn btn-xs btn-info"   data-id="{{$rcd->id}}"   data-toggle="modal" data-target="#View_Paymant_Modal"><i  class="fa fa-eye-slash"></i></a>
                            </td>

                        </tr>

@endforeach




                    </tbody>
                </table>
            </div>

            </div>

        </div>



    </div>

@include('Home.modal.View_Paymant_Model')



    <script>

        $(document).ready(function () {

            //Find Seach_Itme name





            //Find  sub item details with other attribute  by combpox  at project




















// find list  sub invoice ////////////


            $( "#tblesubinvoice" ).on( "click", ".btn-info", function() {

                $("#tb_linvlice_sub_Iist2").empty();
                var row='';
                var seriral=0;
               var Pay_Fid_val= $(this).data("id");

//second view to show belance supmanyt
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

                                '</tr>';

                        }
                        $("#tb_linvlice_sub_Iist2").html(row);


                    },
                    error:function (res) {
                        console.log(res);

                    }

                });


            });








        })



//check total unit at sub invoice

























    </script>




    @endsection
