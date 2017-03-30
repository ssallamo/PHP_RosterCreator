<html>
	<head>
		<style>	
			@import url("css/basicRoster_login.css");
		</style>	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4">
		    		<h1 class="text-center login-title">Gloria Jean's<br>36 Lorne St</h1>
		    		<div class="account-wall">
			        	<img class="profile-img" src="./img/menuLogo_big.png" alt="">
			        	<form class="form-signin" method='post' action='login_ok.php'>
					        <input type="text" class="form-control" name="user_id" id="user_id" placeholder="ID" value="0001" required autofocus>
					        <input type="password" class="form-control" name="user_pw" id="user_pw" placeholder="Password"  value="6666"required>
					        <button class="btn btn-lg btn-warning btn-block" type="submit">
					          Sign in
					        </button>
				        </form>
		    		</div>
				</div>
			</div>
		</div>
	</body>
</html>
