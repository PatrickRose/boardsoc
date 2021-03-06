@extends('base.standard')

@section('title')
  Login
@endsection

@section('page-header')
	<div id="headerwrap">
		<div class="container">
			<div class="row">
				Reset password
			</div>
		</div>
	</div>
@endsection

@section('content')
  <div class="container mtb">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Reset Password</div>
          <div class="panel-body">

            <form class="form-horizontal" role="form" method="POST" action="/password/reset">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <input type="hidden" name="token" value="{{ $token }}">

              <div class="form-group">
                <label class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" for='password'>Password</label>
                <div class="col-md-6">
                  <input type="password" class="form-control" name="password">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label" for='password_confirmation'>Confirm Password</label>
                <div class="col-md-6">
                  <input type="password" class="form-control" name="password_confirmation">
                </div>
              </div>

              <div>
                <button type="submit" class="btn btn-default">
                  Reset Password
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
