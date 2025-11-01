 <!-- Top Navbar -->
 <header class="bg-white shadow p-4 flex justify-between items-center">
     <h1 class="text-xl font-semibold text-gray-700">Dashboard</h1>
     <div class="flex items-center space-x-3">
         <span class="text-gray-600 text-sm">Welcome, {{ Auth::user()->getFirstname() }}</span>
         <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" alt="User Avatar" />
     </div>
 </header>
