@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
<<<<<<< HEAD
            <div class="panel-heading"><h4><i class="fa fa-truck" aria-hidden="true"></i> System Settings</h4></div>
=======
            <div class="panel-heading"><h3><i class="fa fa-truck" aria-hidden="true"></i> System Settings</h3></div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            <div class="panel-body">
                <form method="POST" action="systemsettings/{{$systemsetting->id}}" class="form-horizontal" onsubmit="return confirm('Are you sure want to update system settings?');">
                    <!-- Setting Method type to PUT needed for the Update Function -->
                    {{ method_field('PUT') }}

                    <!-- CSRF Tokens needed for Cross-Site Request Forgery(CSRF) Protection/Prevention -->
                    {{ csrf_field() }}

                    <div class="form-group">
<<<<<<< HEAD
                        <label class="control-label col-sm-3" for="tax_rate">System Name:</label>
                        <div class="col-sm-4">
                            <input style="text-transform: uppercase;" type="text" class="form-control" name="system_name" id="system_name" value="{{$systemsetting->system_name}}">
                        </div>
                    </div>

                    <div class=" item_hide form-group{{ $errors->has('cost_layering_method') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-3" for="cost_layering_method">Cost Layering Method:</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="cost_layering_method" name="cost_layering_method" required>
                                <option value="{{$systemsetting->cost_layering_method}}">{{$systemsetting->cost_layering_method}}</option>

                                @if ($systemsetting->cost_layering_method == 'First In First Out')
                                <option value='Last In First Out'>Last In First Out</option>

                                @else
                                <option value='First In First Out'>First In First Out</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class=" form-group{{ $errors->has('system_mode') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-3" for="system_mode">Mode:</label>
=======
                        <label class="control-label col-sm-2" for="tax_rate">System Name:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="system_name" id="system_name" value="{{$systemsetting->system_name}}">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('system_mode') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="system_mode">Mode:</label>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                        <div class="col-sm-4">
                            <select class="form-control" id="system_mode" name="system_mode" required>
                                <option value="{{$systemsetting->system_mode}}">{{$systemsetting->system_mode}}</option>

                                @if ($systemsetting->system_mode == 'Restaurant')
                                <option value='FastFood'>FastFood</option>
                                <option value='Retailer'>Retailer</option>

                                @elseif ($systemsetting->system_mode == 'Retailer')
                                <option value='FastFood'>FastFood</option>
                                <option value='Restaurant'>Restaurant</option>

                                @else
                                <option value='Retailer'>Retailer</option>
                                <option value='Restaurant'>Restaurant</option>
                                @endif
                            </select>
                        </div>
                    </div>

<<<<<<< HEAD
                    <div class="form-group  item_hide ">
                        <input type="hidden" id="id" value="1">
                        <label class="control-label col-sm-3" for="tax_rate">Tax Rate:</label>
=======
                    <div class="form-group">
                        <input type="hidden" id="id" value="1">
                        <label class="control-label col-sm-2" for="tax_rate">Tax Rate:</label>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="tax_rate" id="tax_rate" value="{{$systemsetting->tax_rate}}">
                        </div>
                    </div>

<<<<<<< HEAD
                    <div class="form-group  item_hide ">
                        <input type="hidden" id="id" value="1">
                        <label class="control-label col-sm-3" for="service_charge">Service Charge:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="service_charge" id="tax_rate" value="{{$systemsetting->service_charge}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="id" value="1">
                        <label class="control-label col-sm-3" for="tax_rate">Theme Color:</label>
                        <div class="col-sm-9">
                            <input value="&nbsp;&nbsp;&nbsp;" class="btn btnClick btn-xs picked" id="1" type="button" style="border-radius: 50%; outline: none; background-color: #24292e;">
                            <input value="&nbsp;&nbsp;&nbsp;" class="btn btnClick btn-xs" id="2" type="button" style="border-radius: 50%; outline: none; background-color: #b2e5e5;">
                            <input value="&nbsp;&nbsp;&nbsp;" class="btn btnClick btn-xs" id="3" type="button" style="border-radius: 50%; outline: none; background-color: #ef4786;">
                            <input value="&nbsp;&nbsp;&nbsp;" class="btn btnClick btn-xs" id="4" type="button" style="border-radius: 50%; outline: none; background-color: #98c61e;">
                            <input value="&nbsp;&nbsp;&nbsp;" class="btn btnClick btn-xs" id="5" type="button" style="border-radius: 50%; outline: none; background-color: #ffd602;">

                            <input type="hidden" name="primaryColorHidden" id="primaryColorHidden" value="#24292e">
                            <input type="hidden" name="secondaryColorHidden" id="secondaryColorHidden" value="#202428">
                            <input type="hidden" name="tertiaryColorHidden" id="tertiaryColorHidden" value="#4fc1e9">

                        </div>
                    </div>

                    <div class="form-group item_hide ">
                        <label class="control-label col-sm-3" for="non_vat">Non-vat:</label>
                        <div class="checkbox col-sm-4">
                            <label class="switch">
                                <input style="margin-left: 0px;" name="non_vat" type="checkbox" ame="non_vat" id="non_vat" {{ $systemsetting->non_vat == 1 ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-default pull-right">Save changes</button>
                        </div>  
                    </div>
=======
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="non_vat">Non-vat:</label>
                        <div class="checkbox col-sm-2">
                            <input type="checkbox" name="non_vat" id="non_vat" {{ $systemsetting->non_vat == 1 ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-default pull-right">Save changes</button>
                    </div>  
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                </form>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/systemsettings-script.js') }}"></script>
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
@endsection
