@extends('master_layout.master_page_layout')
@section('content')
	<!--start container-->
   	<div class="container account-information">
      	<div class="section">
          	<div id="table-datatables">
            	<h4 class="header">View All Account Entries</h4>
            	<div class="row right-align">
                	<div class="col l12 m12 s12">
                  		<a href="{{route('journal.create')}}" class="btn waves-effect waves-light cyan" type="submit" name="action">
                     		Create New Journal Entry
                  		</a>
                	</div>
            	</div>
            	<div class="row">
               	<div class="col s12 m12 l12">
                  	<table id="data-table-simple" class="responsive-table display" cellspacing="0" align="center">
                     	<thead>
	                        <tr>
	                           <th>Date</th>
	                           <th>Branch</th>
	                           <th>Ref #</th>
	                           <th>Description</th>
	                           <th>Debit</th>
	                           <th>Credit</th>
	                           <th>Debit Amount</th>
	                           <th>Credit Amount</th>
	                        </tr>
                     	</thead>
                     	<tfoot>
	                        <tr>
	                           <th>Date</th>
	                           <th>Branch</th>
	                           <th>Ref #</th>
	                           <th>Description</th>
	                           <th>Debit</th>
	                           <th>Credit</th>
	                           <th>Debit Amount</th>
	                           <th>Credit Amount</th>
	                        </tr>
                     	</tfoot>
                     	<tbody>
                     		@foreach($journalEntryList as $journalEntry)
	                     		<tr>
		                           <td>{{ $journalEntry->id }} {{$journalEntry->created_at}}</td>
		                           <td>
		                           		@if($journalEntry->userCreateInfo->branch_id != NULL)
		                           			{{$journalEntry->userCreateInfo->branchInfo->branch_name}}
		                           		@else
		                           			-
		                           		@endif
		                           <td>
		                        		@if($journalEntry->invoice_id != NULL)
		                        			<a href="{{route('invoice.show',$journalEntry->invoice_id)}}">
		                        				<!-- #INV-{{sprintf("%'.07d",$journalEntry->invoice_id)}} -->
													INV-{{strtoupper(substr(md5($journalEntry->invoice_id), 0, 5))}}
		                        			</a>
		                        		@elseif($journalEntry->receipt_id != NULL)
		                        			<a href="{{route('receipt.show',$journalEntry->receipt_id)}}">
		                        				<!-- #REC-{{sprintf("%'.07d",$journalEntry->receipt_id)}} -->
													REC-{{strtoupper(substr(md5($journalEntry->receipt_id), 0, 5))}}
		                        			</a>
		                        		@elseif($journalEntry->expense_id != NULL)
		                        			<a href="{{route('expense.show',$journalEntry->expense_id)}}">
		                        				#EXP-{{sprintf("%'.07d",$journalEntry->expense_id)}}
		                        			</a>
		                        		@elseif($journalEntry->asset_id != NULL)
		                        			<a href="{{route('asset.show',$journalEntry->asset_id)}}">
		                        				#AST-{{sprintf("%'.07d",$journalEntry->asset_id)}}
		                        			</a>
		                        		@endif
		                           </td>
		                           <td>{{$journalEntry->description}}</td>
		                           <td>
		                           		@if($journalEntry->debit_title_id != NULL)
		                           			{{$journalEntry->debit->account_title_name}}
		                           		@else
		                           			-
		                           		@endif
		                           </td>
		                           <td>
		                           		@if($journalEntry->credit_title_id != NULL)
		                           			{{$journalEntry->credit->account_title_name}}
		                           		@else
		                           			-
		                           		@endif
		                           </td>
		                           <td>{{$journalEntry->debit_amount}}</td>
		                           <td>{{$journalEntry->credit_amount}}</td>
		                        </tr>
                     		@endforeach
	                        
                     	</tbody>
                  	</table>
               	</div>
            </div>
        </div>
    </div>
	<!--end container-->
@endsection