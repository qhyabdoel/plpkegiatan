<html>
<head>
	<title>LPKIA</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	
	<link rel="stylesheet" type="text/css" href="/css/date.css">
	
	<!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
	<link rel="stylesheet" href="/css/normalize.css" />
	<link rel="stylesheet" href="/css/foundation.css" />
	
	<script src="/js/vendor/custom.modernizr.js"></script>
	
</head>
<body>

 <div class="row">
    <div class="large-12 columns">     

	  	{{ Form::open(array('url' => 'users/login', 'method' => 'post')) }}

			<form>
			  <fieldset>			
			
			    <div class="row">
			      <div class="large-12 columns">			    
			        <input type="text" placeholder="Username" name="name">
			      </div>
			    </div>
			    
			    <div class="row">
			      <div class="large-12 columns">			        
			        <input type="password" placeholder="Password" name="password">
			      </div>
			    </div>						  
				
				<div class="row" align="right">
					<div class="large-12 columns">
						<button class="small button secondary">Login</button>
					</div>					
				</div>
				
			  </fieldset>
			</form>
							
		{{ Form::close() }}

	  <!-- End Data modal -->
 
    </div>
  </div>
  
  <script src="/js/foundation.min.js"></script>  

</body>
</html>