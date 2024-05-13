<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="refresh" content="time; URL=http://127.0.0.1:5500/ajaxpage.html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link
    
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
   
     
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <style>
   
@media (min-width: 1024px) {
  .container {
    width: 100%;
    max-width: none; 
  }

  .sidebarr {
    width: 200px; 
  }

  .main-content {
    margin-left: 150px;
     width: calc(100% - 20px); 
  }
}
@media (min-width: 1200px) {
 
  .sidebarr {
    width: 200px;
  }

  .main-content {
    margin-left: 150px; 
    width: calc(100% - 20px);
  }
 }
 .sticky {
        position: sticky;
        top: 0;
    }



  </style>
  <body class="bg-gray-100">
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <nav style=""
      class="md:text-sm navbar navbar-expand-lg navbar-expand-sm navbar-expand-md bg-white "
    >
      <div class="container-fluid ">
        <a class="navbar-brand" href="#">
          
          <b class="font-serif text-white "></b>
        </a>
        <div class="font-serif " id="navbarSupportedContent">
          <ul class="mr-auto navbar-nav ">
            <li  class="nav-item active">
              <a class="text-black font-bold nav-link d-none d-sm-none d-md-none d-lg-inline-block d-xl-inline-block" href="dashboard">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class=" nav-item">
              <a class="text-black font-bold nav-link d-none d-sm-none d-md-none d-lg-inline-block d-xl-inline-block" href="#">About</a>
            </li>
            <li class="nav-item active">
              <a href="login" class="text-black font-bold nav-link d-none d-sm-none d-md-none d-lg-inline-block d-xl-inline-block" >Logout <span class="sr-only">(current)</span></a>
            
            </li>
            <li class="nav-item active">
              <a  href="#sidebar" class="text-black font-bold d-none d-lg-none d-xl-none d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block " data-bs-toggle="offcanvas"
              role="button" aria-controls="sidebar"><i class="bi bi-three-dots "></i></a>
            </li>

          
            
          </ul>
      </div>
      
    </nav>
   
    <div class="offcanvas offcanvas-top bg-gradient-to-r from-teal-800 to-orange-100 " tabindex="-1" id="sidebar" aria-labelledby="sidebar-label">
      <div class="offcanvas-header">
        <h5 class="font-serif font-bold text-black font-bold offcanvas-title" id="sidebar-label">Menu</h5>
      </div>
     <hr style="color: white;">
      <div class="offcanvas-body">
        <div class="row">
          <div class="col-md-6 col-lg-6">
            <a class="font-serif font-bold text-white nav-link" href="dashboard">Home <span class="sr-only">(current)</span></a>
          </div>
          <div class="col-md-6 col-lg-6">
            <a class="font-serif font-bold text-white nav-link" href="#">About <span class="sr-only">(current)</span></a>
          </div>
          <div class="col-md-6 col-lg-6">
            <a class="font-serif font-bold text-white nav-link" href="logout">Logout <span class="sr-only">(current)</span></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-6">
          
              <a href="logout" class="text-black nav-link d-none d-sm-none d-md-none d-lg-inline-block d-xl-inline-block" >Logout <span class="sr-only">(current)</span></a>
            
                </div>
          
        </div>
      </div>
    </div>
    <div class="flex bg-gray-100 ">
      <div id="sidebarr"class="sidebarr "">
        <span class="absolute left-0 text-2xl text-white cursor-pointer top-13" onclick="Open()">
          <i class="px-2 bg-gray-700 rounded-md bi bi-filter-left d-none d-lg-none d-xl-none d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block"></i>
        </span>
        <div style="background-color: #96BBBB"
          class="sidebar h-100 lg:left-0 fixed top-[0px] bottom-0 lg:w-[270px] overflow-y-auto text-center ">
        
          <div class="text-xltext-black font-boldext-gray-100 ">
            <div class="p-2.5 mt-1 flex items-center">
              <i style="background-color: #96BBBB" class="px-2 py-1  rounded-md bi bi-app-indicator"></i>
              <h1 class=" text-[15px] ml-3 text-black font-bold"> Home Page </h1>
              
              <i
                class="ml-20 cursor-pointer bi bi-x d-none d-lg-none d-xl-none d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block"
                onclick="Open()"></i>
            </div>
           
            <div>
              
            </div>
            <hr class="my-2 text-black font-bold">
            <div
              class="flex p-2.5 cursor-pointer hover:bg-teal-800 mt-3 items-center rounded-md px-4 duration-300">
              <a class="text-[15px] ml-2 text-black font-bold" href="ticket">Ticket Information</a>
            </div>
            <hr class="my-2 text-black font-bold">
            <div
              class="flex p-2.5 cursor-pointer  hover:bg-teal-800 mt-3 items-center rounded-md px-4 duration-300">
              <a class="text-[15px] ml-2 text-black font-bold" href="reservations">Reserve Tickets</a>
            </div>
            <hr class="my-2 text-black font-bold">
           
        
          <div
          class="flex p-2.5 cursor-pointer hover:bg-teal-800 mt-3 items-center rounded-md px-4 duration-300">
          <a class="text-[15px] ml-2 text-black font-bold" href="feedback">Feedback</a>
        </div>
        
         
       
      
        
          
          </div>
        </div>
      </div>

      <div class=" bg-gray-100  main-content md:w-full sm:w-full xs:w-full" id="main-content">
        <div>
          <!-- Check for session and display appropriate message -->
          @if (Session::has('success'))
          <div class="bg-green-200 text-green-800 px-4 py-2">
              {{ Session::get('success') }}
          </div>
          @endif
  
          @if (Session::has('failure'))
          <div class="bg-red-200 text-red-800 px-4 py-2">
              {{ Session::get('failure') }}
          </div>
          @endif
      </div>
        @yield('content')
      </div>
    
    </div>
  
    
  </body>
  
  </html>
  <script>
    window.addEventListener('scroll', function() {
        const sidebar = document.querySelector('.sidebarr');
        if (window.innerWidth > 1020) {
            if (window.scrollY > 0) {
                sidebar.classList.add('sticky');
            } else {
                sidebar.classList.remove('sticky');
            }
        }
    });
    function Open() {
  const sidebar = document.querySelector('.sidebar');
  if (window.innerWidth <= 1020) {
  sidebar.classList.toggle('left-[-270px]');
}}
  </script>