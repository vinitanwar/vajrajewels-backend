<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
      

        .luxury-gradient {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
        }
        
        .nav-item {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 60%;
            background: rgba(139, 92, 246, 0.2);
            border-radius: 0 8px 8px 0;
            transition: width 0.3s ease;
        }
        
        .nav-item:hover::before {
            width: 4px;
        }
        
        .nav-item.active::before {
            width: 4px;
            background: rgba(139, 92, 246, 1);
        }
        
        .nav-item.active {
            background: rgba(139, 92, 246, 0.1);
        }
        
        .logo-glow {
            text-shadow: 0 0 15px rgba(139, 92, 246, 0.5);
        }
        
        .luxury-shadow {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="flex min-h-screen overflow-hidden hide-scrollbar  bg-black  ">
        <!-- Sidebar -->
<aside id="sidebar" 
       class="w-72  sticky top-0 luxury-gradient text-white flex flex-col luxury-shadow overflow-hidden duration-500">            <!-- Decorative elements -->
            <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-purple-900/20 to-transparent"></div>
            
            <!-- Logo -->
            <div class="p-6 text-2xl font-bold border-b border-gray-700 relative">
                <div class="flex items-center">
                    <i class="fas fa-gem text-purple-400 mr-3 logo-glow"></i>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-pink-400">Vajra Jewellery</span>
                </div>
                <p class="text-xs text-gray-400 mt-1 ml-9">Premium Dashboard</p>
            </div>

            <!-- User Profile -->
            <div class="px-6 py-5 flex items-center border-b border-gray-700 ">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1364&q=80" 
                         alt="User" class="w-12 h-12 rounded-full object-cover border-2 border-purple-500/30">
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-gray-900"></div>
                </div>
                <div class="ml-4">
                    <h3 class="font-semibold">Olivia Chen</h3>
                    <p class="text-xs text-gray-400">Administrator</p>
                </div>
            </div>


            <nav class="flex-1 px-4 py-8 space-y-1">
                <a href="{{ route('dashboard') }}" class="nav-item flex items-center px-4 py-3 rounded-lg transition-all duration-300 text-purple-300 active">
                    <i class="fas fa-home w-5 mr-4 text-purple-400"></i> 
                    <span>Dashboard</span>
                    <i class="fas fa-chevron-right ml-auto text-xs text-gray-500"></i>
                </a>

                 <a href="/banners" class="nav-item flex items-center px-4 py-3 rounded-lg transition-all duration-300 text-gray-300 hover:text-white">
                    <i class="fa-solid fa-tags w-5 mr-4 text-pinkchr-400"></i> 
                    <span>Banner</span>
                    <span class="ml-auto bg-red-500/20 text-red-400 text-xs px-2 py-0.5 rounded-full">{{ \App\Models\Banner::count() }}</span>
                </a>
                
                <a href="/users" class="nav-item flex items-center px-4 py-3 rounded-lg transition-all duration-300 text-gray-300 hover:text-white">
                    <i class="fas fa-users w-5 mr-4 text-blue-400"></i> 
                    <span>Users</span>
                    <span class="ml-auto bg-blue-500/20 text-blue-400 text-xs px-2 py-0.5 rounded-full">{{ \App\Models\Siteuser::count() }}</span>
                </a>
               <a href="/category" class="nav-item flex items-center px-4 py-3 rounded-lg transition-all duration-300 text-gray-300 hover:text-white">
                    <i class="fa-solid fa-layer-group w-5 mr-4 text-blue-400"></i> 
                    <span>Category</span>
                    <span class="ml-auto bg-blue-500/20 text-blue-400 text-xs px-2 py-0.5 rounded-full">{{ \App\Models\Category::count() }}</span>
                </a>






                
                <a href="/product" class="nav-item flex items-center px-4 py-3 rounded-lg transition-all duration-300 text-gray-300 hover:text-white">
                    <i class="fas fa-cube w-5 mr-4 text-amber-400"></i> 
                    <span>Products</span>
                    <span class="ml-auto bg-amber-500/20 text-amber-400 text-xs px-2 py-0.5 rounded-full">{{ \App\Models\Product::count() }}</span>
                </a>
                
                <a href="/blogs" class="nav-item flex items-center px-4 py-3 rounded-lg transition-all duration-300 text-gray-300 hover:text-white">
                  
                    <i class="fa-solid fa-blog  w-5 mr-4 text-cyan-600"></i>
                    <span>Blog</span>
                    <span class="ml-auto bg-fuchsia-500/20 text-fuchsia-300 text-xs px-2 py-0.5 rounded-full">7</span>
                </a>
                <button onclick="handeltoggle()" class=" w-full nav-item flex items-center px-4 py-3 rounded-lg transition-all duration-300 text-gray-300 hover:text-white">
                    <i class="fas fa-shopping-bag w-5 mr-4 text-emerald-400"></i> 
                    <span>Orders</span>
                    <span class="ml-auto self-end"><i class="fa-solid fa-caret-down" id="orderIcon"></i></span>
                
    </button>

<div id="orderTogal" class="overflow-hidden transition-all duration-500  h-0 ">
  <ul class="py-3 text-sm text-gray-300 ml-4 flex flex-col gap-2">
    <li>
        <a href="/orders" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-indigo-600/20 hover:text-white transition">
            <i class="fas fa-list text-indigo-400"></i> 
            <span>All Orders</span>
        </a>
    </li>

    <li>
        <a href="/orders/pending" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-yellow-600/20 hover:text-yellow-400 transition">
            <i class="fas fa-clock text-yellow-400"></i> 
            <span>Pending Orders</span>
        </a>
    </li>

    <li>
        <a href="/orders/processing" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-600/20 hover:text-green-400 transition">
            <i class="fas fa-sync-alt text-green-400"></i> 
            <span>Processing Orders</span>
        </a>
    </li>

    <li>
        <a href="/orders/shipped" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-600/20 hover:text-blue-400 transition">
            <i class="fas fa-truck text-blue-400"></i> 
            <span>Shipped Orders</span>
        </a>
    </li>

    <li>
        <a href="/orders/delivered" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700/20 hover:text-green-400 transition">
            <i class="fas fa-check-circle text-green-400"></i> 
            <span>Delivered Orders</span>
        </a>
    </li>

    <li>
        <a href="/orders/cancelled" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-red-600/20 hover:text-red-400 transition">
            <i class="fas fa-times-circle text-red-400"></i> 
            <span>Cancelled Orders</span>
        </a>
    </li>
</ul>

</div>


   <button onclick="handeltoggle2()" class=" w-full nav-item flex items-center px-4 py-3 rounded-lg transition-all duration-300 text-gray-300 hover:text-white">
                    <i class="fa-solid fa-credit-card w-5 mr-4 text-emerald-400"></i> 
                   
                    <span>Payment</span>
                    <span class="ml-auto self-end"><i class="fa-solid fa-caret-down" id="orderIcon2"></i></span>
                
    </button>


<div id="orderTogal2" class="overflow-hidden transition-all duration-500  h-0 ">
  <ul class="py-3 text-sm text-gray-300 ml-4 flex flex-col gap-2">
    <li>
        <a href="/orders" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-indigo-600/20 hover:text-white transition">
            <i class="fas fa-list text-indigo-400"></i> 
            <span>All Orders</span>
        </a>
    </li>

    <li>
        <a href="/orders/paid" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-yellow-600/20 hover:text-yellow-400 transition">
            <i class="fa-regular fa-circle-check text-yellow-400"></i> 
            <span>Paid Orders</span>
        </a>
    </li>

    <li>
        <a href="/orders/unpaid" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-red-600/20 hover:text-red-400 transition">
            <i class="fa-solid fa-clock-rotate-left text-red-400"></i> 
            
            <span>UnPaid Orders</span>
        </a>
    </li>
</ul>

</div>






  <a href="/testimonials" class="nav-item flex items-center px-4 py-3 rounded-lg transition-all duration-300 text-gray-300 hover:text-white">
                    <i class="fa-solid fa-star w-5 mr-4 text-blue-400"></i> 
                    
                    <span>Testimonial</span>
                </a>


                
                <a href="#" class="nav-item flex items-center px-4 py-3 rounded-lg transition-all duration-300 text-gray-300 hover:text-white">
                    <i class="fas fa-chart-pie w-5 mr-4 text-rose-400"></i> 
                    <span>Analytics</span>
                </a>
                
                <a href="/settings" class="nav-item flex items-center px-4 py-3 rounded-lg transition-all duration-300 text-gray-300 hover:text-white">
                    <i class="fas fa-cog w-5 mr-4 text-gray-400"></i> 
                    <span>Settings</span>
                </a>
            </nav>

          

            <!-- Footer / Logout -->
            <div class="p-4 border-t border-gray-800">
                <a href="/logout" class="flex items-center px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800/50 transition-all duration-300">
                    <i class="fas fa-sign-out-alt w-5 mr-3"></i> 
                    <span>Logout</span>
                </a>
            </div>
        </aside>
         

        <i onclick="handelTogalSidebar()" id="sideBarIcon" class=" bg-black fa-regular fa-square-caret-left text-2xl cursor-pointer relative right-3 z-50 text-green-700 border-2 border-black rounded-full h-fit p-1 "></i>

        <!-- Main Content -->
        <main class="flex-1   overflow-auto">
            @yield('content')
        </main>
    </div>

</body>
<script>
let toggal = false;
let toggal2 = false;
const handeltoggle = () => {
    toggal = !toggal;

    const orderTogal = document.getElementById("orderTogal");
    const orderIcon = document.getElementById("orderIcon");

    if (toggal) {
        orderTogal.classList.remove("h-0");
        orderTogal.classList.add("h-62"); 
        orderIcon.classList.add("rotate-180");
    } else {
        orderTogal.classList.remove("h-62");
        orderTogal.classList.add("h-0");
        orderIcon.classList.remove("rotate-180");
    }
};
const handeltoggle2 = () => {
    toggal2 = !toggal2;

    const orderTogal = document.getElementById("orderTogal2");
    const orderIcon = document.getElementById("orderIcon2");

    if (toggal2) {
        orderTogal.classList.remove("h-0");
        orderTogal.classList.add("h-32"); 
        orderIcon.classList.add("rotate-180");
    } else {
        orderTogal.classList.remove("h-32");
        orderTogal.classList.add("h-0");
        orderIcon.classList.remove("rotate-180");
    }
};


let sidebare= true;
const handelTogalSidebar=()=>{

    sidebare= !sidebare
  const sidebar = document.getElementById("sidebar");
      const sideBarIcon = document.getElementById("sideBarIcon");
       if (sidebare) {
        sidebar.classList.remove("w-0");
        sidebar.classList.add("w-72"); 
          sideBarIcon.classList.remove("rotate-180");
    } else {
        sidebar.classList.remove("w-72");
        sidebar.classList.add("w-0");
        sideBarIcon.classList.add("rotate-180");
      
    }

}


</script>



</html>