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