
<script>


    var extraid=0;
    $(document).ready(function () {



        $("#btnextra").on('click',function () {


            //   $("#txt1_".id).val($("#monay").val());

if(extraid==0) {

    var tbl = ''

    tbl += '<table class="table table-bordered text-center" style="border-color:dodgerblue;"  id="tblextra" >' +

        '  <thead>' +

        '    <tr>' +

        '        <td>موضوع نوع دیګر تعدیلات</td>' +
        '        <td>تفصیل نوع دیګر تعدیلات</td>' +
        '        <td>نوع تعدیل</td>' +
        '        <td><span class="fa fa-remove"></span></td>' +
        '    </tr>' +
        '  </thead>' +

        '    <tbody>' +
        '    <tr>' +

        '        <td><input type="text" name="rowextra[' + extraid + '][item_extra]"  class="form-control">' +
        '<input type="hidden" name="rowextra[' + extraid + '][Extand_Type]" value="4"  required ></td>' +
        '        <td><input type="text" name="rowextra[' + extraid + '][details_extra]"  required class="form-control"></td>' +
        '        <td><select  name="rowextra[' + extraid + '][Req_Fid]" class="form-control" required>' +
        '                <option value="">لطفا  انتخاب کنید</option>' +
        '                <option value="1">اضافه کردن</option>' +
        '                <option value="2">حذف کردن</option>' +

        '            </select> </td>' +
        '        <td><input type="button" onclick="remove_itemextra()" class="fa fa-remove btn btn-danger " style="color: red;"></td>' +
        '    </tr>' +


        '    </tbody>' +
        '</table>';
    extraid++;

    $("#divextra").append(tbl);
}

        })





    })



    function remove_itemextra()
    {
        extraid=0;
        $("#tblextra").remove();


    }


</script>
