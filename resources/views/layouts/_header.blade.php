<header x-data="{
    navbarOpen: false
    }" class="absolute top-0 left-0 z-50 w-full ">
    <div class="container mx-auto lg:px-24">
        <div class="relative flex items-center justify-between -mx-4 ">
            <div class="max-w-full px-4 w-[12rem]">
             <a href="javascript:void(0)" class="block w-full">
                 <img src="{{ asset('images/avalon-logo.png') }}" alt="logo" class="avalon-logo mt-6 lg:ml-8" />
             </a>
               
            </div>
            {{-- <div class=" flex items-center justify-between w-full -mt-4">
                <div>
                    <button @click="navbarOpen = !navbarOpen" :class="navbarOpen && 'navbarTogglerActive'"
                        id="navbarToggler"
                        class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                    </button>
                    <nav :class="!navbarOpen && 'hidden'" id="navbarCollapse"
                        class="absolute right-4 top-full w-full max-w-[250px] rounded-lg bg-white dark:bg-dark-2 py-5 px-6 shadow lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:dark:bg-transparent lg:shadow-none xl:ml-11">
                        <ul class="block lg:flex ">
                            <li>
                                <a href="{{ asset('/') }}"
                                    class="flex py-2 text-base font-medium text-dark dark:text-white hover:text-dark lg:ml-10 lg:inline-flex lg:text-white">
                                    Home
                                </a>
                            </li>
                            <li>
                             @if(request()->is('/'))
                                 <a href="#aboutUs" class="flex py-2 text-base font-medium text-dark dark:text-white hover:text-dark lg:ml-10 lg:inline-flex lg:text-white">
                                     About Us
                                 </a>
                             @else 
                                 <a href="{{ url('/#aboutUs') }}" class="flex py-2 text-base font-medium text-dark dark:text-white hover:text-dark lg:ml-10 lg:inline-flex lg:text-white">
                                     About Us
                                 </a>
                             @endif
                            </li>
                          
 
                            <li>
                                <a href="#"
                                    class="flex py-2 text-base font-medium text-dark dark:text-white hover:text-dark lg:ml-10 lg:inline-flex lg:text-white">
                                    Services
                                </a>
                            </li>
                            <li class="flex" :class="!navbarOpen && 'hidden'" id="navbarCollapse">
                                 <a href="#"
                                 class="py-3 justify-end text-base test font-medium bg-dark dark:bg-white dark:text-dark rounded-md shadow-1 dark:shadow-none px-7 text-white hover:bg-gray-2 hover:text-body-color">
                                 Contact Us
                              </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="justify-end pr-16 sm:flex lg:pr-0 mx-2 mt-6" x-data="{ isMobile: window.innerWidth <= 960 }"
                 x-init="() => {
                         console.log(window.innerWidth);
                         window.addEventListener('resize', () => {
                             isMobile = window.innerWidth <= 960;
                             console.log(window.innerWidth);
                         });
                 }">
                    <div class="flex items-center">
                        <div class="flex h-8 min-w-[50px] items-center justify-center rounded-full text-white relative">
                            <section x-data="{ modalOpen: false }">
                                <span class="inline-flex items-center justify-center leading-none bg-dark rounded-full absolute z-1" id="cart-badge">0</span>
                                <button type="button" @click="modalOpen = true" onclick="triggerModal()">
                                    <?xml version="1.0" encoding="utf-8"?>
                                    <svg width="25" height="25" viewBox="0 0 96 96"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                            <clipPath id="clip-cart">
                                                <rect width="96" height="96" />
                                            </clipPath>
                                        </defs>
                                        <g id="cart" clip-path="url(#clip-cart)">
                                            <g id="pills" transform="translate(0 -116)">
                                                <g id="Group_154" data-name="Group 154">
                                                    <path id="Path_188" data-name="Path 188"
                                                        d="M92,132H84.619a8.361,8.361,0,0,0-7.956,5.47L63.712,174.53A8.364,8.364,0,0,1,55.755,180H21.321a8.4,8.4,0,0,1-7.773-4.994l-8.925-21C2.387,148.746,6.445,143,12.4,143H57"
                                                        fill="none" stroke="#ffffff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="6" />
                                                    <circle id="Ellipse_335" data-name="Ellipse 335" cx="4.5"
                                                        cy="4.5" r="4.5" transform="translate(20 187)"
                                                        fill="none" stroke="#ffffff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="6" />
                                                    <circle id="Ellipse_336" data-name="Ellipse 336" cx="4.5"
                                                        cy="4.5" r="4.5" transform="translate(49 187)"
                                                        fill="none" stroke="#ffffff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="6" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </section>
                        </div>
                        <div class="ml-4 w-full whitespace-nowrap"
                             :class="{'hidden': isMobile, '': !isMobile}"
                         >
                            <a href="#"
                                class="py-3 text-base font-medium bg-white rounded-md shadow-1 dark:shadow-none px-7 text-dark hover:bg-gray-2 hover:text-body-color">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</header>