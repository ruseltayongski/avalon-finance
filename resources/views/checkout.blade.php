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
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
@endsection

<div 
    x-data="{ isMobile: window.innerWidth <= 1024 }"
    x-init="() => {
        window.addEventListener('resize', () => {
            isMobile = window.innerWidth <= 1024;
            console.log(window.innerWidth);
        });
    }"
    :class="{ 'relative z-10 bg-cover bg-center bg-no-repeat pt-[30px] pb-20 md:pt-[100px]': isMobile, 'z-10 relative bacground-image-hero': !isMobile }"
    :style="isMobile ? 'background-image: url({{ asset('/images/v2crop.png') }})' : ''">
    
</div>

<section class="relative z-40 py-10 lg:py-[40px] dark:bg-[#011523]"  x-data="{ isMobile: window.innerWidth <= 600 }"
x-init="() => {
   window.addEventListener('resize', () => {
      isMobile = window.innerWidth <= 600;
      console.log(window.innerWidth);
   });
}">
   <div class="absolute top-0 left-0 z-[-1] h-1/2 w-full bg-[#011523] dark:bg-dark-3"></div>
   <div class="container mx-auto">
      <div class="flex flex-wrap" :class="{ '-mx-4': isMobile, 'mx-auto': !isMobile }">
         <div class="w-full px-4 lg:w-7/12 xl:w-8/12 lg:px-16">
            <div class="mb-12 lg:mb-0">
               <h3
                  class="mb-8 text-lg font-semibold text-white dark:text-white sm:leading-[40px] sm:text-[28px]
                  animate-fade-down animate-duration-1000 animate-delay-500
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
                  <div x-data="{ 
                        cartNotification: false,
                        modalOpen: false,
                        formData: {
                        fullName: '',
                        email1: '',
                        email2: '',
                        billingAddress: '',
                        country: '',
                        city: '',
                        postCode: '',
                        typeOfPayment: '',
                        totalAmount: '',
                        },
                     }">
                     <form action="{{ route('send.email') }}" method="POST" class="pb-4 mb-10 border-b border-stroke dark:border-dark-3 animate-fade-right animate-duration-1000 animate-delay-500">
                        @csrf
                        <div :class="{ 'w-full flex justify-center pb-5': isMobile, 'w-1/2': !isMobile}">
                           <select name="countries" id="countries" multiple>
                              <option value="1">Afghanistan</option>
                              <option value="2">Australia</option>
                              <option value="3">Germany</option>
                              <option value="4">Canada</option>
                              <option value="5">Russia</option>
                          </select>
                        </div>
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
                                       <option value="gcash" class="dark:bg-dark-2">
                                          Full
                                       </option>
                                       <option value="uk" class="dark:bg-dark-2">
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
                                 <label
                                    for=""
                                    class="mb-2.5 block text-base font-medium text-dark dark:text-white"
                                    >
                                 Total Amount to be Processed<span class="text-red">*</span>
                                 </label>
                                 <input
                                    type="text"
                                  {{--   :value="checkout.reduce((acc, cart) => parseFloat(acc) + parseFloat(cart.price), 0).toLocaleString()" --}}
                                    class="w-full rounded-md bg-transparent border border-stroke dark:border-dark-3 py-3 px-5 text-body-color dark:text-dark-5 placeholder:text-dark-5 outline-none transition focus:border-[#011523] active:border-[#011523] disabled:cursor-default disabled:bg-[#F5F7FD]"
                                    name="totalAmount"
                                    />
                              </div>
                           </div>
                           <div class="px-4" :class="{ 'w-full flex justify-center pb-5': isMobile, 'w-1/2': !isMobile}">
                                 <button {{-- @click="cartNotification = true" --}} 
                                    class="flex items-center justify-center w-full px-10 py-3 text-base font-medium text-center text-white rounded-md bg-[#011523] hover:bg-[#011523]/90"
                                    :class="{ 'w-full': isMobile, 'w-full': !isMobile }"   
                                    {{-- x-on:click="submit" --}}
                                    type="submit"
                                    >
                                    Thru Phone Process
                                 </button>
                           </div>
                           <div class="px-4" :class="{ 'w-full flex justify-center': isMobile, 'w-1/2': !isMobile}">
                              <button {{-- @click="cartNotification = true" --}} 
                                 class="flex items-center justify-center w-full px-10 py-3 text-base font-medium text-center text-white rounded-md bg-[#011523] hover:bg-[#011523]/90"
                                 :class="{ 'w-full': isMobile, 'w-full': !isMobile }"   
                                 {{-- x-on:click="submit" --}}
                                 type="submit"
                                 >
                                 Send Invoice
                              </button>
                           </div>
                        </div>   
                        <div x-show="modalOpen" class="bg-[#000000] dark:bg-[#00000] dark:bg-opacity-40 bg-opacity-20 fixed z-50 top-0 left-0 flex items-center 
                        justify-center w-full h-screen overflow-y-scroll">
                           <div @click.outside="modalOpen = false" class="relative mx-auto max-w-[660px]
                           bg-white dark:bg-dark-2 shadow-1 dark:shadow-3 h-[95vh]">
                              <div class="p-8 bg-white dark:bg-dark-2 rounded-[10px] ">
                                 <button @click="modalOpen = false" class="bg-red p-1 absolute right-5 top-5 rounded-[5px] text-white dark:text-dark-6">
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
                                 <p class="text-sm mb-7 dark:text-dark-6 text-body-color">
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
                                          class="flex items-center justify-center w-5 h-5 mr-4 border border-stroke dark:border-dark-3 rounded box"
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
                                       class="flex items-center justify-center w-5 h-5 mr-4 border border-stroke dark:border-dark-3 rounded box"
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
                                       @click="modalOpen = false"
                                       class="px-5 py-2 text-sm font-medium rounded-md text-white shadow-1 dark:shadow-3 bg-[#011523] hover:bg-[#011523]/80 dark:text-white dark:bg-white/5"
                                       >
                                    Proceed
                                    </button>
                                    <button
                                       @click="modalOpen = false"
                                       class="px-5 py-2 text-sm font-medium text-white rounded-md bg-[#3056D3] bg-opacity-50 hover:bg-opacity-50"
                                       >
                                    Cancel   
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div x-show="cartNotification"
                           class="fixed z-[60] w-full lg:w-[30%] bottom-20 flex items-center rounded-lg border border-green-light-4 dark:border-green bg-white dark:bg-dark-2 p-5">
                           <div class="mr-5 flex h-[60px] w-full max-w-[60px] items-center justify-center rounded-[5px] bg-green">
                              <svg 
                                 width="24" 
                                 height="25" 
                                 viewBox="0 0 24 25" 
                                 fill="none" 
                                 xmlns="http://www.w3.org/2000/svg"
                                 >
                                 <path 
                                    d="M12 1.17499C5.7375 1.17499 0.675003 6.23749 0.675003 12.5C0.675003 18.7625 5.7375 23.8625 12 23.8625C18.2625 23.8625 23.3625 18.7625 23.3625 12.5C23.3625 6.23749 18.2625 1.17499 12 1.17499ZM12 22.175C6.675 22.175 2.3625 17.825 2.3625 12.5C2.3625 7.17499 6.675 2.86249 12 2.86249C17.325 2.86249 21.675 7.21249 21.675 12.5375C21.675 17.825 17.325 22.175 12 22.175Z" 
                                    fill="white"
                                    />
                                 <path 
                                    d="M15.225 9.01248L10.7625 13.3625L8.7375 11.375C8.4 11.0375 7.875 11.075 7.5375 11.375C7.2 11.7125 7.2375 12.2375 7.5375 12.575L9.9375 14.9C10.1625 15.125 10.4625 15.2375 10.7625 15.2375C11.0625 15.2375 11.3625 15.125 11.5875 14.9L16.425 10.25C16.7625 9.91248 16.7625 9.38748 16.425 9.04998C16.0875 8.71248 15.5625 8.71248 15.225 9.01248Z" 
                                    fill="white"
                                    />
                              </svg>
                           </div>
                           <div class="flex w-full items-center justify-between">
                              <div>
                                 <h6 class="text-base font-semibold text-dark dark:text-white sm:text-lg mb-0.5">
                                 Congratulations
                                 </h6>
                                 <p class="text-body-color text-sm dark:text-dark-6">
                                 your transaction was successful
                                 </p>
                              </div>
                              <button class="text-dark-5 dark:text-dark-6 hover:text-green" @click="cartNotification = false" type="button">
                                 <svg 
                                 width="16" 
                                 height="16" 
                                 viewBox="0 0 16 16" 
                                 fill="none" 
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="fill-current"
                                 >
                                 <g clip-path="url(#clip0_1088_26057)">
                                    <path 
                                          d="M8.79999 7.99999L14.9 1.89999C15.125 1.67499 15.125 1.32499 14.9 1.09999C14.675 0.874994 14.325 0.874994 14.1 1.09999L7.99999 7.19999L1.89999 1.09999C1.67499 0.874994 1.32499 0.874994 1.09999 1.09999C0.874994 1.32499 0.874994 1.67499 1.09999 1.89999L7.19999 7.99999L1.09999 14.1C0.874994 14.325 0.874994 14.675 1.09999 14.9C1.19999 15 1.34999 15.075 1.49999 15.075C1.64999 15.075 1.79999 15.025 1.89999 14.9L7.99999 8.79999L14.1 14.9C14.2 15 14.35 15.075 14.5 15.075C14.65 15.075 14.8 15.025 14.9 14.9C15.125 14.675 15.125 14.325 14.9 14.1L8.79999 7.99999Z" 
                                          />
                                 </g>
                                 <defs>
                                    <clipPath id="clip0_1088_26057">
                                          <rect width="16" height="16" fill="white"/>
                                    </clipPath>
                                 </defs>
                                 </svg>
                              </button>
                           </div>
                        </div>
                     </form>
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
                  class="mb-10 overflow-hidden rounded-[10px] bg-white dark:bg-dark-2 shadow-testimonial-6 dark:shadow-box-dark py-10 px-6 sm:px-10"
                  >
                  <div class="flex items-center mb-9">
                     <div
                        class="mr-6 h-[90px] w-full max-w-[80px] overflow-hidden rounded-lg sm:h-[110px] sm:max-w-[100px] border border-stroke dark:border-dark-3"
                        >
                        <img
                           src="https://cdn.tailgrids.com/1.0/assets/images/ecommerce/checkout/checkout-04/product-01.jpg"
                           alt="product"
                           class="object-cover object-center w-full h-full"
                           />
                     </div>
                     <div class="w-full">
                        <p
                           class="mb-[6px] text-base font-medium text-dark dark:text-white"
                           >
                           Trendy Ladies Pants
                        </p>
                        <p
                           class="text-sm font-medium text-body-color dark:text-dark-6"
                           >
                           $59.99
                        </p>
                        <p
                           class="text-sm font-medium text-body-color dark:text-dark-6"
                           >
                           <span class="pr-0.5"> Quantity: </span> <span>1</span>
                        </p>
                     </div>
                  </div>
                  <div class="flex items-center mb-9">
                     <div
                        class="mr-6 h-[90px] w-full max-w-[80px] overflow-hidden rounded-lg sm:h-[110px] sm:max-w-[100px] border border-stroke dark:border-dark-3"
                        >
                        <img
                           src="https://cdn.tailgrids.com/1.0/assets/images/ecommerce/checkout/checkout-04/product-02.jpg"
                           alt="product"
                           class="object-cover object-center w-full h-full"
                           />
                     </div>
                     <div class="w-full">
                        <p
                           class="mb-[6px] text-base font-medium text-dark dark:text-white"
                           >
                           Men's Sendo T-shirt
                        </p>
                        <p
                           class="text-sm font-medium text-body-color dark:text-dark-6"
                           >
                           $80.99
                        </p>
                        <p
                           class="text-sm font-medium text-body-color dark:text-dark-6"
                           >
                           <span class="pr-0.5"> Quantity: </span> <span>2</span>
                        </p>
                     </div>
                  </div>
                  <div class="pt-6 border-t border-stroke dark:border-dark-3">
                     <p
                        class="mb-[10px] flex items-center justify-between text-base text-dark dark:text-white"
                        >
                        <span>Subtotal</span>
                        <span class="font-medium"> $140.98 </span>
                     </p>
                  {{--    <p
                        class="mb-[10px] flex items-center justify-between text-base text-dark dark:text-white"
                        >
                        <span>Shipping Cost</span>
                        <span class="font-medium"> $10.99 </span>
                     </p> --}}
                    {{--  <p
                        class="flex items-center justify-between mb-5 text-base text-dark dark:text-white"
                        >
                        <span>Discount</span>
                        <span class="font-medium"> $5.00 </span>
                     </p> --}}
                  </div>
                  <div class="pt-5 border-t border-stroke dark:border-dark-3">
                     <p
                        class="flex items-center justify-between mb-6 text-base text-dark dark:text-white"
                        >
                        <span>Total Amount</span>
                        <span class="font-medium"> $124.99 </span>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
<script>
   new MultiSelectTag('countries')
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
</script>
@endsection