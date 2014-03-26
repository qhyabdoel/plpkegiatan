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
          <li class="active"><a href="#">User</a></li>          
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

      <div class="large-8 large-offset-1 columns">            
        <div>              
         <h5 class="subheader">Daftar User</h5>
        <hr>
        <table border="0">            
          <tbody>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Peran</th>
              <th>Tindakan</th>              
            </tr>
            
            <?php 

            foreach ($users as $user) 
            {
             ?>
             <tr>
              <td><?php echo $user->id; ?></td>
              <td><?php echo $user->name; ?></td>
              <td>
                <?php 

                if($user->hakakses()->count()==0)
                {
                  echo '';
                }
                else
                {
                  foreach ($user->hakakses as $hakakse) 
                  {
                    if($hakakse->peran==1)
                    {
                      echo 'Admin<br> ';
                    }
                    elseif ($hakakse->peran==2) 
                    {
                      echo 'Perancang Kegiatan<br> ';
                    }
                    elseif ($hakakse->peran==3) 
                    {
                     echo 'Approver<br> ';
                    }
                  }
                }                                
                ?>
              </td>
              <td>
                <a href=<?php echo '/users/edit/'.$user->id; ?> data-reveal-id="myModal" data-reveal-ajax="true">Edit</a> |
                <a href=<?php echo '/users/hapus/'.$user->id; ?> data-reveal-id="myModalSmall" data-reveal-ajax="true">Hapus</a>
              </td>
             </tr>             
             <?php
            }

            ?>

          </tbody>
        </table>  
        <div class="large-11 large-offset-1 columns">
          <a href="/users/add" data-reveal-id="myModal" data-reveal-ajax="true" class="button radius small">Tambah User</a>
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