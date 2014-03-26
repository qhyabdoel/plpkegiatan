<html>
<head>
  <title>LPKIA</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" /> 

  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="/css/normalize.css" />
  <link rel="stylesheet" href="/css/foundation.css" />

  <script src="js/vendor/custom.modernizr.js"></script>   

  <script src="/js/jquery.js"></script>

  <link rel="stylesheet" type="text/css" href="/css/date.css">
  
  <script src="/js/calen1.js"></script>
  
  <style>
  div.result
  {
    height: 250px;
  }   
  </style>
</head>
<body>

 <div class="row">
  <div class="large-12 columns">

    <!-- Navigation -->

    <nav class="top-bar">
      <ul class="title-area">
        <!-- Title Area -->
        <li class="name">
          <h1><a href="#">Halaman Admin </a></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <section class="top-bar-section">

        <!-- Right Nav Section -->
        <ul class="right">                    
          <li class="divider"></li>
          <li><a href="users/logout">Logout</a></li>                   
        </ul>
      </section>
    </nav>        

    <!-- End Navigation -->


    <!-- Header Content -->

    <div class="row">
      <div class="large-3 columns">
        <div class="panel">
        <ul class="side-nav">          
          <li class="active"><a href="#">Kalendar</a></li>          
          <li class="divider"></li>
          <li><a href="users">User</a></li>          
          <li class="divider"></li>
          <li><a href="jalurs">Jalur Pengajuan</a></li>          
          <li class="divider"></li>
          <li><a href="jenis">Jenis Dokumen</a></li>          
          <li class="divider"></li>
          <li><a href="#">Pengaturan</a></li>          
          <li class="divider"></li>
        </ul>
        </div>
      </div>

      <div class="large-8 columns">
      	<div class="result" id="result" align="center">
      	  <br><br><br><br><br><img src="/img/load.gif" class="img1" id="img1">
      	</div>
        <br>
        <br>
        <br>
        <div class="large-10 large-offset-2 columns">
          <a href="/infolains/add" data-reveal-id="myModal" data-reveal-ajax="true" class="button radius small">Tambah Info</a>
        </div>   
      </div>

      <script>$('#result').load('/kalendars/kalendar');</script> 
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

    <!-- Data Modal -->           

    <div id="myModal" class="reveal-modal"></div>

    <!-- End Data Modal -->

  </div>
</div>

<script>
document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
</script>
<script src="js/foundation.min.js"></script>  
<script>
$(document).foundation();
</script>

</body>
</html>