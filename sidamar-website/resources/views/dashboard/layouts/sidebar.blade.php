<!-- component -->
<!-- This is an example component -->
<div>
   <div class="flex overflow-hidden bg-white pt-16">
      <aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
         <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
            <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
               <div class="flex-1 px-3 bg-white divide-y space-y-1">
                  {{-- Member Start --}}
                  <ul class="space-y-2 pb-2">
                     <li>
                        <form action="#" method="GET" class="lg:hidden">
                           <label for="mobile-search" class="sr-only">Search</label>
                           <div class="relative">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                 <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                 </svg>
                              </div>
                              <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                           </div>
                        </form>
                     </li>
                     <li>
                        <a href="/dashboard" class="sidebar-a group">
                           <svg class="flex-shrink sidebar-svg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                           </svg>
                           <span class="ml-3">Dashboard</span>
                        </a>
                     </li>
                     <li>
                        <a href="/dashboard/event/" class="sidebar-a group ">
                           <svg class="flex-shrink sidebar-svg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                           </svg>
                           <span class="ml-3 flex-1 whitespace-nowrap">Event</span>
                        </a>
                     </li>
                     <li>
                        {{-- <a href="/dashboard/kas/" target="_blank" class="sidebar-a group "> --}}
                        <a href="/dashboard/bulanKas" class="sidebar-a group ">
                           <svg class="flex-shrink sidebar-svg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                              <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                           </svg>
                           <span class="ml-3 flex-1 whitespace-nowrap">Kas</span>
                        </a>
                     </li>
                     <li>
                        <a href="/dashboard/present/" class="sidebar-a group ">
                           <svg class="flex-shrink sidebar-svg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3 flex-1 whitespace-nowrap">Log Presensi</span>
                        </a>
                     </li>
                     <li>
                        <a href="#" class="sidebar-a group ">
                           <svg class="flex-shrink sidebar-svg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3 flex-1 whitespace-nowrap">Sertifikat</span>
                        </a>
                     </li>
                  </ul>
                  {{-- Member End --}}

                  {{-- Template Start --}}
                  <div>
                     <div class="space-y-2 pt-2">
                        <h6 class="flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted space-y-2 pt-2">
                              <span>Template</span>
                        </h6>
                     </div>
                     <div class="space-y-2 pt-2">
                        <a href="/dashboard/template/form" class="sidebar-a group">
                           <svg class="flex-shrink sidebar-svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                           </svg>
                           <span class="ml-4">Form</span>
                        </a>
                  </div>
                  {{-- Template End --}}

                  {{-- Admin Start --}}
                  <div>
                     <div class="space-y-2 pt-2">
                        <h6 class="flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted space-y-2 pt-2">
                              <span>Administrator</span>
                        </h6>
                     </div>
                     <div class="space-y-2 pt-2">
                        <a href="/dashboard/events" class="sidebar-a group">
                           <svg class="flex-shrink sidebar-svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                           </svg>
                           <span class="ml-4">Events</span>
                        </a>
                        <a href="/dashboard/presents" class="sidebar-a group">
                           <svg class="flex-shrink sidebar-svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                           </svg>
                           <span class="ml-4">Presents</span>
                        </a>
                        <a href="" class="sidebar-a group">
                           <svg class="flex-shrink sidebar-svg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                           <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3">Kas</span>
                        </a>
                        <a href="#" class="sidebar-a group">
                           <svg class="flex-shrink sidebar-svg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                           </svg>
                           <span class="ml-3">Proposal</span>
                        </a>
                        <a href="/dashboard/donasi/" class="sidebar-a group">
                           <svg class="flex-shrink sidebar-svg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z"/>
                              <path d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z"/>
                            </svg>
                           <span class="ml-3">Donasi</span>
                        </a>
                        <a href="/dashboard/merch/" class="sidebar-a group">
                           <svg class="flex-shrink sidebar-svg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3">Merchandise</span>
                        </a>
                        <a href="/dashboard/finance/" class="sidebar-a group">
                           <svg class="flex-shrink sidebar-svg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                           <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                           <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                           <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                           </svg>
                           <span class="ml-3">Financial Report</span>
                        </a>
                     </div>
                  </div>
                  {{-- Admin End --}}

                  {{-- Author Start --}}
                  <div>
                     <div class="space-y-2 pt-2">
                        <h6 class="flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                              <span>Author</span>
                        </h6>
                     </div>
                     </div>
                        <div class="space-y-2 pt-2">
                        <a href="/dashboard/posts" class="sidebar-a group">
                           {{-- <svg class="flex-shrink sidebar-svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                           </svg> --}}
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-richtext" viewBox="0 0 16 16">
                              <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                              <path d="M4.5 12.5A.5.5 0 0 1 5 12h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 10h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm1.639-3.708 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V8.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V8s1.54-1.274 1.639-1.208zM6.25 6a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5z"/>
                            </svg>
                           <span class="ml-4">My Post</span>
                        </a>
                        {{-- <a href="#" target="_blank" class="sidebar-a group">
                           <svg class="flex-shrink sidebar-svg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                           <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                           </svg>
                           <span class="ml-3">Kas</span>
                        </a> --}}
                     
                        
                     <a href="/dashboard/categories" class="sidebar-a group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-richtext" viewBox="0 0 16 16">
                           <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                           <path d="M4.5 12.5A.5.5 0 0 1 5 12h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 10h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm1.639-3.708 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V8.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V8s1.54-1.274 1.639-1.208zM6.25 6a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5z"/>
                        </svg>
                        <span class="ml-4">Kategori</span>
                     </a>
                  </div>
                  </div>
                  <div class="space-y-2 pt-2">
                     <a href="#" class="sidebar-a group">
                           <span class="ml-3">Log Out</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </aside>
      <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>

      {{-- Main Backup Start --}}
      {{-- <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
      <main>
         <div class="pt-10 px-4">
            <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
               <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
                  <div class="flex items-center justify-between mb-4">
                     <div class="flex-shrink-0">
                        <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">$45,385</span>
                        <h3 class="text-base font-normal text-gray-500">Sales this week</h3>
                     </div>
                     <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                        12.5%
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </div>
                  </div>
                  <div id="main-chart"></div>
               </div>
               <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                  <div class="mb-4 flex items-center justify-between">
                     <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Latest Transactions</h3>
                        <span class="text-base font-normal text-gray-500">This is a list of latest transactions</span>
                     </div>
                     <div class="flex-shrink-0">
                        <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">View all</a>
                     </div>
                  </div>
                  <div class="flex flex-col mt-8">
                     <div class="overflow-x-auto rounded-lg">
                        <div class="align-middle inline-block min-w-full">
                           <div class="shadow overflow-hidden sm:rounded-lg">
                              <table class="min-w-full divide-y divide-gray-200">
                                 <thead class="bg-gray-50">
                                    <tr>
                                       <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Transaction
                                       </th>
                                       <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Date & Time
                                       </th>
                                       <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Amount
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody class="bg-white">
                                    <tr>
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                          Payment from <span class="font-semibold">Bonnie Green</span>
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                          Apr 23 ,2021
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                          $2300
                                       </td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                          Payment refund to <span class="font-semibold">#00910</span>
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                          Apr 23 ,2021
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                          -$670
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                          Payment failed from <span class="font-semibold">#087651</span>
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                          Apr 18 ,2021
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                          $234
                                       </td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                          Payment from <span class="font-semibold">Lana Byrd</span>
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                          Apr 15 ,2021
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                          $5000
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                          Payment from <span class="font-semibold">Jese Leos</span>
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                          Apr 15 ,2021
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                          $2300
                                       </td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                          Payment from <span class="font-semibold">THEMESBERG LLC</span>
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                          Apr 11 ,2021
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                          $560
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                          Payment from <span class="font-semibold">Lana Lysle</span>
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                          Apr 6 ,2021
                                       </td>
                                       <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                          $1437
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
               <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                  <div class="flex items-center">
                     <div class="flex-shrink-0">
                        <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">2,340</span>
                        <h3 class="text-base font-normal text-gray-500">New products this week</h3>
                     </div>
                     <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                        14.6%
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </div>
                  </div>
               </div>
               <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                  <div class="flex items-center">
                     <div class="flex-shrink-0">
                        <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">5,355</span>
                        <h3 class="text-base font-normal text-gray-500">Visitors this week</h3>
                     </div>
                     <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                        32.9%
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </div>
                  </div>
               </div>
               <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                  <div class="flex items-center">
                     <div class="flex-shrink-0">
                        <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">385</span>
                        <h3 class="text-base font-normal text-gray-500">User signups this week</h3>
                     </div>
                     <div class="ml-5 w-0 flex items-center justify-end flex-1 text-red-500 text-base font-bold">
                        -2.7%
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </div>
                  </div>
               </div>
            </div>
            <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
               <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                  <div class="flex items-center justify-between mb-4">
                     <h3 class="text-xl font-bold leading-none text-gray-900">Latest Customers</h3>
                     <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                     View all
                     </a>
                  </div>
                  <div class="flow-root">
                     <ul role="list" class="divide-y divide-gray-200">
                        <li class="py-3 sm:py-4">
                           <div class="flex items-center space-x-4">
                              <div class="flex-shrink-0">
                                 <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image">
                              </div>
                              <div class="flex-1 min-w-0">
                                 <p class="text-sm font-medium text-gray-900 truncate">
                                    Neil Sims
                                 </p>
                                 <p class="text-sm text-gray-500 truncate">
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="17727a767e7b57607e7973646372653974787a">[email&#160;protected]</a>
                                 </p>
                              </div>
                              <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                 $320
                              </div>
                           </div>
                        </li>
                        <li class="py-3 sm:py-4">
                           <div class="flex items-center space-x-4">
                              <div class="flex-shrink-0">
                                 <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/bonnie-green.png" alt="Neil image">
                              </div>
                              <div class="flex-1 min-w-0">
                                 <p class="text-sm font-medium text-gray-900 truncate">
                                    Bonnie Green
                                 </p>
                                 <p class="text-sm text-gray-500 truncate">
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d4b1b9b5bdb894a3bdbab0a7a0b1a6fab7bbb9">[email&#160;protected]</a>
                                 </p>
                              </div>
                              <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                 $3467
                              </div>
                           </div>
                        </li>
                        <li class="py-3 sm:py-4">
                           <div class="flex items-center space-x-4">
                              <div class="flex-shrink-0">
                                 <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/michael-gough.png" alt="Neil image">
                              </div>
                              <div class="flex-1 min-w-0">
                                 <p class="text-sm font-medium text-gray-900 truncate">
                                    Michael Gough
                                 </p>
                                 <p class="text-sm text-gray-500 truncate">
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="57323a363e3b17203e3933242332257934383a">[email&#160;protected]</a>
                                 </p>
                              </div>
                              <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                 $67
                              </div>
                           </div>
                        </li>
                        <li class="py-3 sm:py-4">
                           <div class="flex items-center space-x-4">
                              <div class="flex-shrink-0">
                                 <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/thomas-lean.png" alt="Neil image">
                              </div>
                              <div class="flex-1 min-w-0">
                                 <p class="text-sm font-medium text-gray-900 truncate">
                                    Thomes Lean
                                 </p>
                                 <p class="text-sm text-gray-500 truncate">
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="284d45494144685f41464c5b5c4d5a064b4745">[email&#160;protected]</a>
                                 </p>
                              </div>
                              <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                 $2367
                              </div>
                           </div>
                        </li>
                        <li class="pt-3 sm:pt-4 pb-0">
                           <div class="flex items-center space-x-4">
                              <div class="flex-shrink-0">
                                 <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/lana-byrd.png" alt="Neil image">
                              </div>
                              <div class="flex-1 min-w-0">
                                 <p class="text-sm font-medium text-gray-900 truncate">
                                    Lana Byrd
                                 </p>
                                 <p class="text-sm text-gray-500 truncate">
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a2c7cfc3cbcee2d5cbccc6d1d6c7d08cc1cdcf">[email&#160;protected]</a>
                                 </p>
                              </div>
                              <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                 $367
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                  <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Acquisition Overview</h3>
                  <div class="block w-full overflow-x-auto">
                     <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                           <tr>
                              <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Top Channels</th>
                              <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Users</th>
                              <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                           </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                           <tr class="text-gray-500">
                              <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Organic Search</th>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">5,649</td>
                              <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                 <div class="flex items-center">
                                    <span class="mr-2 text-xs font-medium">30%</span>
                                    <div class="relative w-full">
                                       <div class="w-full bg-gray-200 rounded-sm h-2">
                                          <div class="bg-cyan-600 h-2 rounded-sm" style="width: 30%"></div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr class="text-gray-500">
                              <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Referral</th>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">4,025</td>
                              <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                 <div class="flex items-center">
                                    <span class="mr-2 text-xs font-medium">24%</span>
                                    <div class="relative w-full">
                                       <div class="w-full bg-gray-200 rounded-sm h-2">
                                          <div class="bg-orange-300 h-2 rounded-sm" style="width: 24%"></div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr class="text-gray-500">
                              <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Direct</th>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">3,105</td>
                              <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                 <div class="flex items-center">
                                    <span class="mr-2 text-xs font-medium">18%</span>
                                    <div class="relative w-full">
                                       <div class="w-full bg-gray-200 rounded-sm h-2">
                                          <div class="bg-teal-400 h-2 rounded-sm" style="width: 18%"></div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr class="text-gray-500">
                              <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Social</th>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">1251</td>
                              <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                 <div class="flex items-center">
                                    <span class="mr-2 text-xs font-medium">12%</span>
                                    <div class="relative w-full">
                                       <div class="w-full bg-gray-200 rounded-sm h-2">
                                          <div class="bg-pink-600 h-2 rounded-sm" style="width: 12%"></div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr class="text-gray-500">
                              <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Other</th>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">734</td>
                              <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                 <div class="flex items-center">
                                    <span class="mr-2 text-xs font-medium">9%</span>
                                    <div class="relative w-full">
                                       <div class="w-full bg-gray-200 rounded-sm h-2">
                                          <div class="bg-indigo-600 h-2 rounded-sm" style="width: 9%"></div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr class="text-gray-500">
                              <th class="border-t-0 align-middle text-sm font-normal whitespace-nowrap p-4 pb-0 text-left">Email</th>
                              <td class="border-t-0 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 pb-0">456</td>
                              <td class="border-t-0 align-middle text-xs whitespace-nowrap p-4 pb-0">
                                 <div class="flex items-center">
                                    <span class="mr-2 text-xs font-medium">7%</span>
                                    <div class="relative w-full">
                                       <div class="w-full bg-gray-200 rounded-sm h-2">
                                          <div class="bg-purple-500 h-2 rounded-sm" style="width: 7%"></div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </main>
      </div> --}}
      {{-- Main Backup End --}}
   </div>
 </div>
