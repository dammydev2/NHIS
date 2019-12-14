@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    	<div class="panel panel-primary col-sm-4">
    		<div class="panel-heading"><h3><center>Add New User</center></h3></div>
    		<div class="panel-body">
                <form method="post" action="{{ url('/enteruser') }}">

                    {!! csrf_field() !!}

                    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>User Type</label>
                        <select class="form-control" name="type">
                            <option>Select</option>
                            <option value="1">Front Desk/Registration</option>
                            <option value="2">Nurse</option>
                            <option value="3">Health Recorder</option>
                            <option value="4">Authorizer</option>
                            <option value="5">Voucher Preparer</option>
                            <option value="6">Doctor</option>
                            <option value="7">NHIS Account</option>
                            <option value="8">ICD</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                   <!--  <input type="checkbox"> I agree to the <a href="#">terms</a> -->
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection
