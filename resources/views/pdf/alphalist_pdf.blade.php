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
		<p style="text-align: center;"><strong>Monthly Alphalist of Payees<br />{{ date("F Y") }}</strong></p>
		<table cellborder="1" style="width:100%; border-collapse: collapse; text-align:center;">
			<thead>
        <tr>
            <th></th>
            <th>TIN</th>
            <th>Registered Name</th>
            <th>Return Period</th>
            <th>ATC</th>
            <th>Nature of Income Payment</th>
            <th>Tax Rate</th>
            <th>Tax Base
            <th>Tax Withheld</th>
        </tr>
  	  </thead>
  	  <tbody>
    		@if(!(empty($expenseItemList)))
    		    @php ($i = 1)
  				@foreach($expenseItemList as $expenseItem)
    				<tr>
    				    <td style="text-align: right;">{{ $i }}</td>
    				    <td style="text-align: left;">{{ wordwrap($expenseItem->vendor_number, 3, '-', true) }}</td>
                        <td style="text-align: left;">{{ $expenseItem->vendor_name }}</td>
                        <td>{{ date("m/y") }}</td>
                        <td>WC100</td>
                        <td style="text-align: left;">RENTAL</td>
                        <td>5%</td>
                        <td>PHP {{ number_format($expenseItem->total_amount, 2, '.', ',') }}</td> 
                        <td>PHP {{ number_format($expenseItem->total_amount * 0.05, 2, '.', ',') }}</td>
        		</tr>
        		@php ($i++)
    			@endforeach
	      @endif
          <tr>
            <td style="text-align: right" colspan="7">Total Amount</td>
            <td>PHP {{number_format($totalTaxBase, 2, '.', ',')}} </td>
            <td>PHP {{number_format($totalTaxWithheld, 2, '.', ',')}} </td>
          </tr>
  	  </tbody>
  	</table>
  </body>
</html>