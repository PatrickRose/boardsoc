@extends('base.standard')

@section('title')
    Login
@endsection

@section('page-header')
    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>
                    Forgot your password?
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @if(Session::has('status'))
        {!! Alert::info(Session::get('status')) !!}
    @endif

    <div class="container-fluid mtb">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST"
                              action="/password/email">
                            <input type="hidden" name="_token"
                                   value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail
                                    Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control"
                                           name="email"
                                           value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="centered">
                                <button type="submit"
                                        class="btn btn-default btn-submit">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
