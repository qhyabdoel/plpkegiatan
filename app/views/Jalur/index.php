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
                     <li class="active"><a href="#">Jalur Pengajuan</a></li>          
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
                  <h5 class="subheader">Daftar Jalur Pengajuan</h5>
                  <hr>
                  <table border="0">     
                     <tbody>
                        <?php 

                        if($jalurs->count()==0) 
                        {
                           echo '<h6 class="subheader">Belum ada data jalur pengajuan. 
                           Klik tombol dibawah untuk menambahkan daftar jalur pengajuan baru!</h6>';
                        }
                        else
                        {
                           ?>
                           <tr>
                              <th>ID</th>                              
                              <th>Perancang Kegiatan</th>                              
                              <th>Jalur</th>
                              <th>Tindakan</th>                            
                           </tr>
                           <?php

                           foreach ($jalurs as $jalur) 
                           {                                                            
                              ?>
                              <tr align="center">
                                 <td><?php echo $jalur->id; ?></td>                                 
                                 <td><?php echo $jalur->perka->hakakse->user->name; ?></td>
                                 <td>
                                    <a href=<?php echo '/jalurs/lihats/'.$jalur->id; ?> data-reveal-id="myModalSmall" data-reveal-ajax="true">
                                       Lihat
                                    </a></td>
                                 </td>                                 
                                 <td>
                                    <a href=<?php echo '/levels/add/'.$jalur->id; ?> data-reveal-id="myModalSmall" data-reveal-ajax="true">
                                       Tambah Level
                                    </a> |                                    
                                    <a href=<?php echo '/jalurs/hapus/'.$jalur->id; ?> data-reveal-id="myModalSmall" data-reveal-ajax="true">Hapus</a>
                                 </td>             
                              </tr>
                              <?php
                           }
                        }
                        ?>    

                     </tbody>
                  </table>  
                  <div class="large-11 large-offset-1 columns">
                     <a href="/jalurs/add" data-reveal-id="myModalSmall" data-reveal-ajax="true" class="button radius small">Tambah Jalur</a>
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

            <div id="myModalSmall2" class="reveal-modal small"></div>      

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