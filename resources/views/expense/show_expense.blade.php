@extends('master_layout.master_page_layout')
@section('content')
	<div class="container">
	  	<div id="invoice">
	    	<div class="invoice-header">
	      		<div class="row section">
	        		<div class="col s12 m6 l6">
	          		<img class="invoice-logo" src="{{ URL::asset('images/a1-logo.png')}}" alt="company logo">
	          		<p>To,</p>
	          		<p>
	          			<strong>{{$expense->vendor_name}}</strong><br>
	          			{{$expense->vendor_address}}y <br>
	          			{{$expense->vendor_number}}
	          		</p>
	        </div>

	        <div class="col s12 m6 l6">
                      <div class="invoce-company-address right-align">
                        <span class="invoice-icon"><i class="mdi-social-location-city cyan-text"></i></span>
                      <p>
                        <span class="strong">A1 Driving School</span>
                            <br>
                            <span>A-1 Driving Bldg</span>
                            <br>
                            <span>#2 Sta. Lucia St., 1550</span>
                            <br>
                            <span>+63 (2) 532.2272</span>
                      </p>
                      </div>
                      <div class="invoce-company-contact right-align">
                        <span class="invoice-icon"><i class="mdi-communication-quick-contacts-mail cyan-text"></i></span>
                        <p>
                          <span class="strong">www.a-1driving.com</span>
                            <br/>
                            <span>info@a-1driving.com</span>
                        </p>
                      </div>
                  </div>
	    </div>

	    <div class="invoice-lable">
	      	<div class="row">
	        	<div class="col s12 m3 l3 cyan">
	          		<h4 class="white-text invoice-text">EXPENSE</h4>
	        	</div>
	        	<div class="col s12 m9 l9 invoice-brief cyan white-text">
	          		<div class="row">
	            		<div class="col s12 m3 l3">
	              			<p class="strong">Total Due</p>
	              			<h4 class="header">₱ {{$expense->total_amount}}</h4>
	            		</div>
	            		<div class="col s12 m3 l2">
		              		<p class="strong">Expense No</p>
		              		<h4 class="header">#{{sprintf("%'.07d\n",$expense->id)}}</h4>
	            		</div>
	            		<div class="col s12 m3 l4">
		              		<p class="strong">Date Issued</p>
		              		<h4 class="header">{{date('F Y',strtotime($expense->created_at))}}</h4>
	            		</div>
	            		<br>
	          		</div>
	        	</div>
	      	</div>
	    </div>
	    <br>
	    <div class="">
	      	<div class="row">
	        	<div class="col s12 m12 l12">
		          	<table class="striped" id="itemsTable">
		            	<thead>
		              		<tr>
		                		<th data-field="item">Description</th>
		                		<th data-field="uprice">Amount</th>
		              		</tr>
		            	</thead>
		            	<tbody class="items">
		              		@foreach($expense->expenseItemsInfo as $expenseItem)
                        		<tr>
                           			<td width="42%">{{$expenseItem->item->item_name}}</td>
                           			<td>₱ {{$expenseItem->amount}}</td>
                        		</tr>
                        	@endforeach
		              
		            	</tbody>
		          	</table>
		          	<table id="amountCalc">
		            	<tbody>
		              		<tr>
								<td width="42%">Tax (12%)</td>
		                		<td></td>
		               		</tr>
		              		<tr>
								<td>Sub Total:</td>
		                		<td></td>
		              		</tr>
		              		<tr>
		                		<td class="cyan white-text">Grand Total</td>
		                		<td class="cyan strong white-text"></td>
		              		</tr>
		            	</tbody>
		          	</table>
	        	</div>
	        	<div class="row">
		            <div class="input-field col s12">
		              	{!! Form::open(['url'=>'pdf','method'=>'POST','target'=>'_blank','class'=>'col s12']) !!}
		                	@include('pdf.pdf_form',['category'=>'expense','recordId'=>$expense->id])
		              	{!! Form::close() !!}
		          	</div>
	      		</div>
	    	</div>
	    
	    <!--div class="invoice-footer">
	      	<div class="row">
	        	<div class="col s12 m6 l6">
	          		<p class="strong">Payment Method</p>
	          		<p>Please make the cheque to: <div class="input-field"><input id="cheque" type="text"><label for="checque">Recipient</label></div></p>
	          		<p class="strong">Terms & Condition</p>
		          	<ul>
		            	<li>You know, being a test pilot isn't always the healthiest business in the world.</li>
		            	<li>We predict too much for the next year and yet far too little for the next 10.</li>
		          	</ul>
	        	</div>
	        	<div class="col s12 m6 l6 center-align">
		          	<p>Approved By</p>
		          	<img src="../images/signature-scan.png" alt="signature">
		          	<p class="header">AMANDA ORTON</p>
		          	<p>Managing Director</p>
	        	</div>
	      	</div>
	    </div-->
	</div>
@endsection