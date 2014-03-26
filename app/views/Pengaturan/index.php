<html>
<head>
  <title>LPKIA</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" /> 
  
  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="/css/normalize.css" />
  <link rel="stylesheet" href="/css/foundation.css" />
  
  <script src="js/vendor/custom.modernizr.js"></script>
  
  <script src="/js/calen1.js"></script>

  <script src="/js/jquery.js"></script>
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
          <li><a href="/admins">Beranda</a></li>                   
        </ul>
      </section>
    </nav>        

    <!-- End Navigation -->


    <!-- Header Content -->

    <div class="row">
      <div class="large-3 columns">
        <div class="panel">
          <ul class="side-nav">                      
            <li><a href="users">User</a></li>          
            <li class="divider"></li>
            <li><a href="jalurs">Jalur Pengajuan</a></li>          
            <li class="divider"></li>
            <li><a href="jenis">Jenis Dokumen</a></li>          
            <li class="divider"></li>
            <li class="active"><a href="#">Pengaturan</a></li>
            <li class="divider"></li>
          </ul>
        </div>
      </div>

      <div class="large-8 large-offset-1 columns">            
        <fieldset>
          <legend>Pengaturan Data Kegiatan</legend>
          <br>
          <div class="row collapse">
            <div class="small-4 columns">
              <label>Batas Waktu Pengajuan:</label>
            </div>
            <div class="small-5 columns">
              <input type="number" name="username" placeholder="Batas Waktu Pengajuan" id="username"></input>
              <small id="usernameError" hidden>Anda belum mengisikan username!</small>
            </div>            
            <div class="small-3 columns">
               <span class="postfix">hari</span>
            </div>
          </div>          

          <div class="row collapse">
            <div class="small-4 columns">
              <label>Batas Jumlah Data:</label>
            </div>
            <div class="small-5 columns">
              <input type="number" name="email" placeholder="Batas Jumlah Data" id="email"></input>
              <small id="emailError" hidden>Alamat email yang anda masukan tidak valid!</small>             
              <small id="emailError2" hidden>Anda belum mengisikan alamat email!</small>              
            </div>
            <div class="small-3 columns">
               <span class="postfix">hari</span>
            </div>
          </div>  

          <br>
          <div class="row" align="right">
            <div class="large-12 columns">
              <a class="small button secondary" id="simpan">Simpan</a>
              <button id="submit" hidden></button>
            </div>          
          </div>  
        </fieldset>        
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

      <div id="myModal" class="reveal-modal"></div>      

      <div id="myModalSmall" class="reveal-modal small"></div>      

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