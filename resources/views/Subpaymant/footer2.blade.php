

    <td>
@for( $i=0; $i<=4; $i++)
       @if(isset($subpay[$i]))
        @if($subpay[$i]['Inv_Type_Fid']==1)
        {{$subpay[$i]['Inv_unit']}}
            @break

           @else


            @endif
            @else
           00
           @break
           @endif
@endfor

    </td>
    <td>

        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
            @if($subpay[$i]['Inv_Type_Fid']==1)
                {{$subpay[$i]['Inv_T_Price']}}
                @break

            @else


            @endif
            @else
                00
                @break
            @endif
        @endfor


    </td>
    <td>



            @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
                @if($subpay[$i]['Inv_Type_Fid']==1)
                    {{$subpay[$i]['Inv_P_Distcount']}}
                    @break

                @else


                @endif
            @else
                00
                @break
            @endif
            @endfor

    </td>


    <td>

        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
            @if($subpay[$i]['Inv_Type_Fid']==2)
                {{$subpay[$i]['Inv_unit']}}
                @break

            @else

            @endif
            @else
                00
                @break
            @endif
        @endfor



    </td>
    <td>

        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
            @if($subpay[$i]['Inv_Type_Fid']==2)
                {{$subpay[$i]['Inv_T_Price']}}
                @break

            @else


            @endif
            @else
                00
                @break
            @endif
        @endfor


    </td>
    <td>
        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
            @if($subpay[$i]['Inv_Type_Fid']==2)
                {{$subpay[$i]['Inv_P_Distcount']}}
                @break

            @else


            @endif
            @else
                00
                @break
            @endif
        @endfor


    </td>

    <td>
        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
            @if($subpay[$i]['Inv_Type_Fid']==3)
                {{$subpay[$i]['Inv_unit']}}
                @break

            @else


            @endif
            @else
                00
                @break
            @endif
        @endfor


    </td>
    <td>

        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
            @if($subpay[$i]['Inv_Type_Fid']==3)
                {{$subpay[$i]['Inv_T_Price']}}
                @break

            @else


            @endif
            @else
                00
                @break
            @endif
        @endfor

    </td>
    <td>
        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
            @if($subpay[$i]['Inv_Type_Fid']==3)
                {{$subpay[$i]['Inv_P_Distcount']}}
                @break

            @else


            @endif
            @else
                00
                @break
            @endif
        @endfor


    </td>



    <td>
        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
            @if($subpay[$i]['Inv_Type_Fid']==4)
                {{$subpay[$i]['Inv_unit']}}
                @break

            @else


            @endif
            @else
                00
                @break
            @endif
        @endfor


    </td>
    <td>
        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
            @if($subpay[$i]['Inv_Type_Fid']==4)
                {{$subpay[$i]['Inv_T_Price']}}
                @break

            @else


            @endif
            @else
                00
                @break
            @endif
        @endfor

    </td>
    <td>
        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
            @if($subpay[$i]['Inv_Type_Fid']==4)
                {{$subpay[$i]['Inv_P_Distcount']}}
                @break

            @else


            @endif
            @else
                00
                @break
            @endif
        @endfor


    </td>


    <td>
        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
                @if($subpay[$i]['Inv_Type_Fid']==5)
                    {{$subpay[$i]['Inv_unit']}}
                    @break

                @else


                @endif
            @else
                00
                @break
            @endif
        @endfor


    </td>
    <td>
        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
                @if($subpay[$i]['Inv_Type_Fid']==5)
                    {{$subpay[$i]['Inv_T_Price']}}
                    @break

                @else


                @endif
            @else
                00
                @break
            @endif
        @endfor

    </td>
    <td>
        @for( $i=0; $i<=4; $i++)
            @if(isset($subpay[$i]))
                @if($subpay[$i]['Inv_Type_Fid']==5)
                    {{$subpay[$i]['Inv_P_Distcount']}}
                    @break

                @else


                @endif
            @else
                00
                @break
            @endif
        @endfor


    </td>