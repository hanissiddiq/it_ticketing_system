<!--start sidebar-->
<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div class="logo-icon">
      <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-img" alt="">
    </div>
    <div class="logo-name flex-grow-1">
      <h5 class="mb-0">Maxton</h5>
    </div>
    <div class="sidebar-close">
      <span class="material-icons-outlined">close</span>
    </div>
  </div>
  <!-- ============ START : Role Superadmin ============ -->
  @hasanyrole('Super Admin')
  <div class="sidebar-nav">
      <!--navigation-->
      <ul class="metismenu" id="sidenav">
        <li>
          <a href="{{route('superadmin.dashboard')}}">
            <div class="parent-icon"><i class="material-icons-outlined">home</i>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>          
        </li>
        
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
            </div>
            <div class="menu-title">Data Master</div>
          </a>
          <ul> 
            <li><a href="{{route('departments.index')}}"><i class="material-icons-outlined">arrow_right</i>Departemen</a>
            </li>
            <li><a href="{{route('categories.index')}}"><i class="material-icons-outlined">arrow_right</i>Kategori</a>
            </li>
			<li><a href="{{route('sub-categories.index')}}"><i class="material-icons-outlined">arrow_right</i>Sub Kategori</a>
            </li>
			<li><a href="{{route('priorities.index')}}"><i class="material-icons-outlined">arrow_right</i>Prioritas</a>
            </li>
			<li><a href="widgets-data.html"><i class="material-icons-outlined">arrow_right</i>Aset</a>
            </li>
			<li><a href="widgets-data.html"><i class="material-icons-outlined">arrow_right</i>Role</a>
            </li>
            <li><a href="{{route('users.index')}}"><i class="material-icons-outlined">arrow_right</i>User</a>
            </li>
          </ul>
        </li>
        
        
		
		<!-- <li>
          <a href="cards.html">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">Laporan</div>
          </a>
        </li> -->
        {{-- Requester Ticket --}}
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">Requester Ticket</div>
          </a>
          <ul>
            <li><a href="{{ route('requester.dashboard') }}"><i class="material-icons-outlined">arrow_right</i>Dashboard Requester</a>
            </li>
            <li><a href="{{ route('requester.tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>My Tickets</a>
            </li>
          </ul>     
        </li>
        {{-- IT Support Ticket --}}
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">IT Ticket</div>
          </a>
          <ul>
            <li><a href="{{ route('itsupport.dashboard') }}"><i class="material-icons-outlined">arrow_right</i>Dashboard IT Support</a>
            </li>
            <li><a href="{{ route('itsupport.tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>My Assign Ticket</a>
            </li>
          </ul>     
        </li>
        {{-- Helpdesk Ticket --}}
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">Helpdesk Ticket</div>
          </a>
          <ul>
            <li><a href="{{ route('helpdesk.dashboard') }}"><i class="material-icons-outlined">arrow_right</i>Dashboard Helpdesk</a>
            </li>
            <li><a href="{{route ('tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>Ticket Helpdesk</a>
            </li>
          </ul>     
        </li>
        
        
		<!-- ============== Ticket ============= -->
		<li class="menu-label">Ticket</li>
        <li>
		<li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">api</i>
            </div>
            <div class="menu-title">Ticket</div>
          </a>
          <ul>
            <li>
              <a href="{{ route('tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>Buat Ticket</a>
            </li>
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>My Ticket</a>
            </li>
			      <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Ticket Ditugaskan</a>
            </li>
			      <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Ticket Eskalasi</a>
            </li>
			      <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Close Ticket</a>
            </li>
          </ul>
        </li>

        <!-- ============== Laporan ============= -->
		<li class="menu-label">Report</li>
        <li>
		<li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">api</i>
            </div>
            <div class="menu-title">Laporan</div>
          </a>
          <ul>          
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Bulanan</a>
            </li>
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Periode</a>
            </li>
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Kinerja Agen / IT Support</a>
            </li>
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Ringkasan Tren Masalah & Kategori (IT Issue Trend Analysis)</a>
            </li>
          </ul>
        </li>
		


        <li class="menu-label">Others</li>
        <li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">face_5</i>
            </div>
            <div class="menu-title">Menu Levels</div>
          </a>
          <ul>
            <li><a class="has-arrow" href="javascript:;"><i class="material-icons-outlined">arrow_right</i>Level
                One</a>
              <ul>
                <li><a class="has-arrow" href="javascript:;"><i class="material-icons-outlined">arrow_right</i>Level
                    Two</a>
                  <ul>
                    <li><a href="javascript:;"><i class="material-icons-outlined">arrow_right</i>Level Three</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        
		
		<!-- Tombol Link Logout -->
		<li>
			<a href="{{ route('logout') }}" 
			   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			   <div class="parent-icon"><i class="material-icons-outlined">power_settings_new</i>
            </div>
				<div class="menu-title">Logout</div>
			</a>
		<!-- Form Logout Tersembunyi -->
			<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				@csrf
			</form>
		</li>
       </ul>
      <!--end navigation-->
  </div>
  @endhasanyrole
  <!-- ============ END : Role Superadmin ============ -->

  <!-- ============ START : Role Admin ============ -->
   @hasanyrole('Admin')
   <div class="sidebar-nav">
      <!--navigation-->
      <ul class="metismenu" id="sidenav">
        <li>
          <a href="{{ route('admin.dashboard') }}">
            <div class="parent-icon"><i class="material-icons-outlined">home</i>
                </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>

        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
            </div>
            <div class="menu-title">Data Master</div>
          </a>
          <ul> 
            <li><a href="{{route('departments.index')}}"><i class="material-icons-outlined">arrow_right</i>Departemen</a>
            </li>
            <li><a href="{{route('categories.index')}}"><i class="material-icons-outlined">arrow_right</i>Kategori</a>
            </li>
            <li><a href="{{route('sub-categories.index')}}"><i class="material-icons-outlined">arrow_right</i>Sub Kategori</a>
            </li>
            <li><a href="{{route('priorities.index')}}"><i class="material-icons-outlined">arrow_right</i>Prioritas</a>
            </li>			
            <li><a href="{{route('users.index')}}"><i class="material-icons-outlined">arrow_right</i>User</a>
            </li>
          </ul>
        </li>      

        <li>
          <a href="{{ route('logout') }}" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="parent-icon"><i class="material-icons-outlined">power_settings_new</i>
                </div>
            <div class="menu-title">Logout</div>
          </a>
        <!-- Form Logout Tersembunyi -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
		    </li>
      </ul>
    </div>
   @endhasanyrole
  <!-- ============ END : Role Admin ============ -->

  <!-- ============ START : Role Manager IT ============ -->
   @hasanyrole('Manager IT')
   <div class="sidebar-nav">
      <!--navigation-->
      <ul class="metismenu" id="sidenav">
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
            </div>
            <div class="menu-title">Data Master</div>
          </a>
          <ul> 
            <li><a href="{{route('departments.index')}}"><i class="material-icons-outlined">arrow_right</i>Departemen</a>
            </li>
            <li><a href="{{route('categories.index')}}"><i class="material-icons-outlined">arrow_right</i>Kategori</a>
            </li>
			<li><a href="{{route('sub-categories.index')}}"><i class="material-icons-outlined">arrow_right</i>Sub Kategori</a>
            </li>
			<li><a href="{{route('priorities.index')}}"><i class="material-icons-outlined">arrow_right</i>Prioritas</a>
            </li>
			<li><a href="widgets-data.html"><i class="material-icons-outlined">arrow_right</i>Aset</a>
            </li>
			<li><a href="widgets-data.html"><i class="material-icons-outlined">arrow_right</i>Role</a>
            </li>
            <li><a href="{{route('users.index')}}"><i class="material-icons-outlined">arrow_right</i>User</a>
            </li>
          </ul>
        </li>
        
        
        {{-- Requester Ticket --}}
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">Requester Ticket</div>
          </a>
          <ul>
            <li><a href="{{ route('requester.dashboard') }}"><i class="material-icons-outlined">arrow_right</i>Dashboard Requester</a>
            </li>
            <li><a href="{{ route('requester.tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>My Tickets</a>
            </li>
          </ul>     
        </li>
        {{-- IT Support Ticket --}}
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">IT Ticket</div>
          </a>
          <ul>
            <li><a href="{{ route('itsupport.dashboard') }}"><i class="material-icons-outlined">arrow_right</i>Dashboard IT Support</a>
            </li>
            <li><a href="{{ route('itsupport.tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>My Assign Ticket</a>
            </li>
          </ul>     
        </li>
        {{-- Helpdesk Ticket --}}
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">Helpdesk Ticket</div>
          </a>
          <ul>
            <li><a href="{{ route('helpdesk.dashboard') }}"><i class="material-icons-outlined">arrow_right</i>Dashboard Helpdesk</a>
            </li>
            <li><a href="{{route ('tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>Ticket Helpdesk</a>
            </li>
          </ul>     
        </li>
        
        
		<!-- ============== Ticket ============= -->
		<li class="menu-label">Ticket</li>
    <li>
		<li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">api</i>
            </div>
            <div class="menu-title">Ticket</div>
          </a>
          <ul>
            <li>
              <a href="{{ route('tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>Buat Ticket</a>
            </li>
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>My Ticket</a>
            </li>
			      <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Ticket Ditugaskan</a>
            </li>
			      <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Ticket Eskalasi</a>
            </li>
			      <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Close Ticket</a>
            </li>
          </ul>
        </li>

        <!-- ============== Laporan ============= -->
		<li class="menu-label">Report</li>
        <li>
		<li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">api</i>
            </div>
            <div class="menu-title">Laporan</div>
          </a>
          <ul>          
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Bulanan</a>
            </li>
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Periode</a>
            </li>
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Kinerja Agen / IT Support</a>
            </li>
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Ringkasan Tren Masalah & Kategori (IT Issue Trend Analysis)</a>
            </li>
          </ul>
        </li>
		


        <li class="menu-label">Others</li>
        <li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">face_5</i>
            </div>
            <div class="menu-title">Menu Levels</div>
          </a>
          <ul>
            <li><a class="has-arrow" href="javascript:;"><i class="material-icons-outlined">arrow_right</i>Level
                One</a>
              <ul>
                <li><a class="has-arrow" href="javascript:;"><i class="material-icons-outlined">arrow_right</i>Level
                    Two</a>
                  <ul>
                    <li><a href="javascript:;"><i class="material-icons-outlined">arrow_right</i>Level Three</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        
		
		<!-- Tombol Link Logout -->
		<li>
			<a href="{{ route('logout') }}" 
			   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			   <div class="parent-icon"><i class="material-icons-outlined">power_settings_new</i>
            </div>
				<div class="menu-title">Logout</div>
			</a>
		<!-- Form Logout Tersembunyi -->
			<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				@csrf
			</form>
		</li>
       </ul>
      <!--end navigation-->
  </div>
  @endhasanyrole  
  <!-- ============ END : Role Manager IT ============ -->


  <!-- ============ START : Role Supervisor IT ============ -->
   @hasanyrole('Supervisor')
   <div class="sidebar-nav">
    <ul class="metismenu" id="sidenav">
      {{-- Supervisor Ticket --}}
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">Supervisor Ticket</div>
          </a>
          <ul>
            <li><a href="{{ route('itsupport.dashboard') }}"><i class="material-icons-outlined">arrow_right</i>Dashboard Supervisor</a>
            </li>
            <li><a href="{{ route('itsupport.tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>My Ticket</a>
            </li>
          </ul>     
        </li>
      
    <!-- ============== Laporan ============= -->
		<li class="menu-label">Report</li>
        <!-- <li> -->
		<li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">api</i>
            </div>
            <div class="menu-title">Laporan</div>
          </a>
          <ul>          
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Bulanan</a>
            </li>
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Periode</a>
            </li>
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Kinerja Agen / IT Support</a>
            </li>
            <li>
              <a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Laporan Ringkasan Tren Masalah & Kategori (IT Issue Trend Analysis)</a>
            </li>
          </ul>
        </li>

        <!-- Tombol Link Logout -->
      <li>
        <a href="{{ route('logout') }}" 
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <div class="parent-icon"><i class="material-icons-outlined">power_settings_new</i>
              </div>
          <div class="menu-title">Logout</div>
        </a>
      <!-- Form Logout Tersembunyi -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
  </div>
   @endhasanyrole 
  <!-- ============ END : Role Supervisor IT ============ -->

  <!-- ============ START : Role IT Support ============ -->
   @hasanyrole('IT Support')
    <div class="sidebar-nav">
    <ul class="metismenu" id="sidenav">
      {{-- IT Support Ticket --}}
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">IT Ticket</div>
          </a>
          <ul>
            <li><a href="{{ route('itsupport.dashboard') }}"><i class="material-icons-outlined">arrow_right</i>Dashboard IT Support</a>
            </li>
            <li><a href="{{ route('itsupport.tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>My Assign Ticket</a>
            </li>
          </ul>     
        </li>

        <!-- Tombol Link Logout -->
      <li>
        <a href="{{ route('logout') }}" 
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <div class="parent-icon"><i class="material-icons-outlined">power_settings_new</i>
              </div>
          <div class="menu-title">Logout</div>
        </a>
      <!-- Form Logout Tersembunyi -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
  </div>
  @endhasanyrole
  <!-- ============ END : Role IT Support ============ -->

  <!-- ============ START : Role Helpdesk ============ -->
   @hasanyrole('Helpdesk')
  <div class="sidebar-nav">
    <ul class="metismenu" id="sidenav">
      {{-- Helpdesk Ticket --}}
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">Helpdesk Ticket</div>
          </a>
          <ul>
            <li><a href="{{ route('helpdesk.dashboard') }}"><i class="material-icons-outlined">arrow_right</i>Dashboard Helpdesk</a>
            </li>
            <li><a href="{{route ('tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>Ticket Helpdesk</a>
            </li>
          </ul>     
        </li>

        <!-- Tombol Link Logout -->
      <li>
        <a href="{{ route('logout') }}" 
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <div class="parent-icon"><i class="material-icons-outlined">power_settings_new</i>
              </div>
          <div class="menu-title">Logout</div>
        </a>
      <!-- Form Logout Tersembunyi -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
  </div>
  @endhasanyrole
  <!-- ============ END : Role Helpdesk ============ -->

  <!-- ============ START : Role Requester / User ============ -->
   @hasanyrole('User')
   <div class="sidebar-nav">
      <!--navigation-->
      <ul class="metismenu" id="sidenav">
   
      {{-- Requester Ticket --}}
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">Requester Ticket</div>
          </a>
          <ul>
            <li><a href="{{ route('requester.dashboard') }}"><i class="material-icons-outlined">arrow_right</i>Dashboard Requester</a>
            </li>
            <li><a href="{{ route('requester.tickets.index') }}"><i class="material-icons-outlined">arrow_right</i>My Tickets</a>
            </li>
          </ul>     
        </li>		       
		
		<!-- Tombol Link Logout -->
		<li>
			<a href="{{ route('logout') }}" 
			   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			   <div class="parent-icon"><i class="material-icons-outlined">power_settings_new</i>
            </div>
				<div class="menu-title">Logout</div>
			</a>
		<!-- Form Logout Tersembunyi -->
			<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				@csrf
			</form>
		</li>
    </ul>
      <!--end navigation-->
  </div>
  @endhasanyrole 
  <!-- ============ END : Role Requester /User ============ -->
</aside>

<!--end sidebar-->