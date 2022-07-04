<div class="modal fade modal-large " id="Sub_Paymant_Modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title btn btn-warning btn-block" id="exampleModalLongTitle"></h5>


            </div>
            <div class="modal-body  ">

                <div class="row">
                    <section class="col-lg-12 col-md-12">
                        <div class="box box-info">
                            <div class="box-header text-center">
                                <div class="fa fa-spinner  fa-spin fa-3x fa-fw" style="color:green;" id="spain"></div>
                                <div class="fa fa-times fa-3x fa-fw" style="color:red;" id="spainwar"></div>
                                <div class="blink" style="color:red;" id="blink">این انوایس قبلاً ذخیره شده است</div>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-12 ">

                                    <div class="panel panel-danger ">
                                        <div class="panel-heading">
                                            <div class="panel-title text-center"></div>

                                        </div>
                                        <form   enctype="multipart/form-data">

                                            <input type="hidden" id="Pay_Fid" name="Pay_Fid">
                                            <input type="hidden" id="project_Fid" name="project_Fid">
                                            <input type="hidden" id="Qunity" name="Qunity">


                                            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                            <div class="panel-body">




                                                <div class="row">


                                                    <div class="col-lg-12">
                                                        <div class="form-group ">
                                                            <label>Inovice</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-product-hunt"></i>
                                                                </div>

                                                                <select name="Inv_Type_Fid" id="Inv_Type_Fid"  required class="form-control">
                                                                    <option value="">لطفا نوع انوایس انتخاب کنید</option>
                                                                    @foreach( $Invoicetype as $rcd)

                                                                        <option value="{{$rcd->id}}">{{$rcd->name}}</option>
                                                                    @endforeach

                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group ">
                                                            <label>Unit </label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-envelope-open"></i>
                                                                </div>


                                                                <input type="number" name="Inv_unit"   id="Inv_unit" autocomplete="off"  min="1" max="5000"  class="form-control myfont " >

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group ">
                                                            <label>T.Price </label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-envelope-open"></i>
                                                                </div>


                                                                <input type="number" name="Total_Price"  min="1" id="Total_Price" readonly autocomplete="off" class="form-control myfont " >

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group ">
                                                            <label>Amount</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>

                                                                <input type="number" name="amount" min="1" id="Amount"  autocomplete="off" class="form-control myfont " >

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group ">
                                                            <label>P.After Discount</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>

                                                                <input type="number" name="Inv_P_Distcount" id="Inv_P_Distcount"  readonly autocomplete="off" class="form-control myfont " >

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>







                                            </div>
                                            <div class="panel-footer">

                                                <input type="button" value=" ثپت کردن" id="btnsave" class="btn btn-primary">


                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </section>
                </div>






            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">بسته</button>

            </div>
        </div>
    </div>
</div>
<script>

//     $("#Inv_unit").keypress(function (e) {
//        var code= e.which;
//        if(code==48)
//        {
// alert(code);
//           $("#btnsave").attr('disabled','true');
//        }
//        else
//        {
//            $("#btnsave").removeAttr('disabled');
//        }
//     })

</script>
