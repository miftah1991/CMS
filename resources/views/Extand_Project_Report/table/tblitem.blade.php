
<script>



    $(document).ready(function () {




        var itemid=0;


        $("#btnitem").on('click',function () {


            //   $("#txt1_".id).val($("#monay").val());




                var tbl = ''

                tbl += '<table class="table table-bordered text-center" style="border-color: green;"  id="tbltime_'+itemid+'" >' +

                    '  <thead>' +

                    '    <tr>' +

                    '        <td>اسم مشخصات</td>' +
                    '        <td>تعداد</td>' +
                    '        <td>نوع تعدیل</td>' +
                    '        <td><span class="fa fa-remove"></span></td>' +
                    '    </tr>' +
                    '  </thead>' +

                    '    <tbody>' +
                    '    <tr>' +

                    '        <td><input type="text" name="rowitem['+itemid+'][item]"  required class="form-control">' +
                    '<input type="hidden" name="rowitem['+itemid+'][Extand_Type]"  value="3" ></td>' +
                    '        <td><input type="number" name="rowitem['+itemid+'][quntity]" required class="form-control"></td>' +


                    '        <td><select  name="rowitem['+itemid+'][Req_Fid]" class="form-control" required>' +
                    '                <option value="">لطفا  انتخاب کنید</option>' +
                    '                <option value="1">اضافه کردن</option>' +
                    '                <option value="2">حذف کردن</option>' +

                    '            </select> </td>' +
                    '        <td><input type="button" onclick="remove_item('+itemid+')" class="fa fa-remove btn btn-danger " style="color: red;"></td>' +
                    '    </tr>' +


                    '    </tbody>' +
                    '</table>';
            itemid++;

                $("#divitem").append(tbl);


        })





    })
    function remove_item(id)
    {

        $("#tbltime_"+id).remove();


    }
</script>
