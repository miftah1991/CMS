@extends('layouts.master')


@section('content')

<div class="box box-info col-lg-12">
    <div class="box-header">
       لیست وصول فیصدی

    </div>

    <div class="box-body">

        <table class="table table-bordered" id="tblpersantage" >
            <thead>
            <tr >

                <th>شماره</th>
                <th>کود پروژه</th>
                <th>مسول پروژه</th>
                <th>مجموعی وصول پولی</th>

                <th>حالت</th>


            </tr>
            </thead>

            <tbody >
@foreach($data as $key=>$rcd)


    <tr  class="myfont text-center">

        <td>{{++ $key}}</td>
        <td>{{$rcd->Pro_Code}}</td>
        <td>{{$rcd->Project_Member}}</td>
        <td>{{$rcd->total}}</td>

        <td>
           <a href="{{url('Print_Persantage')}}/{{$rcd->id}}"><i class="btn btn-xs btn-primary fa fa-print"></i></a>
            <a href="{{url('View_Persantage')}}/{{$rcd->id}}"><i class="btn btn-success btn-xs fa fa-eye"></i></a>
        </td>


    </tr>
   @endforeach

            </tbody>

        </table>



    </div>



</div>


<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>

<script>





    $(document).ready(function () {

        $("#tblpersantage").dataTable();

    });





</script>




    @endsection
