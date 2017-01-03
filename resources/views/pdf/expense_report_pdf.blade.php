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
             <p>+63 (2) 532.2272 / +63 (927) 7415331 / +63 (942) 3827688</p>
		  </div>
		<hr/>
		<p style="text-align: center;"><strong>Summary of Expenses<br />{{ date("F Y") }}</strong></p>
		<table cellborder="1" style="width:100%; border-collapse: collapse; text-align:center;">
			<thead>
        <tr>
            <th>TIN #</th>
            <th>Name</th>
            <th>Address</th>
            <th>Gross Amount</th>
            <th>Withholding Tax</th>
            <th>Net Amount</th>
        </tr>
  	  </thead>
  	  <tbody>
    		@if(!(empty($expenseItemList)))
  				@foreach($expenseItemList as $expenseItem)
    				<tr>
                        <td>{{ $expenseItem->vendor_number }}</td>
                        <td>{{ $expenseItem->vendor_name }}</td>
                        <td>{{ $expenseItem->vendor_address }}</td>
                        <td>PHP {{ number_format($expenseItem->total_amount, 2, '.', ',') }}</td>
                        <td>PHP {{ number_format($expenseItem->total_amount * 0.12, 2, '.', ',') }}</td>
                        <td>PHP {{ number_format($expenseItem->total_amount - ($expenseItem->total_amount * 0.12), 2, '.', ',') }}</td> 
        		</tr>
    			@endforeach
	      @endif
          <tr>
            <td style="text-align: right" colspan="5">Grand Total</td>
            <td>PHP {{number_format($totalNetValue,2,'.',',')}} </td>
          </tr>
  	  </tbody>
  	</table>
  </body>
</html>