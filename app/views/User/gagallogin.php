<html>
<head>
	<title>LPKIA</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	
	<!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
	<link rel="stylesheet" href="/css/normalize.css" />
	<link rel="stylesheet" href="/css/foundation.css" />
	
	<script src="/js/vendor/custom.modernizr.js"></script>
	
</head>
<body>

 <div class="row">
    <div class="large-12 columns">
 
      <!-- Navigation -->
 
		<nav class="top-bar">
		  <ul class="title-area">
		    <!-- Title Area -->
		    <li class="name">
		      <h1><a href="#">Pengajuan Kegiatan Kemahasiswaan </a></h1>
		    </li>
		    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		  </ul>
		
		  <section class="top-bar-section">
		
		    <!-- Right Nav Section -->
		    <ul class="right">		     	
		      <li class="divider"></li>
		      <li><a href="/users/login-reveal" data-reveal-id="myModal" data-reveal-ajax="true">Login</a></li>
		      <li class="divider"></li>
		      <li><a href="#" data-reveal-id="myModal2">Kegiatan</a></li>	     		      
		    </ul>
		  </section>
		</nav>				
 
      <!-- End Navigation -->
 
 
      <!-- Header Content -->
 
        <div class="row">
 		
 			<div class="large-9 large-centered columns">
 			<h2>
				Anda gagal melakukan login!
			</h2>
			<h4 class="subheader">
				Username dan password yang anda masukan tidak sesuai. 
				Lakukan login kembali dengan memasukan username dan password yang benar!
			</h4>          
 			</div>

        </div>
 
      <!-- End Header Content -->      	  		
 
	  <!-- Footer -->
 
        <footer class="row">
        <div class="large-12 columns"><hr />
            <div class="row">
 
              <div class="large-6 columns">
                  <p>Copyright &copy; 2013 Kiki Abdulloh.</p>
              </div>
 
              <div class="large-6 columns">
                  <ul class="inline-list right">
                    <li><a href="#">Tentang</a></li>
                    <li><a href="#">Bantuan</a></li>                  
                  </ul>
              </div>
 
            </div>
        </div>
      </footer>
 
      <!-- End Footer -->
	  
	   <!-- Data modal -->
		<div id="myModal" class="reveal-modal small"></div>
		
		<div id="myModal2" class="reveal-modal small" align="center">          
	      <a href="#" class="button radius secondary" data-reveal-id="myModal3">Daftar</a><br />
	      <a href="#" class="button radius secondary">Kalender</a><br />	   
	    </div>

	    <div id="myModal3" class="reveal-modal small" align="center">
	      <a href="#" class="button radius secondary">Daftar Kegiatan</a><br />
	      <a href="#" class="button radius secondary">Daftar Pelaksanaan Kegiatan</a>
	    </div>
	  <!-- End Data modal -->
 
    </div>
  </div>

  <script src="/js/jquery.js"></script>
  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? '/js/vendor/zepto' : '/js/vendor/jquery') +
  '.js><\/script>')
  </script>
  <script src="/js/foundation.min.js"></script>  
  <script>
    $(document).foundation();
  </script>
</body>
</html>