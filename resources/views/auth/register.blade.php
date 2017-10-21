@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#home">Employee</a></li>
                      <li><a data-toggle="tab" href="#menu1">Company</a></li>
                    </ul>

                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        <h3>Employee</h3>
                        <p>Some content.</p>
                      </div>
                    
                      <div id="menu1" class="tab-pane fade">
                        <h3>Menu 1</h3>
                        <p>Some content in menu 1.</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
