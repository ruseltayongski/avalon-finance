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
    x-data="{ isMobile: window.innerWidth <= 1024 }"
    x-init="() => {
        window.addEventListener('resize', () => {
            isMobile = window.innerWidth <= 1024;
            console.log(window.innerWidth);
        });
    }"
    :class="{ 'relative z-10 bg-cover bg-center bg-no-repeat pt-[120px] pb-20 md:pt-[150px]': isMobile, 'z-10 relative bacground-image-hero': !isMobile }"
    :style="isMobile ? 'background-image: url({{ asset('/images/v2crop.png') }})' : ''">
    
</div>


<section class="relative z-40 py-20 lg:py-[120px] dark:bg-[#011523]">
    <div
       class="absolute top-0 left-0 z-[-1] h-1/2 w-full bg-[#011523] dark:bg-dark-3"
       ></div>
    <div class="container mx-auto">
       <div class="flex flex-wrap items-center xs:-mx-4">
          <div class="w-full px-4 lg:w-6/12 xl:w-7/12">
             <div class="mb-[60px] lg:mb-[100px] xl:mb-[150px]">
                <span
                   class="block mb-6 text-base font-medium text-white dark:text-white animate-fade-right animate-duration-1000 animate-delay-300"
                   >
                Finance Process
                </span>
                <h2 
            
                   class="text-[35px] font-semibold leading-tight text-white dark:text-white animate-fade-up animate-duration-1000 animate-delay-500"
                   >
                   Let’s Get It Done.
                </h2>
             </div>
             <div class="flex flex-wrap -mx-4" 
                x-data="{ isMobile: window.innerWidth <= 912 }"
                x-init="() => {
                   window.addEventListener('resize', () => {
                      isMobile = window.innerWidth <= 912;
                   });
                }">
                {{-- <div class="w-full max-w-[330px] px-4" id="ourLocation">
                   <div class="w-full mb-12">
                      <div class="flex">
                         <div class="mr-6 text-primary h-9 w-9">
                            <svg
                               width="32"
                               height="32"
                               viewBox="0 0 32 32"
                               fill="none"
                               xmlns="http://www.w3.org/2000/svg"
                               >
                               <path
                                  d="M16 0.899902C9.1 0.899902 3.5 6.2999 3.5 12.9499C3.5 17.9999 10.2 25.9999 14.15 30.2999C14.65 30.8499 15.3 31.0999 16 31.0999C16.7 31.0999 17.35 30.7999 17.85 30.2999C21.8 25.9999 28.5 17.9999 28.5 12.9499C28.5 6.2999 22.9 0.899902 16 0.899902ZM16.2 28.7999C16.1 28.8999 15.95 28.8999 15.8 28.7999C10.95 23.4999 5.75 16.5999 5.75 12.9499C5.75 7.5499 10.35 3.1499 16 3.1499C21.65 3.1499 26.25 7.5499 26.25 12.9499C26.25 16.5999 21.05 23.4999 16.2 28.7999Z"
                                  :fill="isMobile ? 'white' : '#011523'"
                                  />
                               <path
                                  d="M16 7.84985C13 7.84985 10.55 10.2999 10.55 13.2999C10.55 16.2999 13 18.7999 16 18.7999C19 18.7999 21.45 16.3499 21.45 13.3499C21.45 10.3499 19 7.84985 16 7.84985ZM16 16.5499C14.2 16.5499 12.8 15.0999 12.8 13.3499C12.8 11.5999 14.25 10.1499 16 10.1499C17.75 10.1499 19.2 11.5999 19.2 13.3499C19.2 15.0999 17.8 16.5499 16 16.5499Z"
                                  :fill="isMobile ? 'white' : '#011523'"
                                  />
                            </svg>
                         </div>
                         <div>
                            <h5
                               class="mb-4 text-lg font-medium text-dark dark:text-white"              
                               :style="isMobile ? 'color: white;' : ''">
                               Our Location
                            </h5>
                            <p class="text-base text-body-color dark:text-dark-6"
                            
                            :style="isMobile ? 'color: white;' : ''">
                            401 Broadway, 24th Floor, Orchard Cloud View, London
                           </p>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="w-full max-w-[330px] px-4" id="whatWeHelp">
                   <div class="w-full mb-12">
                      <div class="flex">
                         <div class="mr-6 text-primary h-9 w-9">
                            <svg
                               width="32"
                               height="32"
                               viewBox="0 0 32 32"
                               fill="none"
                               xmlns="http://www.w3.org/2000/svg"
                               >
                               <path
                                  d="M28 4.80005H4.00001C2.30001 4.80005 0.850006 6.20005 0.850006 7.95005V24.15C0.850006 25.85 2.25001 27.3 4.00001 27.3H28C29.7 27.3 31.15 25.9 31.15 24.15V7.90005C31.15 6.20005 29.7 4.80005 28 4.80005ZM28 7.05005C28.05 7.05005 28.1 7.05005 28.15 7.05005L16 14.85L3.85001 7.05005C3.90001 7.05005 3.95001 7.05005 4.00001 7.05005H28ZM28 24.9501H4.00001C3.50001 24.9501 3.10001 24.55 3.10001 24.05V9.25005L14.8 16.75C15.15 17 15.55 17.1 15.95 17.1C16.35 17.1 16.75 17 17.1 16.75L28.8 9.25005V24.1C28.9 24.6 28.5 24.9501 28 24.9501Z"
                                  :fill="isMobile ? 'white' : '#011523'"
                                  />
                            </svg>
                         </div>
                         <div>
                            <h5
                               class="mb-4 text-lg font-medium text-dark dark:text-white"
                               :style="isMobile ? 'color: white;' : ''">
                               How Can We Help?
                            </h5>
                            <p
                               class="mb-2 text-base text-body-color dark:text-dark-6"
                               :style="isMobile ? 'color: white;' : ''">
                               info@yourdomain.com
                            </p>
                            <p class="text-base text-body-color dark:text-dark-6" :style="isMobile ? 'color: white;' : ''">
                               contact@yourdomain.com
                            </p>
                         </div>
                      </div>
                   </div>
                </div> --}}
                <div class="mx-auto px-4 text-center sm:container">
                  <div
                     class="shadow-product dark:shadow-box-dark mx-auto inline-flex justify-center rounded-md bg-white dark:bg-dark-2 py-7 px-5 sm:py-9 sm:px-10"
                     >
                     <div
                        class="-mx-3 flex items-center justify-center sm:-mx-6 md:-mx-10 lg:-mx-[50px]"
                        >
                        <div
                           class="relative px-3 text-center sm:px-6 md:px-10 lg:px-[50px]"
                           >
                           <span
                              class="bg-primary absolute top-[16px] -right-[45px] block h-0.5 w-[90px] sm:-right-[70px] sm:w-[140px] md:-right-[75px] md:w-[150px]"
                              ></span>
                           <span
                              class="border-primary bg-primary relative z-10 mx-auto mb-2 flex h-[34px] w-[34px] items-center justify-center rounded-full border-2 text-base font-medium text-white"
                              >
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
                           <span
                              class="text-body-color dark:text-dark-6 text-[10px] font-medium sm:text-base"
                              >
                           Customer
                           </span>
                        </div>
                        <div
                           class="relative px-3 text-center sm:px-6 md:px-10 lg:px-[50px]"
                           >
                           <span
                              class="bg-stroke dark:bg-dark-3 absolute top-[16px] -right-[45px] block h-0.5 w-[90px] sm:-right-[70px] sm:w-[140px] md:-right-[75px] md:w-[150px]"
                              ></span>
                           <span
                              class="border-primary bg-primary relative z-10 mx-auto mb-[10px] flex h-[34px] w-[34px] items-center justify-center rounded-full border-2 text-base font-medium text-white"
                              >
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
                           <span
                              class="text-body-color dark:text-dark-6 text-[10px] font-medium sm:text-base"
                              >
                           Shipping
                           </span>
                        </div>
                        <div
                           class="relative px-3 text-center sm:px-6 md:px-10 lg:px-[50px]"
                           >
                           <span
                              class="bg-stroke dark:bg-dark-3 absolute top-[16px] -right-[45px] block h-0.5 w-[90px] sm:-right-[70px] sm:w-[140px] md:-right-[75px] md:w-[150px]"
                              ></span>
                           <span
                              class="border-stroke dark:border-dark-3 bg-gray dark:bg-dark-2 relative z-10 mx-auto mb-[10px] flex h-[34px] w-[34px] items-center justify-center rounded-full border-2 text-base font-medium text-body-color dark:text-dark-6"
                              >
                           3
                           </span>
                           <span
                              class="text-body-color dark:text-dark-6 text-[10px] font-medium sm:text-base"
                              >
                           Payment
                           </span>
                        </div>
                        <div class="px-3 text-center sm:px-6 md:px-10 lg:px-[50px]">
                           <span
                              class="border-stroke dark:border-dark-3 bg-gray dark:bg-dark-2 relative z-10 mx-auto mb-[10px] flex h-[34px] w-[34px] items-center justify-center rounded-full border-2 text-base font-medium text-body-color dark:text-dark-6"
                              >
                           4
                           </span>
                           <span
                              class="text-body-color dark:text-dark-6 text-[10px] font-medium sm:text-base"
                              >
                           Confirm
                           </span>
                        </div>
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
                        <form>
                           <div class="mb-6">
                              <input
                                 type="text"
                                 placeholder="Email"
                                 class="w-full px-5 py-3 text-base bg-transparent border rounded-md outline-none border-stroke text-body-color dark:text-white dark:border-dark-3 focus:border-dark focus-visible:shadow-none"
                                 />
                           </div>
                           <div class="mb-6">
                              <input
                                 type="password"
                                 placeholder="Password"
                                 class="w-full px-5 py-3 text-base bg-transparent border rounded-md outline-none border-stroke text-body-color dark:text-white dark:border-dark-3 focus:border-dark focus-visible:shadow-none"
                                 />
                           </div>
                           <div class="mb-10">
                              <input
                                 type="submit"
                                 value="Sign In"
                                 class="w-full px-5 py-3 text-base font-medium text-white transition border rounded-md cursor-pointer border-dark bg-dark hover:bg-opacity-90"
                                 />
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