<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{asset('public/css/bootstrap-theme.css')}} ">
<!-- Bootstrap rtl -->

<!-- Theme style -->


<script src="{{asset('public/jquery/dist/jquery.min.js')}}"></script>
<?php
$tot_unit=0;
$tot_price=0;
$tot_discount=0;
$total_price=0;
$total_after_discount=0;
$total_net_unite=0;
$total_net_belance=0;
$total_quntity=0;
$net=0;


?>
<table class="table table-bordered" style="font-size: x-small;" >
    <thead>

<tr>
    <td colspan="14" style="direction: rtl;font-size: medium; border: none;">
        {{$regisger_project->Project_Name}}

    </td>

</tr>
    <tr>
        <td>
Itme
        </td>
        <td >
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


@include('Subpaymant.header')

        <td>
            Unite Price
        </td>



        <td  style="text-align: center;border-left-color:red;">
          G.T.Price
        </td>

        <td>

          Unit Balance
        </td>

        <td>

            Price Balance
        </td>


    </tr>

    </thead>

    <tbody>

@foreach($data as $key=>$rcd)

    <tr style="text-align: center;vertical-align:middle;">
        <td>
          {{++ $key}}
        </td>
        <td >
            {{$rcd->Details}}
        </td>
        <td>
            {{$rcd->Qunity}}
            <?php
            $total_quntity+=$rcd->Qunity;
            ?>
        </td>
        <td>
            {{$rcd->Unit_Price}}
        </td>  <td>
            {{$rcd->Amount}}
        </td>
        <td>
           {{$rcd->Total_Price}}
            <?php
            $total_price+=$rcd->Total_Price;
            ?>
        </td>  <td>
            {{$rcd->Discount}}
        </td>
        <td style="text-align: center;border-right-color:red;">
            {{$rcd->Price_Distcount}}
            <?php
            $total_after_discount+=$rcd->Price_Distcount;
            ?>
        </td>

@php
$subpay=App\Subpaymant::where('Pay_Fid',$rcd->id)->orderBy('Inv_Type_Fid','asc')->get();


@endphp


        <?php
        $tot_unit=0;
        $tot_price=0;
        $tot_discount=0;


        ?>

        @for( $id=1; $id<=$Find_max; $id++)

            <td >
                @for( $i=0; $i<=$Find_max-1; $i++)
                    @if(isset($subpay[$i]))
                        @if($subpay[$i]['Inv_Type_Fid']==$id)
                            {{$subpay[$i]['Inv_unit']}}
                            <?php
                            $tot_unit+= $subpay[$i]['Inv_unit'];
                            ?>
                            @break

                        @else


                        @endif
                    @else
                        <span style="color: red;">0</span>
                        @break
                    @endif
                @endfor

            </td>
            <td >

                @for( $i=0; $i<=$Find_max-1; $i++)
                    @if(isset($subpay[$i]))
                        @if($subpay[$i]['Inv_Type_Fid']==$id)
                            {{$subpay[$i]['Inv_T_Price']}}
                            <?php
                            $tot_price+=$subpay[$i]['Inv_T_Price'];
                            ?>
                            @break

                        @else


                        @endif
                    @else
                        <span style="color: red;">0</span>
                        @break
                    @endif
                @endfor


            </td>
            <td style="text-align: center;border-right-color: red;">



                @for( $i=0; $i<=$Find_max-1; $i++)
                    @if(isset($subpay[$i]))
                        @if($subpay[$i]['Inv_Type_Fid']==$id)
                            {{$subpay[$i]['Inv_P_Distcount']}}
                            <?php
                            $tot_discount+=$subpay[$i]['Inv_P_Distcount'];
                            ?>
                            @break

                        @else


                        @endif
                    @else
                        <span style="color: red;">0</span>
                        @break
                    @endif
                @endfor

            </td>

        @endfor




        <td style="color:#0b2e13;">
           <?php

            $total_net_unite+=$tot_unit;
            echo $tot_unit; ?>
        </td>


        <td>
           <?php echo $net=$tot_discount; ?>
        </td>

        <td>

            <?php

            $total_net_belance+=$rcd->Qunity-$tot_unit;
            echo  $rcd->Qunity-$tot_unit; ?>
        </td>

        <td>

            <?php




            echo $Net_Total_Rrice=$rcd->Total_Price-$net ?>
        </td>


    </tr>

@endforeach

    <tr class="text-center text-bold">
        <td style="border: none;"></td>
        <td style="border: none;"></td>
        <td style="font-weight: bold;">{{$total_quntity}}</td>
        <td style="border: none;"></td>
        <td style="border: none;"></td>
        <td style="font-weight: bold;">{{$total_price}}</td>
        <td></td>

        <td style="font-weight: bold;">{{$total_after_discount}}</td>

        @for( $i=0; $i<=$Find_max-1; $i++)
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>

        @endfor

        <td style="font-weight: bold;">{{$total_net_unite}}</td>
        <td style="border: none;"></td>
        <td style="font-weight: bold;">{{$total_net_belance}}</td>

    </tr>

    </tbody>
</table>




