<!DOCTYPE html>
<html >
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="padding-top:150px;">
	<div class="row">
		<div class="span4 offset3">
			<form class="form-horizontal" method="post" action="/sessions/authenticate">
			  <fieldset>
			    <div class="control-group">
			      <label class="control-label" for="input01">e-mail:</label>
			      <div class="controls">
			        <input type="text" class="input-xlarge" id="input01" name="email">			        
			      </div>
			    </div>
			    <div class="control-group">
			      <label class="control-label" for="input01">Пароль:</label>
			      <div class="controls">
			        <input type="password" class="input-xlarge" id="input01" name="password">			        
			      </div>
			    </div>
			    <div class="control-group">
			      <div class="controls">
			       <button class="btn btn-success" type="submit">
			       Войти
			       </button>	
			       
			       <button class="btn" type="submit">
			       <i class="icon-question-sign"></i> Напомнить пароль
			       </button>	        
			      
			      
			      </div>
			    </div>
			  </fieldset>
			</form>
		</div>
	</div>
</div>
</body>
</html>