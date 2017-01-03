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
                    	<br>
                      <div class="row">
              					<div class="col s12 m12 l12">
                					<table class="striped">
                						<thead class="green white-text">
                  						<tr>
                                <th style="border-radius: 0;">ID</th>
                                <th style="border-radius: 0;">TIN #</th>
                                <th style="border-radius: 0;">Name</th>
                                <th style="border-radius: 0;">Address</th>
                                <th style="border-radius: 0;">Gross Amount</th>
                                <th style="border-radius: 0;">Withholding Tax</th>
                                <th style="border-radius: 0;">Net Amount</th>
                              </tr>
                						</thead>
                						<tbody>
                  						@if(count($expenseItemList)<=0)
                                <tr><td colspan="7" align="center"><em><strong> No Records Found </strong></em></td></tr>
                              @else
                                @foreach($expenseItemList as $expenseItem)
                                  <tr>
                                    <td><a href="{{route('expense.show',$expenseItem->id)}}"><em><strong>{{sprintf("%'.07d\n", $expenseItem->id)}}</strong></em></a></td>
                                    <td>{{ wordwrap($expenseItem->vendor_number, 3, '-', true) }}</td>
                                    <td>{{ $expenseItem->vendor_name }}</td>
                                    <td>{{ $expenseItem->vendor_address }}</td>
                                    <td>PHP {{ number_format($expenseItem->total_amount, 2, '.', ',') }}</td>
                                    <td>PHP {{ number_format($expenseItem->total_amount * 0.12, 2, '.', ',') }}</td>
                                    <td>PHP {{ number_format($expenseItem->total_amount - ($expenseItem->total_amount * 0.12), 2, '.', ',') }}</td>
                                  </tr>
                                @endforeach
                              @endif
                              <tr>
                                <td style=" color: #fff;background: #e53935;text-align: right" colspan="6">Grand Total</td>
                                <td style="background: #eee;">PHP {{number_format($totalNetValue,2,'.',',')}} </td>
                              </tr>
                						</tbody>
                					</table>
              					</div>		
            					</div>
            					<br><br>
            					<div class="row">
              						<div class="input-field col s12">
                						{!!Form::open(['url'=>'pdf','method'=>'POST','target'=>'_blank']) !!}
                              @include('pdf.pdf_form',['category'=>'expense_summary_report',
                                              'recordId'=>null,
                                              'month_filter'=>null,
                                              'year_filter'=>null,
                                              'type'=>null])
                            {!! Form::close() !!}
                				</button>
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