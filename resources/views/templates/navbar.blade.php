 <div class="sidebar" data-color="white" data-active-color="danger">
     <div class="logo">
         <a href="#" class="simple-text logo-mini">
             <div class="logo-image-small">
                 <img src="../assets/img/logo-cafe.png">
             </div>

         </a>
         <a href="#" class="simple-text logo-normal">
             Cafe In The Sky

         </a>
     </div>
     <div class="sidebar-wrapper">
         <ul class="nav">

             {{-- Produk titipan --}}
             {{-- <li>
                 <a href="{{ url('titipan') }}">
                     <i class="nc-icon nc-bank"></i>
                     <p>Produk Titipan</p>
                 </a>
             </li> --}}


             {{-- Absensi Kerja --}}
             {{-- <li>
                 <a href="{{ url('absensi') }}">
                     <i class="fa fa-usd" aria-hidden="true"></i>
                     <p>Absensi Kerja</p>
                 </a>
             </li> --}}




             {{-- Dashboard --}}
             <li>
                 <a href="{{ url('grafik') }}">
                     <i class="fa fa-bar-chart" aria-hidden="true"></i>
                     <p>Dashboard</p>
                 </a>
             </li>


             {{-- Pelanggan --}}
             <li>
                 <a href="{{ url('pelanggan') }}">
                     <i class="fa fa-users" aria-hidden="true"></i>
                     <p>Pelanggan</p>
                 </a>
             </li>

             {{-- Meja --}}
             <li>
                 <a href="{{ url('meja') }}">
                     <i class="fa fa-cutlery" aria-hidden="true"></i>
                     <p>Meja</p>
                 </a>
             </li>

             {{-- Kategori --}}
             <li>
                 <a href="{{ url('kategori') }}">
                     <i class="fa fa-list-ul" aria-hidden="true"></i>
                     <p>Category</p>
                 </a>
             </li>

             {{-- Jenis --}}
             <li>
                 <a href="{{ url('tipe') }}">
                     <i class="fa fa-list-ul" aria-hidden="true"></i>
                     <p>Jenis</p>
                 </a>
             </li>

             {{-- Menu --}}
             <li>
                 <a href="{{ url('menu') }}">
                     <i class="fa fa-cutlery" aria-hidden="true"></i>
                     <p>Menu</p>
                 </a>
             </li>

             {{-- Stok --}}
             <li>
                 <a href="{{ url('stok') }}">
                     <i class="nc-icon nc-diamond"></i>
                     <p>Stok</p>
                 </a>
             </li>

             {{-- Pemesanan --}}
             <li>
                 <a href="{{ url('pemesanan') }}">
                     <i class="fa fa-usd" aria-hidden="true"></i>
                     <p>pemesanan</p>
                 </a>
             </li>

             {{-- Contact Us --}}
             <li>
                 <a href="{{ url('contact') }}">
                     <i class="fa fa-envelope-o" aria-hidden="true"></i>
                     <p>Contact Us</p>
                 </a>
             </li>

             {{-- Tentang Aplikasi --}}
             <li>
                 <a href="{{ url('tentang') }}">
                     <i class="fa fa-question-circle" aria-hidden="true"></i>
                     <p>Tentang Aplikasi</p>
                 </a>
             </li>

             {{-- Logout --}}
             <li>
                 <a href="{{ route('logout') }}">
                     <i class="fa fa-sign-out" aria-hidden="true"></i>
                     <p>Logout</p>
                 </a>
             </li>

         </ul>
     </div>
 </div>
 <div class="main-panel">
     <!-- Navbar -->
