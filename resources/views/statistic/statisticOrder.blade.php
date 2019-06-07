@extends('admin.layouts.my-layout')

@section('content')
<div class="main-content" >
<div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h6><i class="icon-fa icon-fa-line-chart text-primary"></i> Doanh thu các tháng </h6>
                    </div>
                    <div class="card-body">
                        <line-chart :labels="[{{$thang}}]" :values="[ {{$doanhthu}}]"></line-chart>
                    </div>
                </div>
            </div>
        </div>
</div>
@stop