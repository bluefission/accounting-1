<!DOCTYPE html>
<html lang="en">
  	<head>
      <style>
        body {
          font-family: "Open Sans", "Arial", "Calibri", sans-serif;
          font-size: 12px;
        }
        .header p{
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
  	</head>
  	<body>
       	<div class="header" align="center">
		     <p><strong>A1 Driving School</strong></p>
             <p>A-1 Driving Bldg, #2 Sta. Lucia St., 1550</p>
             <p>000-089-472-000</p>
		  </div>
		<hr/>
		<p style="text-align: center;"><strong>Monthly Alphalist of Payees<br />{{ DateTime::createFromFormat('!m', $month)->format('F') }} {{ $year }}</strong></p>
		<table cellborder="1" style="width:100%; border-collapse: collapse; text-align:center;">
			<thead>
        <tr>
            <th></th>
            <th>TIN</th>
            <th style="text-align: left;">Registered Name</th>
            <th>Return Period</th>
            <th>ATC</th>
            <th>Nature of Income Payment</th>
            <th>Tax Rate</th>
            <th>Tax Base
            <th>Tax Withheld</th>
            <th>Amount Due</th>
        </tr>
  	  </thead>
  	  <tbody>
    		@if(!(empty($expenseItemList)))
    		    @php ($i = 1)
                @php ($total_base = 0)
                @php ($total_withheld = 0)
                @php ($total_due = 0)
  				@foreach($expenseItemList as $expenseItem)
                    @php ($tax_rate_me = '0.' . str_pad(\App\AccountTitleModel::where('id', \App\InvExpItemModel::where('id', $expenseItem->item_id)->first()['account_title_id'])->first()['tax_rate'], 2, '0', STR_PAD_LEFT))
    				<tr>
    				    <td style="text-align: right;">{{ $i }}</td>
    				    <td style="text-align: left;">{{ wordwrap(\App\ExpenseModel::where('id', $expenseItem->expense_cash_voucher_id)->first()['vendor_number'], 3, '-', true) }}</td>
                        <td style="text-align: left;">{{ \App\ExpenseModel::where('id', $expenseItem->expense_cash_voucher_id)->first()['vendor_name'] }}</td>
                        <td>{{ date("m/y") }}</td>
                        <td>{{ strtoupper(\App\AccountTitleModel::where('id', \App\InvExpItemModel::where('id', $expenseItem->item_id)->first()['account_title_id'])->first()['atc']) }}</td>
                        <td>{{ strtoupper(\App\AccountTitleModel::where('id', \App\InvExpItemModel::where('id', $expenseItem->item_id)->first()['account_title_id'])->first()['nature']) }}</td>
                        <td>{{ \App\AccountTitleModel::where('id', \App\InvExpItemModel::where('id', $expenseItem->item_id)->first()['account_title_id'])->first()['tax_rate'] }}%</td>
                        <td>PHP {{ number_format($expenseItem->amount / 1.12, 2, '.', ',') }}</td>
                        <td>PHP {{ number_format(($expenseItem->amount / 1.12) * (double)$tax_rate_me, 2, '.', ',') }}</td>
                        <td>PHP {{ number_format($expenseItem->amount - (($expenseItem->amount / 1.12) * (double)$tax_rate_me), 2, '.', ',') }}</td>
        		</tr>
                    @php ($total_base += $expenseItem->amount / 1.12)
                    @php ($total_withheld += ($expenseItem->amount / 1.12) * (double)$tax_rate_me)
                    @php ($total_due += $expenseItem->amount - (($expenseItem->amount / 1.12) * (double)$tax_rate_me))
        		@php ($i++)
    			@endforeach
	      @endif
          <tr>
            <td style="text-align: right" colspan="7">Total Amount</td>
            <td>PHP {{number_format($total_base, 2, '.', ',')}} </td>
            <td>PHP {{number_format($total_withheld, 2, '.', ',')}} </td>
            <td>PHP {{number_format($total_due, 2, '.', ',')}}</td>
          </tr>
  	  </tbody>
  	</table>
  </body>
</html>