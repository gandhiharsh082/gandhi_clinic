
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('paperassets')}}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{asset('paperassets')}}/img/favicon.png">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="{{asset('paperassets')}}/css/bootstrap.min.css" rel="stylesheet" />
        <link href="{{asset('paperassets')}}/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="{{asset('paperassets')}}/demo/demo.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
         <link rel="stylesheet" href="{{asset('paperassets')}}/css/bootstrap-table.min.css">
        <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
        <link href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css" rel="stylesheet">
        <style>
            body{
                font-size: 16px;
            }
        
        .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
    padding: 12px 7px;
    vertical-align: text-top;
}
        
            th {
    width: 10% !important;
}
            
        .sidebar .nav li>a, .off-canvas-sidebar .nav li>a {    
            font-size: 22px;
/*            color: black !important;*/
            }
        
        </style>
        <style>
.form-group input[type=file] {
    opacity: 1;
    position: unset;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
}
</style>
        @yield('style')
    </head>
    
<body class="">
    @yield('modal')
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{asset('paperassets')}}/img/logo-small.png">
          </div>
        </a>
        <a href="{{route('home')}}" class="simple-text logo-normal">
          {{auth()->user()->name}}
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="@if(Request::is('/')) active @endif ">
            <a href="{{route('home')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
@php $uu=auth()->user(); @endphp
            
<!--               @if(Request::is('slider')) active @endif-->
            
            <li class="@if(Request::is('patient')) active @endif  ">
            <a href="{{route('patient.index')}}">
              <i class="fa fa-user"></i>
              <p>Patient</p>
            </a>
          </li>  
            <li class="@if(Request::is('expense')) active @endif  ">
            <a href="{{route('expense.index')}}">
<!--              <i class="fa fa-user"></i>-->
              <p>₹ Expenses</p>
            </a>
          </li>
           
       
            
            
            </ul>
      </div>
    </div>
    
	    <div class="main-panel">
			<!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">{{isset($page_title)?$page_title:''}}  </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-rotate"  href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p><span class="d-lg-none d-md-block">Account</span>{{ __('Logout') }}
                  </p>
                </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
            <div class="content">
                 
               
            @yield('content')
            
	        </div>
            
    <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
<!--
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
-->
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Harsh Gandhi
              </span>
            </div>
          </div>
        </div>
      </footer>
        </div>
      
          
  </div>
    
    
  <!--   Core JS Files   -->
  <script src="{{asset('paperassets')}}/js/core/jquery.min.js"></script>
  <script src="{{asset('paperassets')}}/js/core/popper.min.js"></script>
  <script src="{{asset('paperassets')}}/js/core/bootstrap.min.js"></script>
  <script src="{{asset('paperassets')}}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
<!--  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
  <!-- Chart JS -->
<!--  <script src="{{asset('paperassets')}}/js/plugins/chartjs.min.js"></script>-->
  <!--  Notifications Plugin    -->
  <script src="{{asset('paperassets')}}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('paperassets')}}/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('paperassets')}}/demo/demo.js"></script>
    <script src="{{asset('paperassets')}}/js/bootstrap-table.min.js"></script>
    
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF/jspdf.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/extensions/export/bootstrap-table-export.min.js"></script>
    
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    
    
    <script src="{{ asset('js/iziToast.js') }}"></script>
  <script>
//    $(document).ready(function() {
//      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
//      demo.initChartsPages();
//    });
  </script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>-->
<script>$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
         error: function (x, status, error) {
             console.log(error);
                if (x.status == 401) {
                    iziToast.error({
                        color: 'Red',
                        position: 'topRight',
                        icon: 'icon-circle-check',
                        title: 'Sorry!',
                        message: 'You don\'t have permission to access',
                    });
//                     setTimeout(function(){  window.location="{{route('login')}}"; }, 1000 ); 
                    //                izitoast.warning(", ");
//                    window.location.reload();
                }
                else {
                    //                alert("An error occurred: " + status + "nError: " + error);
                }
            },
    });</script>
        <script>
function caps(element){
    element.value = element.value.toUpperCase();
}
            if (document.getElementsByTagName) {
var inputElements = document.getElementsByTagName("input");
for (i=0; inputElements[i]; i++) {
   
inputElements[i].setAttribute("autocomplete","off");

}
}
</script>
     @yield('script')
    @include('vendor.lara-izitoast.toast')
</body>

</html>  
    
    
    
    
    
   



