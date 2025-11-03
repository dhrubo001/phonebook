 @if (session()->has('success'))
     <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-3">
         {{ session('success') }}
     </div>
 @endif

 @if (session()->has('error'))
     <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-3">
         {{ session('error') }}
     </div>
 @endif

 @if (session()->has($key . '_success'))
     <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg mb-4">
         {{ session($key . '_success') }}
     </div>
 @endif

 @if (session()->has($key . '_error'))
     <div class="bg-red-100 text-red-800 px-4 py-2 rounded-lg mb-4">
         {{ session($key . '_error') }}
     </div>
 @endif
