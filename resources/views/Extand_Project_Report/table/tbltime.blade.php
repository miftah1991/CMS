
<script>


    var idtime=0;
    $(document).ready(function () {
/*

 var Pro_Fid=$("#Pro_Fid").val();
        var Extand_Type1=1;
 var Extand_Type2=2;
    $.ajax({

        url:'{{url('Find_Extand_Time')}}',
        method:'get',
        data:{Pro_Fid:Pro_Fid,Extand_Type:Extand_Type2},
        success:function (res) {

if(res.length>0)
{
    $("#bnttime").attr('disabled','true');
}


        }




    })
*/




        $("#bnttime").on('click',function () {







         //   $("#txt1_".id).val($("#monay").val());


if(idtime==0) {

    var tbl = ''

    tbl += '<table class="table table-bordered text-center"  style="border-color:orangered;"  id="tbltime" >' +

        '  <thead>' +
        '  <tr>' +
        '      <td colspan="5">' +

        '          تعدیلات دربخش زمان' +
        '      </td>' +
        '  </tr>' +
        '    <tr>' +

        '        <td>روز تعدیل </td>' +
        '        <td>تاریخ ختم قرارداد</td>' +
        '        <td>تاریخ تعدیل قرارداد </td>' +
        '        <td>نوع تعدیل</td>' +
        '        <td><span class="fa fa-remove"></span></td>' +
        '    </tr>' +
        '  </thead>' +
        '' +
        '    <tbody >' +
        '    <tr >' +

        '        <td><input type="number" name="rowtime[0][day]"  class="form-control">' +
        '<input type="hidden" name="rowtime[0][Extand_Type]" value="2" ></td>' +
        '        <td><input type="text"  name="rowtime[0][Cont_Date]"  required value="{{$contract->End_Date_Contract}}" class="form-control" readonly></td>' +
        '        <td><input type="text" name="rowtime[0][Extand_Date]" required id="Extand_Date" autocomplete=off class="form-control"> </td>' +
        '        <td><select name="rowtime[0][Req_Fid]" class="form-control" required>' +
        '                <option value="">لطفا  انتخاب کنید</option>' +
        '                <option value="1">اضافه کردن</option>' +
        '                <option value="2">حذف کردن</option>' +

        '            </select> </td>' +
        '        <td  ><input type="button" onclick="remove_tiem()" class="fa fa-remove btn btn-danger " style="color: red;"></td>' +
        '    </tr>' +


        '    </tbody>' +
        '</table>';
    idtime++;

    $("#divtime").append(tbl);
}



            $("#Extand_Date").persianDatepicker({
                formatDate: "YYYY-0M-0D"
            });

        })



    })
   function remove_tiem()
   {
       idtime=0;
          $("#tbltime").remove();


    }

</script>
