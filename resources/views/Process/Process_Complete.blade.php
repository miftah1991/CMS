@extends('layouts.master')

@section('content')

    <section class="content">
        <form action="{{url('view_process_complete')}}" method="post" enctype="multipart/form-data" >
            @csrf
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">حالت دوران قرارداد</h3>
                        <!-- tools box -->
                        <div class="pull-left box-tools">
                            <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12">


                                        <select name="Pro_Fid" id="Pro_Fid" class="form-control">
                                            <option value="">پروژه را انتخاب کنید</option>
                                            @foreach($register_project as $rcd)
                                                <option value="{{$rcd->id}}">{{$rcd->Project_Name}}--{{$rcd->Pro_Code}}</option>
                                            @endforeach

                                        </select>



                            </div>

                        </div>
                        <div class="row">
                            <br>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary" value="جستجو">

                            </div>


                        </div>
                        <br>

                        <div class="row">
                            <section class="col-lg-12 col-md-12 " >
                                <div class="box box-info">
                                    <div class="box-header">
                                        <i class="fa fa-info-circle"></i>

                                        <!-- tools box -->
                                        <div class="pull-left box-tools">
                                            <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /. tools -->
                                    </div>
                                    <div class="box-body">


                                        <div class="row">
                                            <div class="col-lg-12">


                                                <table class="table table-bordered table-hover text-center" id="tbleanouce">
                                                    <thead class="text-center">
                                                    <tr >
                                                        <th>شماره</th>
                                                        <th>کود پروژه</th>
                                                        <th>تعداد اجناس</th>
                                                        <th>تعداد اجناس تسلیم شده</th>
                                                        <th>اجناس باقی</th>
                                                        <th></th>
                                                    </thead>

                                                    <tbody>
                                                    <tr class="myfont">

                                                        @foreach($paymant as $key=>$rcd)


                                                            @php



                                                                $subpaymant=DB::table('subpaymant')->join('registerprocurement','registerprocurement.id','subpaymant.Pro_Fid')
                                                                         ->select(DB::raw('sum(Inv_unit)as total'))



                                                                         ->where('is_complete',0)
                                                                         ->where('reject_id',0)
                                                                         ->where('Pro_Fid',$rcd->Pro_Fid)
                                                                         ->first();


                                                            @endphp



                                                            <td>{{++$key}}</td>
                                                            <td class="myfont"> {{$rcd->Pro_Code}}</td>
                                                            <td class="myfont">{{$rcd->total}}</td>
                                                            <td class="myfont">{{$subpaymant->total}}</td>
                                                            <td class="text-red myfont">{{$rcd->total-$subpaymant->total}}</td>
                                                            <td><a href="{{url('view_rec_suppaymant')}}/{{$rcd->Pro_Fid}}" target="_blank"><span class="fa fa-eye-slash"></span></a>
                                                            </td>
                                                    </tr>
                                                    @endforeach
                                                    <tbody >

                                                </table>







                                            </div>

                                        </div>





                                    </div>
                                </div>

                            </section>
                        </div>



                    </div>
                </div>

            </section>
        </div>

        <!-- Main row -->
        </form>
    </section>




    <script>
        $(document).ready(function () {


            $("#Pro_Fid").select2({

                allowClear: true
            });


            setTimeout(function(){$('.overlay').hide();}, 2000);





        })


    </script>
@endsection
