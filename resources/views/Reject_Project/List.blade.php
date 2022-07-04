@extends('layouts.master')

@section('content')


<br>
    <div class="box box-info col-lg-12">
        <div class="box-header">
         لست قرارداد رد شده
        </div>

        <div class="box-body">


            <table class="table table-bordered table-hover text-center" id="tablreject">
                <thead class="text-center">
                <tr >
                    <th>شماره</th>

                    <th>کود پروژه</th>
                    <th>تمویل کننده</th>
                    <th>حالت لغوه پروژه</th>
                    <th>راپور</th>
                    <th>حکم لغوه</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $key=>$rcd)
                <tr >
                    <td>{{++$key}}</td>

                    <td>@isset($rcd->registerprocurement->Pro_Code){{$rcd->registerprocurement->Pro_Code}}  @endif</td>
                    <td>@isset($rcd->registerprocurement->founder->FouName){{$rcd->registerprocurement->founder->FouName}}  @endif</td>
                    <td>@isset($rcd->statustype->Stat_Name){{$rcd->statustype->Stat_Name}}  @endif</td>
                    <td><a href="{{asset('storage/app/public/Reject')}}/{{$rcd->Report_File}}" ><span class="fa fa-download"></span></a></td>
                     <td><a href="{{asset('storage/app/public/Reject')}}/{{$rcd->Reject_File}}" ><span class="fa fa-download"></span></a></td>

                    <td>

                        <a href="View_Reject_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-eye btn-xs btn btn-primary">   </i></a>

                        @if($rcd->again_stat==1)
                       <i class="fa  btn-xs btn btn-primary "> قبول شده  </i>
                            @else
                            <a href="Edit_Reject_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-pencil btn-xs btn btn-default">   </i></a>
                            <a href="Accept_Reject_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa  btn-xs btn btn-success"> درخواست قبول  </i></a>
                        @endif

                    </td>

                    @endforeach

                </tbody>
            </table>


        </div>



    </div>





<script>

    $(document).ready(function() {


        $("#tablreject").dataTable();


    });

</script>


    @endsection
