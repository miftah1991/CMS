@extends('layouts.master')

@section('content')

    <div class="row">
        <section class="col-lg-12 col-md-12">




            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title"> ګزارش پروژه شرطنامه </h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive " id="tblist">
                        <thead>
                        <tr>
                            <td>شماره مسسلسل</td>
                            <td>کود پروژه</td>
                            <td>تعداد شرطنامه</td>
                            <td>نمایش</td>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$rcd)

                            <tr class="myfont">
                                <td>{{++$key}}</td>
                                <td>{{$rcd->Pro_Code}}</td>

                                <td>@if(isset($rcd->total))  {{$rcd->total}}   @endif  </td>
                                  <td><a href="{{url('Find_Total_Condition_Offer_List')}}/{{$rcd->id}}"> <span class="fa fa-eye-slash btn btn-info"></span></a></td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </section>
    </div>




    <script>
        $(document).ready(function () {


            $("#tblist").dataTable();
        });


    </script>





@endsection
