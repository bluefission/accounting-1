<!DOCTYPE html>
<html lang="en">
  	<head>
  	</head>
  	<style>
          body {
            font-family: "Open Sans", "Arial", "Calibri", sans-serif;
            font-size: 12px;
          }
          .header p, .header h4{
            margin: 5px;
          }
          th {
            background: #eee;
          }
          table, th, td {
            border: 1px solid #000;
            padding: 5px;
          }
        </style>
  	<body>
       	<div style="display:inline-block; width:100%">
      		<div>
          		<h2><strong>A1 Driving School</strong></h2>
      		</div>
      		<div style="float:right;">
          		<h2>Receipt</h2>
      		</div>
  		</div>
  		<hr/>
  
  		<div style="display:inline-block; width:100%">
      	<div style="float:left;">
          	<strong>Receipt #: {{sprintf("%'.07d\n",$receipt->id)}}</strong>
      	</div>
      		<div style="float:right;">
				<strong>Date Paid: {{date('F d, Y',strtotime($receipt->created_at))}}</strong>
      		</div>
  		</div>
  		<div>
      		<strong>Invoice Info Reference #: {{sprintf("%'.07d\n",$receipt->invoiceInfo->id)}}</strong>
  		</div>
  		<br/>
  		<div>
      		<table cellspacing="0" style="width: 100%;">
          		<tr class="header">
              		<th colspan="2"><h4><strong> Payee Information </strong></h4></th>
          		</tr>
          		<tr>
              	<td><strong>Name:</strong>   {{$receipt->invoiceInfo->studentInfo->stud_first_name}} {{$receipt->invoiceInfo->studentInfo->stud_last_name}}</td>
                  <td> <strong> Address: </strong> {{$receipt->invoiceInfo->studentInfo->stud_address}} </td>
          		</tr>
          		<tr>
              		<td> <strong>Contact Number:</strong>  {{$receipt->invoiceInfo->studentInfo->stud_mobile_no}}</td>
                  <td> <strong>Email Address:</strong>  {{$receipt->invoiceInfo->studentInfo->stud_email}}</td>
          		</tr>
      		</table>
  		</div>
  		<br/>
  		<div>
      		<table border="1" style="width:100%; border-collapse: collapse; border: 1px solid black;">
				<tr class="header">
					<th colspan="3">
						<h4><strong>Paid via {{ $receipt->payment_method }}@if (!empty($receipt->check_ref)) (@if (is_numeric($receipt->check_ref))#{{ $receipt->check_ref }}@else{{ $receipt->check_ref }}@endif) @endif</strong></h4>
					</th>
				</tr>
          		<tr>
              		<th> Item </th>
              		<th> Description</th>
              		<th> Amount </th>
          		</tr>
				@php ($total = 0)
          		@foreach($receipt->invoiceInfo->invoiceItemsInfo as $invItem)
          			<tr>
	              		<td> {{$invItem->item->item_name}}  </td>
	              		<td> {{$invItem->remarks}}  </td>
	              		<td> PHP {{number_format($invItem->amount,2,'.',',')}}  </td>
	          		</tr>
					@php ($total += $invItem->amount)
          		@endforeach
              <!--<tr>
                  <td style="background: #eee" colspan="2" align="right" style="padding-right:5px;"> Sub Total: </td>
                  <td>PHP {{number_format($receipt->invoiceInfo->total_amount-(number_format($receipt->invoiceInfo->total_amount/1.12,2)),2,'.',',')}}</td>
              </tr>
              <tr>
                  <td style="background: #eee" colspan="2" align="right" style="padding-right:5px;"> VAT(12%): </td>
                  <td>PHP {{number_format($receipt->invoiceInfo->total_amount/1.12,2,'.',',')}}</td>
              </tr> -->
				<tr>
					<td colspan="2" style="background: #eee" align="right">Total</td>
					<td>PHP {{ number_format($total, 2, '.', ',') }}</td>
				</tr>
				<tr>
					<td colspan="2" style="background: #eee" align="right">Discount</td>
					<td>{{ number_format(100 - ($receipt->invoiceInfo->total_amount / $total) * 100, 0) }}%</td>
				</tr>
          		<tr>
              		<td style="background: #eee" colspan="2" align="right" style="padding-right:5px;"> Total Amount</td>
              		<td>PHP {{number_format($receipt->invoiceInfo->total_amount,2,'.',',')}}</td>
          		</tr>
              <tr>
                  <td style="background: #eee" colspan="2" align="right" style="padding-right:5px;"> Amount Paid </td>
                  <td>PHP {{number_format($receipt->amount_paid,2,'.',',')}}</td>
              </tr>
              @if($receipt->outstanding_balance != 0)
                <tr>
                    <td style="background: #eee" colspan="2" align="right" style="padding-right:5px;"> Outstanding Balance </td>
                    <td>PHP {{number_format($receipt->outstanding_balance,2,'.',',')}}</td>
                </tr>
              @elseif($receipt->change != 0)
                <tr>
                  <td style="background: #eee" colspan="2" align="right" style="padding-right:5px;"> Change </td>
                    <td>PHP {{number_format($receipt->change,2,'.',',')}}</td>
                </tr>
              @endif
				<!--
				<tr>
					<td style="background: #eee" colspan="2" align="right" style="padding-right:5px;"> Payment Method </td>
					<td>{{$receipt->payment_method}}</td>
				</tr>
				@if (!empty($receipt->check_ref))
					<tr>
						<td style="background: #eee" colspan="2" align="right" style="padding-right:5px;"> Check Reference Number </td>
						<td>{{$receipt->check_ref}}</td>
					</tr>
				@endif -->
              
      		</table>
  		</div>
  		<br/><br/>
  		<div style="margin-left: 70%;">
  			_______________________________ <br/>
  			<div align="center" style="width:100%">
        {{Auth::user()->first_name}}&nbsp;{{Auth::user()->last_name}}
  			</div>
  		</div>
  	</body>
</html>