<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{!!trans('lang_admin.login.title')!!}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('backend/css/vendor.css')}}" rel="stylesheet">
    <link href="{{ url('backend/css/login.css')}}" rel="stylesheet">
    <script src="{{ url('backend/js/vendor.js')}}"></script>
    
</head>
<body>
<div class="container">
    	<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<h2>{{trans('lang_admin.login.login')}}</h2>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="{{url('admin/login')}}" method="post" role="form" style="display: block;">
									{{csrf_field()}}
									<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" >
										@if ($errors->has('username'))
											<span class="help-block">
					                            <strong>{{ $errors->first('username') }}</strong>
					                        </span>
					                    @endif
									</div>
									<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
										@if ($errors->has('password'))
											<span class="help-block">
					                            <strong>{{ $errors->first('password') }}</strong>
					                        </span>
					                    @endif
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="{{trans('lang_admin.login.log_in')}}">
												
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="#" tabindex="5" class="forgot-password">{{trans('lang_admin.login.forgot_pass')}}</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
