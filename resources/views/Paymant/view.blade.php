<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{asset('public/css/bootstrap-theme.css')}} ">
<!-- Bootstrap rtl -->

<!-- Theme style -->


<script src="{{asset('public/jquery/dist/jquery.min.js')}}"></script>

<table class="table table-bordered" style="font-size: x-small;" >
    <thead>

    <tr>
        <td> <a href="{{url('List_Paymant')}}">واپس</a> </td>
    </tr>

    <tr style="text-align: center;">
        <td  colspan="8" style="background-color: yellow">
{{$Project_Name->Project_Name}}
        </td>
        <td colspan="3">
        Invoice No:1
        </td>
        <td colspan="3">
            Invoice No:2
        </td>

        <td colspan="3">
            Invoice No:3
        </td>
        <td colspan="3">
            Invoice No:4
        </td>
        <td colspan="5">
           Grand

        </td>
    </tr>
    <tr>
        <td>
Itme
        </td>
        <td style="background-color: green;">
Description
        </td>
        <td>
Quntity
        </td>
        <td>
Unite Price
        </td>  <td>

        </td>
        <td>
Total price
        </td>  <td>
Discount
        </td>
        <td>
Price After Discount
        </td>
        <td style="background-color: #3f729b;color:white; ">
Unite
        </td>
        <td style="background-color: #3f729b;color:white; ">
T.Price
        </td>
        <td style="background-color: #3f729b;color:white; ">
P.After.Discount
        </td>
        <td style="background-color: #985f0d;color:white; ">
Unite
        </td>
        <td style="background-color: #985f0d;color:white; ">
T.Price
        </td>
        <td style="background-color: #985f0d;color:white; ">
            P.After.Discount
        </td>

        <td style="background-color: #9d9d9d;color:white;">
           Unite
        </td>
        <td style="background-color: #9d9d9d;color:white;">
            T.Price
        </td>
        <td style="background-color: #9d9d9d;color:white;">
            P.After.Discount
        </td>
        <td style="background-color: #80bdff;color:black;">
            Unite
        </td>
        <td style="background-color: #80bdff;color:black;">
            T.Price
        </td>
        <td style="background-color: #80bdff;color:black;">
            P.After.Discount
        </td>
        <td>
          T Unit
        </td>
        <td>
          G.T.Price
        </td>
        <td>
          Unit Balance
        </td>
        <td>
            Price Balance
        </td>
        <td>
            Price Blance.After.Discount
        </td>
    </tr>

    </thead>

    <tbody>
    @php
    $In1=0;
    $In2=0;
    $In3=0;
    $In4=0;

    @endphp
@foreach($data as $key=>$rcd)
    @php
        $In1=0;
        $In2=0;
        $In3=0;
        $In4=0;
     $Price_Dis1=0;
$Price_Dis2=0;
    $Price_Dis3=0;
    $Price_Dis4=0;
    @endphp
    <tr style="text-align: center;">
        <td>
          {{++ $key}}
        </td>
        <td >
            {{$rcd->Details}}
        </td>
        <td>
            {{$rcd->Qunity}}
        </td>
        <td>
            {{$rcd->Unit_Price}}
        </td>  <td>
            {{$rcd->Amount}}
        </td>
        <td>
           {{$rcd->Total_Price}}
        </td>  <td>
            {{$rcd->Discount}}
        </td>
        <td>
            {{$rcd->Price_Distcount}}
        </td>
        <td style="background-color: #3f729b;color:white; ">
            @if($rcd->Inv_Type_Fid==1)
                {{$In1=$rcd->Inv_unit}}
            @else

              {{00}}
@endif



        </td>
        <td style="background-color: #3f729b;color:white; ">
            @if($rcd->Inv_Type_Fid==1)
                {{$rcd->Inv_T_Price}}
            @else

                {{00}}
            @endif

        </td>
        <td style="background-color: #3f729b;color:white; ">
            @if($rcd->Inv_Type_Fid==1)
                {{$Price_Dis1=$rcd->Inv_P_Distcount}}
            @else

                {{00}}
            @endif

        </td>
        <td style="background-color: #985f0d;color:white; ">
            @if($rcd->Inv_Type_Fid==2)
                {{$In2=$rcd->Inv_unit}}
            @else

                {{00}}
            @endif

        </td>
        <td style="background-color: #985f0d;color:white; ">
            @if($rcd->Inv_Type_Fid==2)
                {{$rcd->Inv_T_Price}}
            @else

                {{00}}
            @endif

        </td>
        <td style="background-color: #985f0d;color:white;">
            @if($rcd->Inv_Type_Fid==2)
                {{$Price_Dis2=$rcd->Inv_P_Distcount}}
            @else

                {{00}}
            @endif

        </td>

        <td style="background-color: #9d9d9d;color:white;">
            @if($rcd->Inv_Type_Fid==3)
                {{$In3=$rcd->Inv_unit}}
            @else

                {{00}}
            @endif

        </td>
        <td style="background-color: #9d9d9d;color:white;">
            @if($rcd->Inv_Type_Fid==3)
                {{$rcd->Inv_T_Price}}

            @else

                {{00}}
            @endif
        </td>
        <td style="background-color: #9d9d9d;color:white;">
            @if($rcd->Inv_Type_Fid==3)
                {{$Price_Dis3=$rcd->Inv_P_Distcount}}

            @endif
        <td style="background-color: #80bdff;color:black;">
            @if($rcd->Inv_Type_Fid==4)
                {{$In4=$rcd->Inv_unit}}

            @else

                {{00}}
            @endif
        </td>
        <td style="background-color: #80bdff;color:black;">
            @if($rcd->Inv_Type_Fid==4)
                {{$rcd->Inv_T_Price}}

            @else

                {{00}}
            @endif
        </td>
        <td style="background-color: #80bdff;color:black;">
            @if($rcd->Inv_Type_Fid==4)
                {{$Price_Dis4=$rcd->Inv_P_Distcount}}

            @else

                {{00}}
            @endif
        </td>
        <td>
          {{$Tot_Unit=$In1+$In2+$In3+$In4}}
        </td>
        <td>
            {{$Tot_Price_Dist=$Price_Dis1+$Price_Dis2+$Price_Dis3+$Price_Dis4}}
        </td>
        <td>
          {{$rcd->Qunity-$Tot_Unit}}
        </td>
        <td>
            {{$Net_Price= $rcd->Total_Price-$Tot_Price_Dist}}
        </td>
        <td>
         {{$Net_Price=($Net_Price*2.227207)}}
        </td>
    </tr>

@endforeach

    </tbody>
</table>




