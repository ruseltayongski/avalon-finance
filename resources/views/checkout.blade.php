<?php 
   $user = Auth::user();
?>

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

   #checkboxLabelOne:checked + .box {
      background-color: #011523;
   }

   /* Styles for SVG icon visibility */
   #checkboxLabelOne:checked + .box > span {
      opacity: 1;
   }

   #checkboxLabelTwo:checked + .box {
      background-color: #011523;
   }

   /* Styles for SVG icon visibility */
   #checkboxLabelTwo:checked + .box > span {
      opacity: 1;
   }

   /* SELECT 2 CSS */
   .mult-select-tag {
    display: flex;
      width: 100%;
      flex-direction: column;
      align-items: center;
      position: relative;
      --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
      --tw-shadow-color: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
      --border-color: rgb(218, 221, 224);
      font-family: Verdana, sans-serif;
   }
   .mult-select-tag .wrapper {
      width: 100%;
   }
   .mult-select-tag .body {
      display: flex;
      border: 1px solid var(--border-color);
      background: #fff;
      min-height: 2.15rem;
      width: 100%;
      min-width: 14rem;
   }
   .mult-select-tag .input-container {
      display: flex;
      flex-wrap: wrap;
      flex: 1 1 auto;
      padding: 0.1rem;
      align-items: center;
   }
   .mult-select-tag .input-body {
      display: flex;
      width: 100%;
   }
   .mult-select-tag .input {
      flex: 1;
      background: 0 0;
      border-radius: 0.25rem;
      padding: 0.45rem;
      margin: 10px;
      color: #2d3748;
      outline: 0;
      border: 1px solid var(--border-color);
   }
   .mult-select-tag .btn-container {
      color: #e2ebf0;
      padding: 0.5rem;
      display: flex;
      border-left: 1px solid var(--border-color);
   }
   .mult-select-tag button {
      cursor: pointer;
      width: 100%;
      color: #718096;
      outline: 0;
      height: 100%;
      border: none;
      padding: 0;
      background: 0 0;
      background-image: none;
      -webkit-appearance: none;
      text-transform: none;
      margin: 0;
   }
   .mult-select-tag button:first-child {
      width: 1rem;
      height: 90%;
   }
   .mult-select-tag .drawer {
      position: absolute;
      background: #fff;
      max-height: 15rem;
      z-index: 40;
      top: 98%;
      width: 100%;
      overflow-y: scroll;
      border: 1px solid var(--border-color);
      border-radius: 0.25rem;
   }
   .mult-select-tag ul {
      list-style-type: none;
      padding: 0.5rem;
      margin: 0;
   }
   .mult-select-tag ul li {
      padding: 0.5rem;
      border-radius: 0.25rem;
      cursor: pointer;
   }
   .mult-select-tag ul li:hover {
      background: rgb(243 244 246);
   }
   .mult-select-tag .item-container {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 0.2rem 0.4rem;
      margin: 0.2rem;
      font-weight: 500;
      border: 1px solid;
      border-radius: 9999px;
   }
   .mult-select-tag .item-label {
      max-width: 100%;
      line-height: 1;
      font-size: 0.75rem;
      font-weight: 400;
      flex: 0 1 auto;
   }
   .mult-select-tag .item-close-container {
      display: flex;
      flex: 1 1 auto;
      flex-direction: row-reverse;
   }
   .mult-select-tag .item-close-svg {
      width: 1rem;
      margin-left: 0.5rem;
      height: 1rem;
      cursor: pointer;
      border-radius: 9999px;
      display: block;
   }
   .mult-select-tag .shadow {
      box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
   }
   .mult-select-tag .rounded {
      border-radius: 0.375rem;
   }

   .disabled-cursor {
        cursor: not-allowed;
        background-color: #011523;
        background-color: rgba(1, 21, 35, 0.8); 
    }
</style>
@endsection


<div 

    :class="{ 'relative z-10 bg-cover bg-center bg-no-repeat pt-[30px] pb-20 md:pt-[100px]': isMobile, 'z-10 relative bacground-image-hero': !isMobile }"
    :style="isMobile ? 'background-image: url({{ asset('/images/v2crop.png') }})' : ''"> 
    <div class="absolute right-0 top-0">
      <div class="py-8 px-6 text-center">
         <div
            x-data="
            {
            dropdownOpen: false
            }
            "
            @click.outside="dropdownOpen = false"
            class="relative mb-8 inline-block text-left"
            >
            
            <button
               @click="dropdownOpen = !dropdownOpen"
               class="bg-dark flex items-center rounded-[15px] py-[12px] text-sm font-medium text-white"
               >
               <svg class="h=4 w-4 ml-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="white"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>

               <span class="pl-1 pr-1"> {{ $user->name }}</span>
               <span>
                  <svg 
            
                     width="15" 
                     height="15" 
                     viewBox="0 0 20 20" 
                     fill="none" 
                     xmlns="http://www.w3.org/2000/svg"
                     class="fill-current"
                     >
                     <path 
                        d="M10 14.25C9.8125 14.25 9.65625 14.1875 9.5 14.0625L2.3125 7C2.03125 6.71875 2.03125 6.28125 2.3125 6C2.59375 5.71875 3.03125 5.71875 3.3125 6L10 12.5312L16.6875 5.9375C16.9688 5.65625 17.4063 5.65625 17.6875 5.9375C17.9687 6.21875 17.9687 6.65625 17.6875 6.9375L10.5 14C10.3437 14.1563 10.1875 14.25 10 14.25Z" 
                        />
                  </svg>
               </span>
            </button>
            <div
               :class="dropdownOpen ? 'top-full opacity-100 visible' : 'top-[110%] invisible opacity-0' "
               class="shadow-1 dark:shadow-box-dark absolute left-0 z-50 mt-2 w-full rounded-md bg-white dark:bg-dark-2 py-[10px] transition-all"
               >
               <a
                  href="javascript:void(0)"
                  class="text-body-color dark:text-dark-6  block px-5 py-2 text-base"
                  onclick="event.preventDefault(); document.getElementById('logout-form1').submit();"
                  >
               Logout
               </a>
            </div>
         </div>
      </div>
     {{--  <a
         href="{{ route('logout') }}" 
         class="py-2.5 text-base rounded-xl font-medium px-6 bg-dark text-white"
         onclick="event.preventDefault(); document.getElementById('logout-form1').submit();"
         >
      Logout
      </a> --}}
   <form id="logout-form1" action="{{ route('logout') }}" method="POST">
      @csrf
  </form>
    </div>
</div>

<section class="relative py-10 lg:py-[40px] dark:bg-[#011523]"  x-data="{
   isMobile2: window.innerWidth <= 640,
   sendInvoice: true,  
   thruPhoneProcess: false
}"
x-init="() => {
   window.addEventListener('resize', () => {
      isMobile2 = window.innerWidth <= 640;
   });
}">
   <div class="absolute top-0 left-0 z-[-1] h-1/2 w-full bg-[#011523] dark:bg-dark-3"></div>
   <div class="container mx-auto  animate-fade-down animate-duration-1000 animate-delay-500">
      <div class="flex flex-wrap" :class="{ '-mx-4': isMobile, 'mx-auto': !isMobile }">
         <div class="w-full px-4 lg:w-7/12 xl:w-8/12 lg:px-16">
            <div class="mb-12 lg:mb-0">
               <h3
                  class="mb-8 text-lg font-semibold text-white dark:text-white sm:leading-[40px] sm:text-[28px]
                  animate-fade-right animate-duration-1000 animate-delay-500
                  "
                  >
                  Payment Information
               </h3>
               <div
                  class="mb-10 overflow-hidden rounded-[10px] {{-- border border-stroke dark:border-dark-3 --}}
                   bg-white dark:bg-dark-2 shadow-testimonial-6 dark:shadow-box-dark py-10 px-6 sm:px-10
                  
                   "
                  >
                  <h4
                     class="mb-8 text-lg font-semibold text-dark dark:text-white"
                     >
                     Personal Details
                  </h4>
                  <div>
                     <form action="{{ route('send.email') }}" method="POST" class="pb-4 mb-10 border-b border-stroke dark:border-dark-3{{--  animate-fade-right animate-duration-1000 animate-delay-500 --}}">
                        @csrf
                        <input type="hidden" name="subTotal" id="subTotalInput">
                        <div class="flex flex-wrap -mx-4">
                           <div class="w-full px-4 md:w-1/2">
                              <div class="mb-5">
                                 <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                 Full Name<span class="text-red">*</span>
                                 </label>
                                 <input
                                    type="text"
                                    placeholder="Full Name"
                                    name="fullName"
                                    class="w-full rounded-md bg-transparent border border-stroke dark:border-dark-3 py-3 px-5 text-body-color dark:text-dark-5 placeholder:text-dark-5 outline-none transition focus:border-[#011523] active:border-[#011523] disabled:cursor-default disabled:bg-[#F5F7FD]"
                                    required
                                    />
                                    
                              </div>
                           </div>
                           <div class="w-full px-4 md:w-1/2">
                              <div class="mb-5">
                                 <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                 Email1<span class="text-red">*</span>
                                 </label>
                                 <input
                                    type="email"
                                    placeholder="Email"
                                    name="email1"
                                    required
                                    class="w-full rounded-md bg-transparent border border-stroke dark:border-dark-3 py-3 px-5 text-body-color dark:text-dark-5 placeholder:text-dark-5 outline-none transition focus:border-[#011523] active:border-[#011523] disabled:cursor-default disabled:bg-[#F5F7FD]"
                                    />
                              </div>
                           </div>
                           <div class="w-full px-4 md:w-1/2">
                              <div class="mb-5">
                                 <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                 Email2
                                 </label>
                                 <input
                                    type="email"
                                    placeholder="Email"
                                    name="email2"
                                    class="w-full rounded-md bg-transparent border border-stroke dark:border-dark-3 py-3 px-5 text-body-color dark:text-dark-5 placeholder:text-dark-5 outline-none transition focus:border-[#011523] active:border-[#011523] disabled:cursor-default disabled:bg-[#F5F7FD]"
                                    />
                              </div>
                           </div>
                           <div class="w-full px-4 md:w-1/2">
                              <div class="mb-5">
                                 <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                 Billing Address<span class="text-red">*</span>
                                 </label>
                                 <input
                                    type="text"
                                    placeholder="Biiling Address"
                                    name="billingAddress"
                                    required
                                    class="w-full rounded-md bg-transparent border border-stroke dark:border-dark-3 py-3 px-5 text-body-color dark:text-dark-5 placeholder:text-dark-5 outline-none transition focus:border-[#011523] active:border-[#011523] disabled:cursor-default disabled:bg-[#F5F7FD]"
                                    />
                              </div>
                           </div>
                           <div class="w-full px-4 md:w-1/3">
                              <div class="mb-5">
                                 <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                 Country<span class="text-red">*</span>
                                 </label>
                                 <input
                                    type="text"
                                    placeholder="Country"
                                    name="country"
                                    required
                                    class="w-full rounded-md bg-transparent border border-stroke dark:border-dark-3 py-3 px-5 text-body-color dark:text-dark-5 placeholder:text-dark-5 outline-none transition focus:border-[#011523] active:border-[#011523] disabled:cursor-default disabled:bg-[#F5F7FD]"
                                 />
                              </div>
                           </div>
                           <div class="w-full px-4 md:w-1/3">
                              <div class="mb-5">
                                 <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                 City<span class="text-red">*</span>
                                 </label>
                                 <input
                                    type="text"
                                    placeholder="City"
                                    name="city"
                                    required
                                    class="w-full rounded-md bg-transparent border border-stroke dark:border-dark-3 py-3 px-5 text-body-color dark:text-dark-5 placeholder:text-dark-5 outline-none transition focus:border-[#011523] active:border-[#011523] disabled:cursor-default disabled:bg-[#F5F7FD]"
                                 />
                              </div>
                           </div>
                           <div class="w-full px-4 md:w-1/3">
                              <div class="mb-5">
                                 <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                 Post Code<span class="text-red">*</span>
                                 </label>
                                 <input
                                    type="number"
                                    placeholder="Post Code"
                                    name="postCode"
                                    required
                                    class="w-full rounded-md bg-transparent border border-stroke dark:border-dark-3 py-3 px-5 text-body-color dark:text-dark-5 placeholder:text-dark-5 outline-none transition focus:border-[#011523] active:border-[#011523] disabled:cursor-default disabled:bg-[#F5F7FD]"
                                 />
                              </div>
                           </div>

                           <div class="w-full px-4 md:w-1/2">
                              <div class="mb-5">
                                 <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                 Type of Payment<span class="text-red">*</span>
                                 </label>
                                 <div class="relative">
                                    <select 
                                       name="typeOfPayment"
                                       class="w-full appearance-none bg-transparent rounded-md border border-stroke dark:border-dark-3 py-3 px-5 font-medium text-dark-5 outline-none transition focus:border-[#011523] active:border-[#011523] disabled:cursor-default disabled:bg-[#F5F7FD]"
                                       required
                                       >
                                       <option value="" disabled selected hidden> Select Payment Type
                                       <option value="Full" class="dark:bg-dark-2">
                                          Full
                                       </option>
                                       <option value="Plan" class="dark:bg-dark-2">
                                          Plan
                                       </option>
                                    </select>
                                    <span
                                       class="absolute -translate-y-1/2 right-5 top-1/2 text-body-color dark:text-dark-6"
                                       >
                                       <svg
                                          width="16"
                                          height="16"
                                          viewBox="0 0 16 16"
                                          fill="none"
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="fill-current stroke-current"
                                          >
                                          <path
                                             d="M2.4142 5.03575L2.41418 5.03577L2.417 5.03852L7.767 10.2635L8.00101 10.4921L8.23393 10.2624L13.5839 4.98741L13.5839 4.98741L13.5856 4.98575C13.6804 4.89093 13.8194 4.89093 13.9142 4.98575C14.0087 5.0803 14.009 5.2187 13.915 5.31351C13.9148 5.31379 13.9145 5.31407 13.9142 5.31435L8.16628 10.9623L8.16627 10.9623L8.1642 10.9643C8.06789 11.0607 8.02303 11.0667 7.9999 11.0667C7.94098 11.0667 7.88993 11.0523 7.82015 10.9991L2.08477 5.36351C1.99078 5.26871 1.99106 5.1303 2.0856 5.03575C2.18043 4.94093 2.31937 4.94093 2.4142 5.03575Z"
                                             fill=""
                                             stroke=""
                                             stroke-width="0.666667"
                                             />
                                       </svg>
                                    </span>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="w-full px-4 md:w-1/2">
                              <div class="mb-5">
                                 {{-- <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                 Total Amount to be Processed<span class="text-red">*</span>
                                 </label> --}}
                                 <input
                                    type="hidden"
                                    class="w-full rounded-md bg-transparent border border-stroke dark:border-dark-3 py-3 px-5 text-body-color dark:text-dark-5 placeholder:text-dark-5 outline-none transition focus:border-[#011523] active:border-[#011523] disabled:cursor-default disabled:bg-[#F5F7FD]"
                                    name="totalAmount"
                                    id="totalAmountInput"
                                    />
                              </div>
                           </div>

                           <div class="w-full px-4 md:w-full">
                              <div class="mb-4">
                                 <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                    Service/s Availed<span class="text-red">*</span>
                                 </label>
                                 <select name="services[]" id="services" multiple>
                                 </select>
                              </div>
                           </div>

                           <div class="w-full px-4 md:w-full">
                              <div class="mb-8">
                                 <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                    Promo Code
                                 </label>
                                 <select name="promoCode[]" id="promoCode" multiple>
                                    @foreach($promoCode as $row)
                                       <option value="{{ $row->id }}" data-discount="{{ $row->amount_off / 100 }}">{{ '$'.number_format($row->amount_off / 100, 2) }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <hr class="border-1 border-500 cursor-pointer  duration-500 mb-8" />
                           </div>
                           
                           <div class="px-4" :class="{ 'w-full flex justify-center pb-5': isMobile2, 'w-1/2': !isMobile2}">
                                 <button {{-- @click="cartNotification = true" --}} 
                                    class="flex items-center justify-center w-full px-10 py-3 text-base font-medium text-center text-white rounded-md bg-[#011523] hover:bg-[#011523]/90"
                                    :class="{ 'w-full': isMobile2, 'w-full': !isMobile2 }"   
                                    {{-- x-on:click="submit" --}}
                                    @click="thruPhoneProcess = true"
                                    type="button"
                                    >
                                    Thru Phone Process
                                 </button>
                           </div>
                           <div class="px-4" :class="{ 'w-full flex justify-center': isMobile2, 'w-1/2': !isMobile2}">
                              <button {{-- @click="cartNotification = true" --}} 
                                 class="flex items-center justify-center w-full px-10 py-3 text-base font-medium text-center text-white rounded-md bg-[#011523] hover:bg-[#011523]/90"
                                 :class="{ 'w-full': isMobile2, 'w-full': !isMobile2 }"   
                                 name="sendInvoice"
                                 type="submit"
                                 >
                                 Send Invoice
                              </button>
                           </div>
                        </div>   
                  </div>
               </div>
            </div>
         </div>

       
      
         <div class="w-full px-4 lg:w-5/12 xl:w-4/12">
            <div>
               <h3
                  class="mb-8 text-xl font-semibold text-white dark:text-white sm:leading-[40px] sm:text-[28px]
                  animate-fade-down animate-duration-1000 animate-delay-500"
                  :class="{ 'text-dark': isMobile, 'text-white': !isMobile}"
                  >
                  Services Summary
               </h3>
               <div
                  class="mb-10 overflow-hidden rounded-[10px] bg-white dark:bg-dark-2 shadow-testimonial-6 dark:shadow-box-dark py-10 px-6 sm:px-10
                  animate-fade-left animate-duration-1000 animate-delay-500">
                  <div id="summary_details">
                  </div>
                  <div class="pt-6 border-t border-stroke dark:border-dark-3">
                     <p class="mb-[10px] flex items-center justify-between text-base text-dark dark:text-white">
                        <span>Subtotal</span>
                        <span class="font-medium" id="subTotal"></span>
                     </p>
                  </div>
                  <div class="pt-6 border-t border-stroke dark:border-dark-3">
                     <p class="mb-[10px] flex items-center justify-between text-base text-dark dark:text-white">
                        <span>Discount</span>
                        <span class="font-medium" id="discount"></span>
                     </p>
                  </div>
                  <div class="pt-5 border-t border-stroke dark:border-dark-3">
                     <p class="flex items-center justify-between mb-6 text-base text-dark dark:text-white">
                        <span>Total Amount</span>
                        <span class="font-medium" id="totalAmountSpan"></span>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div x-show="thruPhoneProcess" class="bg-[#000000] dark:bg-[#00000] dark:bg-opacity-40 bg-opacity-20 fixed z-50 top-0 left-0 flex items-center justify-center w-full h-screen overflow-y-scroll">
      <div @click.outside="thruPhoneProcess = false" class="relative mx-auto max-w-[660px]
      bg-white dark:bg-dark-2 shadow-1 dark:shadow-3 h-[95vh]">
         <div class="p-8 bg-white dark:bg-dark-2 rounded-[10px] ">
            <button @click="thruPhoneProcess = false" type="button"class="bg-red p-1 absolute right-5 top-5 rounded-[5px] text-white dark:text-dark-6">
                  <svg 
                     width="20" 
                     height="20" 
                     viewBox="0 0 20 20" 
                     fill="none" 
                     xmlns="http://www.w3.org/2000/svg"
                     class="fill-current dark:fill-white"
                     >
                     <path 
                     d="M11 10L18.625 2.375C18.9062 2.09375 18.9062 1.65625 18.625 1.375C18.3438 1.09375 17.9063 1.09375 17.625 1.375L10 9L2.375 1.375C2.09375 1.09375 1.65625 1.09375 1.375 1.375C1.09375 1.65625 1.09375 2.09375 1.375 2.375L9 10L1.375 17.625C1.09375 17.9063 1.09375 18.3438 1.375 18.625C1.5 18.75 1.6875 18.8438 1.875 18.8438C2.0625 18.8438 2.25 18.7812 2.375 18.625L10 11L17.625 18.625C17.75 18.75 17.9375 18.8438 18.125 18.8438C18.3125 18.8438 18.5 18.7812 18.625 18.625C18.9062 18.3438 18.9062 17.9063 18.625 17.625L11 10Z" 
                     />
                  </svg>
            </button>
            <h2 class="mb-8 text-lg font-semibold text-dark dark:text-white">Terms and Conditions</h2>
            <p class="text-sm mb-7 dark:text-white text-body-color">
               1. **Acceptance of Terms**: By completing a transaction over the phone, you agree to these Terms and Conditions.
               <br>
               <br>
               2. **Transaction Process**: Our representative will guide you through the transaction process. You will be asked to provide necessary details such as your name, address, phone number, and payment information.
               <br>
               <br>
               3. **Verification**: For your security, we may verify the information provided. Transactions will only be processed upon successful verification.
               <br>
               <br>
               4. **Payment**: We accept [list accepted payment methods]. Your payment details will be processed securely. The total cost, including taxes and any applicable fees, will be confirmed before finalizing the transaction.
               <br>
               <br>
               5. **Privacy Policy**: Your personal information will be handled in accordance with our Privacy Policy, which can be found at [website link].
               <br>
               <br>
               6. **Cancellations and Refunds**: You may cancel your transaction within [time period] for a full refund. After this period, [explain any applicable cancellation policy or fees].
               <br>
               <br>
               7. **Delivery**: For transactions involving physical goods, we will provide an estimated delivery date. Please ensure the delivery address provided is accurate.
               <br>
               <br>
               8. **Liability**: We are not liable for errors due to incorrect information provided by you or for unforeseen circumstances beyond our control.
               <br>
               <br>
               9. **Customer Service**: For any questions or concerns regarding your transaction, please contact our customer service at [phone number/email].
               <br>
               <br>
               10. **Amendments**: We reserve the right to amend these terms and conditions at any time. Continued use of our phone transaction service constitutes acceptance of these changes.
               <br>
               <br>
               11. **Governing Law**: These terms and conditions are governed by the laws of [Jurisdiction], and any disputes will be subject to the exclusive jurisdiction of its courts.
               <br>
               <br>
               <b>Client’s Consent</b>
               <br>
               <br>
               Do you, [Client's Name], agree and provide your full consent to proceed with the online transaction facilitated by Avalon House? By selecting 'Yes', you acknowledge and understand that this transaction will be conducted securely over the internet and indicate your acceptance of the process and any applicable terms and conditions provided by Avalon House.
            </p>
            <label
               for="checkboxLabelOne"
               class="flex items-center cursor-pointer select-none text-dark dark:text-white"
               >
               <div class="relative">
                  <input
                     type="checkbox"
                     id="checkboxLabelOne"
                     class="sr-only"
                     />
                  <div
                     class="flex items-center justify-center w-5 h-5 mr-2 border border-dark-5 dark:border-dark-5 rounded box"
                     >
                     <span class="opacity-0">
                        <svg
                           width="11"
                           height="8"
                           viewBox="0 0 11 8"
                           fill="none"
                           xmlns="http://www.w3.org/2000/svg"
                           >
                           <path
                              d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z"
                              fill="white"
                              stroke="white"
                              stroke-width="0.4"
                              />
                        </svg>
                     </span>
                  </div>
               </div>
               The client agrees to the terms and conditions read thru the phone.
            </label>
            <label
            for="checkboxLabelTwo"
            class="flex items-center cursor-pointer select-none text-dark dark:text-white"
            >
            <div class="relative">
               <input
                  type="checkbox"
                  id="checkboxLabelTwo"
                  class="sr-only"
                  />
               <div
                  class="flex items-center justify-center w-5 h-5 mr-2 border border-dark-5 dark:border-dark-3 rounded box"
                  >
                  <span class="opacity-0">
                     <svg
                        width="11"
                        height="8"
                        viewBox="0 0 11 8"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                           d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z"
                           fill="white"
                           stroke="white"
                           stroke-width="0.4"
                           />
                     </svg>
                  </span>
               </div>
            </div>
            The client grants his/her consent to process the payment thru a secured line.
         </label>
            <div class="flex items-center justify-start space-x-1 mt-5">
               <button
               type="submit"
               disabled
               name="proceedButton"
               id="proceedButton"
               class="disabled-cursor px-5 py-2 text-sm font-medium rounded-md text-white shadow-1 dark:shadow-3 hover:bg-[#011523]/80 dark:text-white dark:bg-white/5"
               >
            Proceed
            </button>
               <button
                  @click="thruPhoneProcess = false"
                  class="px-5 py-2 text-sm font-medium text-dark dark:text-white rounded-md bg-[white] dark:bg-dark bg-opacity-50 hover:bg-opacity-50"
                  >
               Cancel   
               </button>
            </div>
         </div>
      </form>
      </div>
   </div>
   @if(session('message'))
   <div
      x-show="sendInvoice"
      x-transition
      class="bg-[#000000]  animate-fade-down animate-duration-1000 animate-delay-500 dark:bg-[#00000] dark:bg-opacity-40 bg-opacity-20 fixed z-50 top-0 left-0 flex items-center  justify-center w-full h-screen overflow-y-scroll"
      >
      <div
         @click.outside="sendInvoice = false"
         class="relative w-full max-w-[570px] rounded-[20px] bg-[#011523] py-12 px-8 text-center md:py-[50px] md:px-[70px]"
         >
         <div
            class="flex items-center justify-center w-20 h-20 mx-auto mb-6 text-white rounded-full bg-white/10"
            >
            <svg
               width="47"
               height="47"
               viewBox="0 0 47 47"
               fill="none"
               xmlns="http://www.w3.org/2000/svg"
               >
               <path
                  d="M23.6134 0.900024C11.0362 0.900024 0.900391 11.0358 0.900391 23.613C0.900391 36.1903 11.0362 46.4 23.6134 46.4C36.1906 46.4 46.4004 36.1903 46.4004 23.613C46.4004 11.0358 36.1906 0.900024 23.6134 0.900024ZM23.6134 43.8106C12.5158 43.8106 3.48982 34.7106 3.48982 23.613C3.48982 12.5155 12.5158 3.48946 23.6134 3.48946C34.711 3.48946 43.811 12.5155 43.811 23.613C43.811 34.7106 34.711 43.8106 23.6134 43.8106Z"
                  fill="white"
                  />
               <path
                  d="M33.6768 26.2024H13.5532C12.8874 26.2024 12.2955 26.4983 11.8516 27.0162C11.4817 27.5341 11.2597 28.126 11.4077 28.7918C12.5174 34.5626 17.6223 38.8536 23.615 38.8536C29.6077 38.8536 34.7126 34.6365 35.8223 28.7918C35.9703 28.2 35.7483 27.5341 35.3784 27.0162C35.0085 26.4983 34.3426 26.2024 33.6768 26.2024ZM23.615 36.2642C19.102 36.2642 15.1808 33.1569 14.0711 28.7918H33.2329C32.0491 33.1569 28.128 36.2642 23.615 36.2642Z"
                  fill="white"
                  />
               <path
                  d="M14.8109 19.6919C16.4386 19.6919 17.7703 18.3602 17.7703 16.7325C17.7703 15.1049 16.4386 13.7732 14.8109 13.7732C13.1833 13.7732 11.8516 15.1049 11.8516 16.7325C11.9255 18.4342 13.2573 19.6919 14.8109 19.6919Z"
                  fill="white"
                  />
               <path
                  d="M32.4183 19.766C34.0527 19.766 35.3777 18.441 35.3777 16.8066C35.3777 15.1722 34.0527 13.8473 32.4183 13.8473C30.7839 13.8473 29.459 15.1722 29.459 16.8066C29.459 18.441 30.7839 19.766 32.4183 19.766Z"
                  fill="white"
                  />
            </svg>
         </div>
         <h3 class="pb-4 text-3xl font-bold text-white md:text-4xl">
            Congratulations!
         </h3>
         <p class="text-base leading-relaxed text-white mb-9">
            You have successfully sent an invoice
         </p>
         <a
            @click="sendInvoice = false"
            class="inline-block rounded-md border border-white py-3 px-[50px] text-center text-base font-medium text-white transition hover:bg-white hover:text-primary"
            >
          Send Notif to Email
         </a>
        {{--  <button
            @click="sendInvoice = false"
            class="absolute flex items-center justify-center text-white transition bg-white rounded-full top-6 right-6 h-7 w-7 bg-opacity-10 hover:bg-opacity-100 hover:text-primary"
            >
            <svg
               width="10"
               height="10"
               viewBox="0 0 13 13"
               fill="none"
               xmlns="http://www.w3.org/2000/svg"
               >
               <path
                  d="M6.4917 7.65579L11.106 12.2645C11.2545 12.4128 11.4715 12.5 11.6738 12.5C11.8762 12.5 12.0931 12.4128 12.2416 12.2645C12.5621 11.9445 12.5623 11.4317 12.2423 11.1114C12.2422 11.1113 12.2422 11.1113 12.2422 11.1113C12.242 11.1111 12.2418 11.1109 12.2416 11.1107L7.64539 6.50351L12.2589 1.91221L12.2595 1.91158C12.5802 1.59132 12.5802 1.07805 12.2595 0.757793C11.9393 0.437994 11.4268 0.437869 11.1064 0.757418C11.1063 0.757543 11.1062 0.757668 11.106 0.757793L6.49234 5.34931L1.89459 0.740581L1.89396 0.739942C1.57364 0.420019 1.0608 0.420019 0.740487 0.739944C0.42005 1.05999 0.419837 1.57279 0.73985 1.89309L6.4917 7.65579ZM6.4917 7.65579L1.89459 12.2639L1.89395 12.2645C1.74546 12.4128 1.52854 12.5 1.32616 12.5C1.12377 12.5 0.906853 12.4128 0.758361 12.2645L1.1117 11.9108L0.758358 12.2645C0.437984 11.9445 0.437708 11.4319 0.757539 11.1116C0.757812 11.1113 0.758086 11.111 0.75836 11.1107L5.33864 6.50287L0.740487 1.89373L6.4917 7.65579Z"
                  class="fill-current stroke-current"
                  />
            </svg>
         </button> --}}
      </div>
  </div>
   @endif
</section>

@endsection

@section('js')

<script>
   var subTotalInput = document.getElementById('subTotalInput');
   var summaryDetails = document.getElementById('summary_details');
   var subTotalSpan = document.getElementById('subTotal');
   var subTotal = 0;
   var totalAmountSpan = document.getElementById('totalAmountSpan');
   var totalAmountInput = document.getElementById('totalAmountInput');
   var totalAmount = 0;

   function calculateTotalAmount(e, option) {
      if(option == 'add') {
         totalAmount += parseFloat(e.price);
      } 
      else if(option == 'minus') {
         totalAmount -= parseFloat(e.price);
      }
      totalAmountSpan.innerHTML = "$"+parseFloat(totalAmount).toLocaleString();
      totalAmountInput.value = totalAmount;
   }

   function calculateSubTotal(e) {
      subTotal += parseFloat(e.price);
      subTotalSpan.innerHTML = "$"+parseFloat(subTotal).toLocaleString();
      subTotalInput.value = subTotal;
   }

   function deductSubTotal(e) {
      subTotal -= parseFloat(e.price);
      subTotalSpan.innerHTML = "$"+parseFloat(subTotal).toLocaleString();
      subTotalInput.value = subTotal;
   }

   function displayTheSummary(e) {
      var tempDiv = document.createElement('div');
      tempDiv.innerHTML = `<div data-id="${e.value}" class="flex items-center mb-9">
                              <div class="mr-6 h-[90px] w-full max-w-[80px] overflow-hidden rounded-lg sm:h-[110px] sm:max-w-[100px] border border-stroke dark:border-dark-3">
                                 <img src="https://avalonhouse.us/fileupload/services/${e.picture}" alt="product" class="object-cover object-center w-full h-full">
                              </div>
                              <div class="w-full">
                                 <p class="mb-[6px] text-base font-medium text-dark dark:text-white">
                                    ${e.label}
                                 </p>
                                 <p class="text-sm font-medium text-body-color dark:text-dark-6">
                                    $${(parseFloat(e.price).toLocaleString())}
                                 </p>
                                 <p class="text-sm font-medium text-body-color dark:text-dark-6">
                                    <span class="pr-0.5"> Quantity: </span> <span>1</span>
                                 </p>
                              </div>
                           </div>`;

      summaryDetails.appendChild(tempDiv.firstChild);
   }

   function deleteSummaryById(e) {
      var summaryElement = Array.from(summaryDetails.children).find(element => element.getAttribute('data-id') == e.value);
      summaryDetails.removeChild(summaryElement);
   }

   function MultiSelectTag(e, t = { shadow: !1, rounded: !0 }) {
      var selectServices = document.getElementById('services');
      var categoryServices = [];
      var n = null,
         l = null,
         d = null,
         a = null,
         s = null,
         i = null,
         o = null,
         r = null,
         c = null,
         u = null,
         p = null,
         v = null,
         m = t.tagColor || {},
         h = new DOMParser();

      var business = "Business Affairs";
      var tech = "Tech & Dev";
      var digital = "Digital Media & Marketing";
      var book = "Book-to-film/TV";
      var creation = "Book Creation";
      var keyupTimeout;

      async function fetchServicesData(apiUrl) {
         try {
            const response = await fetch(apiUrl);
            const data = (await response.json()).map(item => ({
               value: item.id,
               label: item.title,
               selected: false,
               picture: item.picture,
               price: item.price
            }));
            l = data;
         } catch (error) {
            console.error('Fetch error:', error);
            throw error;
         }
      }

      async function f(e = null, search = null) {
         if(e && search) {
            //console.log(search)
            await fetchServicesData("{{ asset('services') }}"+"/"+e);
         }
         for (var t of ((v.innerHTML = ""), l)) {
            if (t.selected) {
               !w(t.value) && g(t);
            }
            else {
               const n = document.createElement("li");
               n.innerHTML = t.label;
               //n.dataset.value = t.value;
               n.value = t.value;
               v.appendChild(n);
               const optionExist = selectServices.querySelector(`[value="${t.value}"]`);
               if(!optionExist) {
                  var option = document.createElement('option');
                  option.value = t.value;
                  option.text = t.label;
                  selectServices.add(option);
               }
            }
         }
         L();
      }

      function g(e) {
         calculateSubTotal(e);
         displayTheSummary(e);
         calculateTotalAmount(e, 'add')
 
         const t = document.createElement("div");
         t.classList.add("item-container"), (t.style.color = m.textColor || "#2c7a7b"), (t.style.borderColor = m.borderColor || "#81e6d9"), (t.style.background = m.bgColor || "#e6fffa");
         const n = document.createElement("option");
         n.classList.add("item-label");
         n.style.color = m.textColor || "#2c7a7b"; 
         n.innerHTML = e.label;
         //n.dataset.value = e.value;
         // n.text = e.label;
         n.value = e.value;
         //n.selected = e.selected;
         //console.log(n);
         const d = new DOMParser().parseFromString(
               '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="item-close-svg">\n                <line x1="18" y1="6" x2="6" y2="18"></line>\n                <line x1="6" y1="6" x2="18" y2="18"></line>\n                </svg>',
               "image/svg+xml"
         ).documentElement;

         d.addEventListener("click", (t) => {
            //(l.find((t) => t.value == e.value).selected = !1), C(e.value), f(), E();
            e.selected = false;
            toggleSelect(e)
            C(e.value);
            f();
            deductSubTotal(e);
            deleteSummaryById(e);
            calculateTotalAmount(e, 'minus')
         });

         t.appendChild(n);
         t.appendChild(d);
         o.append(t);

         categoryServices = [...categoryServices, ...l];

         toggleSelect(e)
      }

      function toggleSelect(e) {
         console.log(e)
         const optionExist = selectServices.querySelector(`[value="${e.value}"]`);
         optionExist.selected = e.selected;
      }

      function L() {
         //console.log(v.children);
         for (var e of v.children) {
            if(e) {
               e.addEventListener("click", (e) => {
                  //(l.find((t) => t.value == e.target.dataset.value).selected = !0), (c.value = null), f(), E(), c.focus();
                  (l.find((t) => t.value == e.target.value).selected = !0);
                  c.value = null;
                  f();
                  E();
                  c.focus();
               });
            }
         }  
      }

      function w(e) {
         for (var t of o.children) {
            // if (!t.classList.contains("input-body") && t.firstChild.dataset.value == e) {
            if (!t.classList.contains("input-body") && t.firstChild.value == e) {
               return !0; //true
            }
         }
         return !1; //false
      }

      function C(e) {
         //for (var t of o.children) t.classList.contains("input-body") || t.firstChild.dataset.value != e || o.removeChild(t);
         for (var t of o.children) t.classList.contains("input-body") || t.firstChild.value != e || o.removeChild(t);
      }

      function E(e = !0) {

      }

      (n = document.getElementById(e)),
      
      (function () {
            (l = [...n.options].map((e) => ({ value: e.value, label: e.label, selected: e.selected }))),
               n.classList.add("hidden"),
               (d = document.createElement("div")).classList.add("mult-select-tag"),
               (a = document.createElement("div")).classList.add("wrapper"),
               (i = document.createElement("div")).classList.add("body"),
               t.shadow && i.classList.add("shadow"),
               t.rounded && i.classList.add("rounded"),
               (o = document.createElement("div")).classList.add("input-container"),
               (c = document.createElement("input")).classList.add("input"),
               (c.placeholder = `${t.placeholder || "Search..."}`),
               (r = document.createElement("inputBody")).classList.add("input-body"),
               r.append(c),
               i.append(o),
               (s = document.createElement("div")).classList.add("btn-container"),
               ((u = document.createElement("button")).type = "button"),
               s.append(u);
            const e = h.parseFromString(
               '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">\n            <polyline points="18 15 12 21 6 15"></polyline></svg>',
               "image/svg+xml"
            ).documentElement;
            u.append(e),
               i.append(s),
               a.append(i),
               (p = document.createElement("div")).classList.add("drawer", "hidden"),
               t.shadow && p.classList.add("shadow"),
               t.rounded && p.classList.add("rounded"),
               p.append(r),
               (v = document.createElement("ul")),
               p.appendChild(v),
               d.appendChild(a),
               d.appendChild(p),
               n.nextSibling ? n.parentNode.insertBefore(d, n.nextSibling) : n.parentNode.appendChild(d);
      })()
      ,
      f()
      ,
      L()
      ,
      E(!1)
      ,
      u.addEventListener("click", () => {
         p.classList.contains("hidden") && (f(), L(), p.classList.remove("hidden"), c.focus());
         //p.classList.contains("hidden") && (f(), p.classList.remove("hidden"), c.focus());
      })
      ,
      c.addEventListener("keyup", (e) => {
         clearTimeout(keyupTimeout);
         keyupTimeout = setTimeout(() => {
            f(e.target.value, "search");
            //L();
         }, 1000);
      })
      ,
      c.addEventListener("keydown", (e) => {
         if ("Backspace" === e.key && !e.target.value && o.childElementCount > 1) {
            const e = i.children[o.childElementCount - 2].firstChild;
            //(l.find((t) => t.value == e.dataset.value).selected = !1), C(e.dataset.value), E();
            (l.find((t) => t.value == e.value).selected = !1), C(e.value), E();
         }
      })
      ,
      window.addEventListener("click", (e) => {
         d.contains(e.target) || p.classList.add("hidden");
      });
      
      return {
         f: f,
      };
   }
   
   new MultiSelectTag('services');

   var discountSpan = document.getElementById('discount');
   var discount = 0;
   function MultiSelectPromoCode (el, customs = {shadow: false, rounded:true}) {
      var element = null
      var options = null
      var customSelectContainer = null
      var wrapper = null
      var btnContainer = null
      var body = null
      var inputContainer = null
      var inputBody = null
      var input = null
      var button = null
      var drawer = null
      var ul = null
      var tagColor = customs.tagColor || {}
      var domParser = new DOMParser()
      init()

      function init() {
         element = document.getElementById(el)
         createElements()
         initOptions()
         enableItemSelection()
         setValues(false)

         button.addEventListener('click', () => {
            if(drawer.classList.contains('hidden')) {
               initOptions()
               enableItemSelection()
               drawer.classList.remove('hidden')
               input.focus()
            }
         })

         input.addEventListener('keyup', (e) => {
            initOptions(e.target.value)
            enableItemSelection()
         })

         input.addEventListener('keydown', (e) => {
            if(e.key === 'Backspace' && !e.target.value && inputContainer.childElementCount > 1) {
               const child = body.children[inputContainer.childElementCount - 2].firstChild
               const option = options.find((op) => op.value == child.dataset.value)
               option.selected = false
               removeTag(child.dataset.value)
               setValues()
            }  
         })
         
         window.addEventListener('click', (e) => {   
            if (!customSelectContainer.contains(e.target)){
               drawer.classList.add('hidden')
            }
         });

      }

      function createElements() {
         // Create custom elements
         options = getOptions();
         element.classList.add('hidden')
         
         // .multi-select-tag
         customSelectContainer = document.createElement('div')
         customSelectContainer.classList.add('mult-select-tag')

         // .container
         wrapper = document.createElement('div')
         wrapper.classList.add('wrapper')

         // body
         body = document.createElement('div')
         body.classList.add('body')
         if(customs.shadow) {
               body.classList.add('shadow')
         }
         if(customs.rounded) {
               body.classList.add('rounded')
         }
         
         // .input-container
         inputContainer = document.createElement('div')
         inputContainer.classList.add('input-container')

         // input
         input = document.createElement('input')
         input.classList.add('input')
         input.placeholder = `${customs.placeholder || 'Search...'}`

         inputBody = document.createElement('inputBody')
         inputBody.classList.add('input-body')
         inputBody.append(input)

         body.append(inputContainer)

         // .btn-container
         btnContainer = document.createElement('div')
         btnContainer.classList.add('btn-container')

         // button
         button = document.createElement('button')
         button.type = 'button'
         btnContainer.append(button)

         const icon = domParser.parseFromString(`<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
               <polyline points="18 15 12 21 6 15"></polyline></svg>`, 'image/svg+xml').documentElement
         button.append(icon)


         body.append(btnContainer)
         wrapper.append(body)

         drawer = document.createElement('div');
         drawer.classList.add(...['drawer', 'hidden'])
         if(customs.shadow) {
               drawer.classList.add('shadow')
         }
         if(customs.rounded) {
               drawer.classList.add('rounded')
         }
         drawer.append(inputBody)
         ul = document.createElement('ul');
         
         drawer.appendChild(ul)
      
         customSelectContainer.appendChild(wrapper)
         customSelectContainer.appendChild(drawer)

         // Place TailwindTagSelection after the element
         if (element.nextSibling) {
               element.parentNode.insertBefore(customSelectContainer, element.nextSibling)
         }
         else {
               element.parentNode.appendChild(customSelectContainer);
         }
      }

      function initOptions(val = null) {
         ul.innerHTML = ''
         for (var option of options) {
               if (option.selected) {
                  !isTagSelected(option.value) && createTag(option)
               }
               else {
                  const li = document.createElement('li')
                  li.innerHTML = option.label
                  li.dataset.value = option.value
                  
                  // For search
                  if(val && option.label.toLowerCase().startsWith(val.toLowerCase())) {
                     ul.appendChild(li)
                  }
                  else if(!val) {
                     ul.appendChild(li)
                  }
               }
         }
      }

      function createTag(option) {
         console.log(option)
         //deductSubTotal(option)
         calculateTotalAmount(option, 'minus')
         discount += parseFloat(option.price);
         discountSpan.innerHTML = "$"+parseFloat(discount).toLocaleString();

         // Create and show selected item as tag
         const itemDiv = document.createElement('div');
         itemDiv.classList.add('item-container');
         itemDiv.style.color = tagColor.textColor || '#2c7a7b'
         itemDiv.style.borderColor = tagColor.borderColor || '#81e6d9'
         itemDiv.style.background = tagColor.bgColor || '#e6fffa'
         const itemLabel = document.createElement('div');
         itemLabel.classList.add('item-label');
         itemLabel.style.color = tagColor.textColor || '#2c7a7b'
         itemLabel.innerHTML = option.label
         itemLabel.dataset.value = option.value 
         const itemClose = new DOMParser().parseFromString(`<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="item-close-svg">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
                  </svg>`, 'image/svg+xml').documentElement
   
         itemClose.addEventListener('click', (e) => {
               const unselectOption = options.find((op) => op.value == option.value)
               unselectOption.selected = false
               removeTag(option.value)
               initOptions()
               setValues()
               //calculateSubTotal(option)
               calculateTotalAmount(option, 'add')
               discount -= parseFloat(option.price);
               discountSpan.innerHTML = "$"+parseFloat(discount).toLocaleString();
         })
      
         itemDiv.appendChild(itemLabel)
         itemDiv.appendChild(itemClose)
         inputContainer.append(itemDiv)
      }

      function enableItemSelection() {
         // Add click listener to the list items
         for(var li of ul.children) {
               li.addEventListener('click', (e) => {
                  options.find((o) => o.value == e.target.dataset.value).selected = true
                  input.value = null
                  initOptions()
                  setValues()
                  input.focus()
               })
         }
      }

      function isTagSelected(val) {
         // If the item is already selected
         for(var child of inputContainer.children) {
            if(!child.classList.contains('input-body') && child.firstChild.dataset.value == val) {
               return true
            }
         }
         return false
      }
      function removeTag(val) {
         // Remove selected item
         for(var child of inputContainer.children) {
            if(!child.classList.contains('input-body') && child.firstChild.dataset.value == val) {
               inputContainer.removeChild(child)
            }
         }
      }

      function setValues(fireEvent=true) {
         // Update element final values
         selected_values = []
         for(var i = 0; i < options.length; i++) {
            element.options[i].selected = options[i].selected
            if(options[i].selected) {
               selected_values.push({label: options[i].label, value: options[i].value})
            }
         }
         if (fireEvent && customs.hasOwnProperty('onChange')) {
            customs.onChange(selected_values)
         }
      }
      function getOptions() {
         // Map element options
         return [...element.options].map((op) => {
            return {
               value: op.value,
               label: op.label,
               selected: op.selected,
               price: op.getAttribute("data-discount")
            }
         })
      }
   }
   
   new MultiSelectPromoCode('promoCode');
</script>
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

    var checkboxOne = document.getElementById('checkboxLabelOne');
    var checkboxTwo = document.getElementById('checkboxLabelTwo');
    var proceedButton = document.getElementById('proceedButton');

    function updateButtonState() {
        if (checkboxOne.checked && checkboxTwo.checked) {
            proceedButton.disabled = false;
            proceedButton.classList.remove('disabled-cursor');
            proceedButton.classList.add('cursor-pointer');
            proceedButton.style.backgroundColor = '#011523';
       
        } else {
            proceedButton.disabled = true;
            proceedButton.classList.remove('cursor-pointer');
            proceedButton.classList.add('disabled-cursor');
            proceedButton.style.backgroundColor = 'rgba(1, 21, 35, 0.8)';
           
        }
    }

    checkboxOne.addEventListener('change', updateButtonState);
    checkboxTwo.addEventListener('change', updateButtonState);
</script>
@endsection