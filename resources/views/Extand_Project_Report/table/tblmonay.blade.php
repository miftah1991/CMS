
<script>
    var idmonay=0;


    $(document).ready(function () {





        $("#btnmonay").on('click',function () {


            //   $("#txt1_".id).val($("#monay").val());


            if(idmonay==0) {

                var tbl = ''

                tbl += '<table class="table table-bordered text-center" style="border-color:blue;"  id="tblmonay" >' +

                    '  <thead>' +
                    '  <tr>' +
                    '      <td colspan="5">' +

                    '          تعدیلات دربخش حجم' +
                    '      </td>' +
                    '  </tr>' +
                    '    <tr>' +
                    '        <td>مقدار پول تعدیل</td>' +
                    '        <td> مقدار قرارداد</td>' +
                    '         <td>مقدار خالص</td>' +
                    '        <td>نوع تعدیل</td>' +
                    '        <td><span class="fa fa-remove"></span></td>' +
                    '    </tr>' +
                    '  </thead>' +
                    '' +
                    '    <tbody>' +
                    '    <tr>' +

                    '        <td><input type="number" name="rowmonay[0][Amount]" id="Amount" class="form-control">' +
                    '<input type="hidden" name="rowmonay[0][Extand_Type]" value="1" ></td>' +
                    '        <td><input type="number"  name="rowmonay[0][Cont_Amount]" value="{{$contract->Contract_Rupee}}" id="Cont_Amount"  required class="form-control"></td>' +
                    '        <td><input type="text" name="rowmonay[0][Net_Amount]" required class="form-control" id="Net_Amount" readonly> </td>' +


                    '        <td><select name="rowmonay[0][Req_Fid]" id="Req_Fid_monay" class="form-control" required>' +
                    '                <option value="">لطفا  انتخاب کنید</option>' +
                    '                <option value="1">اضافه کردن</option>' +
                    '                <option value="2">حذف کردن</option>' +

                    '            </select> </td>' +
                    '        <td><input type="button" onclick="remove_monay()" class="fa fa-remove btn btn-danger " style="color: red;"></td>' +
                    '    </tr>' +


                    '    </tbody>' +
                    '</table>';
                idmonay++;

                $("#divmoany").append(tbl);
            }

$("#Req_Fid_monay").on('change',function () {

    var id=$("#Req_Fid_monay").val();

    var Amount=parseFloat($("#Amount").val());
    var Cont_Amount=parseFloat($("#Cont_Amount").val());
    if(id==1)
    {
        var net_amount=Amount+Cont_Amount;
        $("#Net_Amount").val(net_amount)
    }
    if(id==2)
    {
        var net_amount=Cont_Amount-Amount;
        $("#Net_Amount").val(net_amount)
    }



})

            $("#Extand_Date").persianDatepicker({
                formatDate: "YYYY-0M-0D"
            });

        })



    })

    function remove_monay()
    {
        idmonay=0;
        $("#tblmonay").remove();


    }


</script>
