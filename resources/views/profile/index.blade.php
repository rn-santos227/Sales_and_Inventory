@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
<<<<<<< HEAD
            	<h4>Profile</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal">
                 <div class="form-group">
                        <label class="control-label col-sm-3" for="tax_rate">Name:</label>
                        <div class="col-sm-4">
                            <input style="text-transform: uppercase; background-color:#ffffff;" type="text" class="form-control" name="system_name" id="system_name" value="{{Auth::user()->last_name}}, {{Auth::user()->first_name}}" disabled>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-3" for="tax_rate">Userame:</label>
                        <div class="col-sm-4">
                            <input style="text-transform: uppercase; background-color:#ffffff;" type="text" class="form-control" name="system_name" id="system_name" value="{{Auth::user()->username}}" disabled>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-3" for="tax_rate">Email:</label>
                        <div class="col-sm-4">
                            <input style="text-transform: uppercase; background-color:#ffffff;" type="text" class="form-control" name="system_name" id="system_name" value="{{Auth::user()->email}}" disabled>
                        </div>
                </div>
                </form>
=======
            	<h3>Profile</h3>
            </div>
            <div class="panel-body">
            	{{Auth::user()->last_name}}, {{Auth::user()->first_name}}.
            	{{Auth::user()->username}}
            	{{Auth::user()->email}}
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            </div>           
        </div>
    </div>
</div>
@endsection
