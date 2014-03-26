<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>LPKIA</title>

  <link rel="stylesheet" href="/css/normalize.css" />
  <link rel="stylesheet" href="/css/foundation.css" />  

  <script src="/js/vendor/custom.modernizr.js"></script>

  <script src="/js/jquery.js"></script>

  <!-- Style tambahan -->
  <style type="text/css">
  h4.h2a{
    color: #c60f13;
  }
  </style>
  <!-- End tyle tambahan -->
</head>
<body>

 <div class="row">
  <div class="large-12 columns">

    <!-- Navigation -->
    
    <nav class="top-bar">
      <ul class="title-area">
        <!-- Title Area -->
        <li class="name">
          <h1><a href="#">Halaman Perancang Kegiatan</a></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>
      
      <section class="top-bar-section">

        <!-- Right Nav Section -->
        <ul class="right">                             
          <li class="divider"></li>
          <li><a href="#" data-reveal-id="myModal2">Kegiatan</a></li>
          <li class="divider"></li>
          <li><a href="/hakakses">Hak Akses</a></li>                             
        </ul>
      </section>
    </nav>
    
    <!-- End Navigation -->
    
    
    <!-- Header Content -->
    
    <div class="row">

      <div class="large-6 columns">

        <img src="/img/proposal usaha.gif"><br>
        
      </div>
      
      
      <div class="large-6 columns">            

        <div class="panel">                                    
          <h3 class="subheader">
            Halaman ini digunakan untuk pengajuan dokumen skegiatan.
          </h3>
        </div>
        
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
        
    <a href="#" id="buttonKegiatan3" data-reveal-id="myModal4" hidden>Ajukan Kegiatan</a>     

    <!-- End Footer -->
    
    <!-- Data modal -->    

    <div id="myModal2" class="reveal-modal small" align="center">          
      <a href="#" class="button radius secondary" data-reveal-id="myModal3">Daftar</a><br />
      <a href="#" class="button radius secondary">Kalender</a><br />
      <a href="#" class="button radius" id="buttonKegiatan1">Ajukan Kegiatan</a>      
    </div>            

    <div id="myModal3" class="reveal-modal small" align="center">
      <a href="#" class="button radius secondary">Daftar Kegiatan</a><br />
      <a href="#" class="button radius secondary">Daftar Pelaksanaan Kegiatan</a>
    </div>

    <div id="myModal4" class="reveal-modal small">        
      <h4 class="h2a subheader">
        Untuk mengajukan pelaksanaan kegiatan baru anda harus menyelesaikan 
        seluruh proses pengajuan dokumen untuk pelaksanaan kegiatan yang sekarang sedang dilakukan!
      </h4>
    </div>

    <!-- End Data modal -->
    
  </div>
</div>

<script>
document.write('<script src=' +
  ('__proto__' in {} ? '/js/vendor/zepto' : '/js/vendor/jquery') +
  '.js><\/script>')
</script>
<script src="/js/foundation.min.js"></script> 
<script>
$(document).foundation(function()
{
  $('#buttonKegiatan1').click(function()
  {
    $(this).addClass('disabled');

    $.getJSON('kegiatans/cek1',function(data)
    {
      if(data.cek==0)
      {          
        $('#buttonKegiatan3').click();
      }
      else
      {        
        window.location.href = "http://www.plpkegiatan.local/kegiatans/";
      }

      $('#buttonKegiatan1').removeClass('disabled');
    });      
  }); 
});
</script>
</body>
</html>