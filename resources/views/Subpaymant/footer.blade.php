

@for( $id=1; $id<=$Find_max; $id++)
    <td>
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
    <td>

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
    <td>



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
