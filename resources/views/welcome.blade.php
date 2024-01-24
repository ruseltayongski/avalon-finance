@extends('layouts.app')

@section('content')

@section('css')
<style>
   .background-rgb {
      background: linear-gradient(
      to right, 
      rgba(29,91,128,0.3),
      rgba(50,118,155,0.3),
      rgba(159,202,218,0.3)
      );
   }

   .what-we-do {
      background: linear-gradient(
         to left, 
         rgba(39, 104, 142, 0.3), 
         rgba(38, 58, 150, 0.3), /* medium blue */
         rgba(90, 120, 190, 0.3), /* lighter blue */
         rgba(143, 161, 180, 0.3), /* soft blue transitioning to warm */
         rgba(244, 241, 239, 0.3)  /* sunset orange */
      );
   }
   
   /* .card-bg {
      background-color: rgba(79, 117, 155, 0.85);
   } */

   .flex a svg {
      transition: transform 0.3s ease;
   }

   .flex a:hover svg {
      transform: translateY(-55px);
   }

   .flex a:hover {
      cursor: pointer;
      filter: brightness(1.2);
   }

   .flex:hover #svg-description {
      opacity: 1;
      color: white;
   }

   #svg-description {
      opacity: 0;
      /* transition: opacity 0.5s ease-in-out; */
      margin-top:10px;
   }
   
   .flex a:not(:hover) #svg-description {
      opacity: 0;
   }

   .icon-padding-bottom {
      /* padding-top: 2rem; */
      /* background-color: yellow; */
      /* position:absolute; */
      bottom: 0;
      padding-bottom: 2rem;
   }
   /* @media screen and (min-width: 960px) {
      .icon-margin-top {
         padding-top: 6rem;
      }
   } */

   .blob-image {
      width: 275px;
      position: absolute;
      z-index: 10;
      right: -73px;
      top: -184px;
      overflow: hidden;
   }

   .bacground-image-hero { 
      background: url("{{ asset('/images/v2crop.png') }}") no-repeat center center; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: 100% 100%;
      height: 20vh;
   }

   .newsletter-bg {
    background: url("{{ asset('/images/newsletter.png') }}") no-repeat center; 
    background-size: 100% 100%;
 /*    background-size: cover; */
   /*  height: 100vh; */
   /*    background-size: 100% 100%;; */
   }
   .avalon-logo-footer {
    background: url("{{ asset('/images/avalonlogo.png') }}") no-repeat center; 
    width: 100%;
    height: auto;
/*     background-size: 100% auto; */
   }
   /* .box {
      content: "";
    width: 275px;
    height: 275px;
    position: absolute;
    right: -137.5px;
    bottom: -137.5px;
    background-color: #faf8fd;
    z-index: -1;
    border-radius: 100%;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
}
    */

   .media-section {
      border-radius: 276px 0 250px 0;
    }

   .text-shadow {
      text-shadow: 3px -3px 3px rgba(0, 0, 0, 0.6); /* You may adjust these values as needed */
   }

     #cart-badge {
      font-size:5pt;
      padding:3px 5px;
      top:0;
      right:0;
   }

   /* .avalon-logo {
      width: 40%;
      height: 40%;
   } */

</style>
@endsection
<div 
    :class="{ 'relative z-10 bg-cover bg-center bg-no-repeat pt-[30px] pb-20 md:pt-[100px]': isMobile, 'z-10 relative bacground-image-hero': !isMobile }"
    :style="isMobile ? 'background-image: url({{ asset('/images/v2crop.png') }})' : ''">
</div>
<section class="relative z-40 pb-32">
   <div class="absolute top-0 left-0 z-[-1] h-1/2 w-full bg-[#011523] dark:bg-dark-3"></div>
   <div class="container mx-auto pt-28">
      <div class="flex flex-wrap items-center xs:-mx-4">
         <div class="w-full px-4 lg:w-6/12 xl:w-7/12 pb-8">
            <div class="lg:pb-[240px] pb-24 lg:px-16 ">
               <span class="block mb-6 text-base font-medium text-white dark:text-white animate-fade-right animate-duration-1000 animate-delay-300">
                  Finance Process
               </span>
               <h2 class="text-[35px] font-semibold leading-tight text-white dark:text-white animate-fade-up animate-duration-1000 animate-delay-500">
                  Let’s Get It Done.
               </h2>
            </div>
            <div class="mx-auto text-center rounded-md">
               <div class="overflow-x-auto shadow-product dark:shadow-box-dark mx-auto inline-flex justify-center rounded-md bg-white dark:bg-dark-2 py-7 px-5 sm:py-9 sm:px-10 sm:w-full ">
                  <div class="-mx-3 flex items-center justify-center sm:-mx-6 md:-mx-10 lg:-mx-[50px] ">
                     <div class="relative px-3 text-center sm:px-6 md:px-10 lg:px-[50px]" :class="{ 'ml-32': window.innerWidth == 1024 }">
                        <span class="bg-stroke absolute top-[16px] -right-[45px] block h-0.5 w-[90px] sm:-right-[70px] sm:w-[140px] md:-right-[75px] md:w-[150px]"></span>
                        <span class="border-stroke bg-slate-100 relative z-10 mx-auto mb-2 flex h-[34px] w-[34px] items-center justify-center rounded-full border-2 text-base font-medium text-slate-600">
                           1
                        </span>
                        <span class="text-body-color dark:text-dark-6 text-[11px] font-medium xs:text-base">
                        Log In
                        </span>
                     </div>
                     <div class="relative px-3 text-center sm:px-6 md:px-10 lg:px-[50px]">
                        <span class="bg-stroke dark:bg-dark-3 absolute top-[16px] -right-[45px] block h-0.5 w-[90px] sm:-right-[70px] sm:w-[140px] md:-right-[75px] md:w-[150px]"></span>
                        <span class="border-stroke bg-[#FFC688] relative z-10 mx-auto mb-[10px] flex h-[34px] w-[34px] items-center justify-center rounded-full border-2 text-base font-medium text-slate-400">
                           2
                        </span>
                        <span class="lg:whitespace-nowrap text-body-color dark:text-dark-6 text-[11px] font-medium xs:text-base">
                           Input Details
                        </span>
                     </div>
                     <div class="relative px-3 text-center sm:px-6 md:px-10 lg:px-[50px] ">
                        <span class="bg-stroke dark:bg-dark-3 absolute top-[16px] -right-[45px] block h-0.5 w-[90px] sm:-right-[70px] sm:w-[140px] md:-right-[75px] md:w-[150px]"></span>
                        <span class="border-stroke dark:border-dark-3 bg-[#FFA84A] dark:bg-dark-2 relative z-10 mx-auto mb-[10px] flex h-[34px] w-[34px] items-center justify-center rounded-full border-2 text-base font-medium text-body-color dark:text-dark-6">
                           3
                        </span>
                        <span class="lg:whitespace-nowrap text-body-color dark:text-dark-6 text-[11px] xs:text-base">
                           Process Options
                        </span>
                     </div>
                     <div class="px-3 text-center sm:px-6 md:px-10 lg:px-[50px] xs:text-base xs:mb-5">
                        <span class="border-stroke dark:border-dark-3 bg-green dark:bg-dark-2 relative z-10 mx-auto mb-[10px] flex h-[34px] w-[34px] items-center justify-center rounded-full border-2 text-base font-medium text-body-color dark:text-dark-6">
                           <svg
                              width="16"
                              height="12"
                              viewBox="0 0 16 12"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                              >
                              <path
                                 fill-rule="evenodd"
                                 clip-rule="evenodd"
                                 d="M15.671 0.491162L15.6941 0.521153C16.1124 1.06264 16.1273 1.9008 15.5768 2.45815L7.29232 11.3732C6.92972 11.7721 6.43864 12 5.89584 12C5.38903 12 4.87105 11.7821 4.49894 11.3727L0.376545 6.92507C-0.125563 6.36795 -0.125491 5.51224 0.376618 4.95512C0.931025 4.33998 1.8678 4.33778 2.42493 4.94855L5.91939 8.71874L13.5978 0.455859C14.155 -0.154327 15.0914 -0.151944 15.6456 0.46301L15.671 0.491162Z"
                                 fill="white"
                                 />
                           </svg>
                        </span>
                        <span class="text-body-color dark:text-dark-6 text-[11px] font-medium xs:text-base ">
                        Complete
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="w-full px-4 lg:w-6/12 xl:w-5/12 opacity-0" id="sendUsMessage">
            <div class="pt-12 pb-20 rounded-lg bg-white shadow-3 dark:bg-dark-2 animate-fade-up animate-duration-1000 animate-delay-500">
               <div class="flex flex-wrap -mx-4">
               <div class="w-full px-4 ">
                  <div class="relative mx-auto overflow-hidden rounded-lg xs:px-8 text-center md:px-[50px] dark:bg-dark-2">
                     <div class="mb-10 text-center md:mb-16">
                        <a
                           href="javascript:void(0)"
                           class="mx-auto inline-block max-w-[160px]"
                           >
                        <img
                           src="{{ asset('images/avalon-logo.png') }}"
                           alt="logo"
                           />
                        </a>
                     </div>
                     <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                           <input
                              type="email"
                              placeholder="Email"
                              required
                              class="w-full px-5 py-3 text-base bg-transparent border rounded-md outline-none border-stroke text-body-color dark:text-white dark:border-dark-3 focus:border-dark focus-visible:shadow-none"
                              />
                              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="mb-6">
                           <input
                              type="password"
                              placeholder="Password"
                              required
                              class="w-full px-5 py-3 text-base bg-transparent border rounded-md outline-none border-stroke text-body-color dark:text-white dark:border-dark-3 focus:border-dark focus-visible:shadow-none"
                              />
                        </div>
                        <div class="mb-10">
                           <button
                              type="submit"
                              class="w-full px-5 py-3 text-base font-medium text-white transition border rounded-md cursor-pointer border-dark bg-dark hover:bg-opacity-90"
                              >
                              Sign In
                           </button>
                        </div>
                     </form>
                     <a
                        href="javascript:void(0)"
                        class="inline-block mb-2 text-base text-dark dark:text-white hover:text-dark hover:underline"
                        >
                     Forget Password?
                     </a>
                  </div>
               </div>
            </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection

@section('js')
<script>
   document.addEventListener("DOMContentLoaded", function() {
      var elementIds = [
               "sendUsMessage", 
               "whatWeHelp", 
               "ourLocation", 
               "join", 
               "signUp", 
               "subscribe", 
               "footerSection"
            ];
      var animationClasses = {
         sendUsMessage: "animate-fade-up",
         ourLocation: "animate-fade-right",
         whatWeHelp: "animate-fade-left",
         join: "animate-fade-up",
         signUp: "animate-fade-up",
         subscribe: "animate-fade-up",
         footerSection: "animate-fade-right",
      };

      var animationDelays = {
         join: 100,
         signUp: 500,
         subscribe: 700,
      };

      var observer = new IntersectionObserver(function(entries) {
         entries.forEach(function(entry) {
               if (entry.isIntersecting) {
                  var animationClass = animationClasses[entry.target.id];
                  var delay = animationDelays[entry.target.id];

                  setTimeout(() => {
                     entry.target.classList.add(animationClass);
                  }, delay);
               } else {
                  entry.target.style.opacity = 0;
               }
         });
      }, { threshold: 0 });

      elementIds.forEach(function(elementId) {
         var element = document.getElementById(elementId);
         if (element) {
               observer.observe(element);
         }
      });
   });
</script>
@endsection