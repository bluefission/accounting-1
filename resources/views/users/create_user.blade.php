@extends('master_layout.master_page_layout')
@section('content')

        

  <!--start container-->
  <div class="container">
    <div class="section">
      <!--DataTables example-->
      <div id="table-datatables">
        <h4 class="header">Create a New User</h4>
        <div class="row">
          <div class="col s12 m12 l12">
            <!--Basic Form-->
            <div id="basic-form" class="section">
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="card-panel">
                    <h4 class="header2">User Information</h4>
                    <div class="row">
                      {!! Form::open(['url'=>'user','method'=>'POST','class'=>'col s12']) !!}
                        @include('users.user_form',['submitButton'=>'Submit'])
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <br>
      </div>
    </div>
  </div>
  <!--end container-->
@endsection