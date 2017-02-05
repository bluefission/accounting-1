@extends('master_layout.master_page_layout')
@section('content')
	<div class="container">
    <div class="section">
			<div id="table-datatables">
        <h4 class="header">Summary of Expenses
                    {{date('F')}} {{date('Y')}}
        </h4>
        <div class="row">
          <div class="col s12 m12 l12">
            <!--Basic Form-->
            	<div id="basic-form" class="section">
              	<div class="row">
                	<div class="col s12 m12 l12">
                  	<div class="card-panel">
            					<div class="row">
              						<div class="input-field col s12">
                            
                						{!!Form::open(['url'=>'pdf','method'=>'POST','target'=>'_blank']) !!}
                                        <div class="input-field col s3">
                                            <select name="month_filter" id="exmo">
                                                @foreach(range(1,12) as $month)
                                                    <option value="{{str_pad($month, 2, "0", STR_PAD_LEFT)}}">{{date('F',strtotime('2016-'.$month))}}</option>
                                                @endforeach
                                            </select>
                                            <label>Month</label>
                                            <select name="year_filter" id="exy">
                                                @foreach(range(2016,date("Y")) as $year)
                                                    <option value="{{$year}}" @if(date("Y") == $year) selected @endif>{{$year}}</option>
                                                @endforeach
                                            </select>
                                            <label>Year</label>
                                        </div>
                              @include('pdf.pdf_form',['category'=>'monthly_alphalist_report',
                                              'recordId'=>null,
                                              'month_filter'=>null,
                                              'year_filter'=>null,
                                              'text' => 'Monthly Alphalist of Payees',
                                              'type'=>null])
                            {!! Form::close() !!}
              				</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection