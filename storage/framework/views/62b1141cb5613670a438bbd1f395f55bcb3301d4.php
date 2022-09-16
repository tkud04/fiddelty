<?php $__env->startSection('title',"Login"); ?>

<?php $__env->startSection('styles'); ?>
<link type="text/css" media="all" href="<?php echo e(asset('lib/breeze/css/breeze_80029d6c3eef3e2266e6b977686f0751.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('headerClass',"bg-header"); ?>
<?php $__env->startSection('main-id',"id=page-auth"); ?>

<?php $__env->startSection('content'); ?>
<div class="auth flex flex-col bg-white md:flex-row">
   <div class="auth--left relative flex-center flex-col w-full md:w-1/2">
      <div class="auth--inner w-full">
         <div class="auth--title mb-30 font-bold">
            <h1 class="mb-10">Login</h1>
            <nav class="search--breadcrumb">
               <ul class="flex items-center -mx-4">
                  <li class="flex items-center px-2 text-grey-500">
                     <div class="relative mr-8 w-16 h-16 fill-icon-home">
                        <div>
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve" class="injected-svg" data-src="https://classic.lisfinity.com/wp-content/plugins/lisfinity-core/dist/images/home.9ea7122d8e.svg">
                              <g>
                                 <path d="M81.8,97.5H62.6c-2.7,0-4.9-2.2-4.9-4.9V74.2c0-1.8-1.5-3.3-3.3-3.3h-8.9c-1.8,0-3.3,1.5-3.3,3.3v18.3   c0,2.7-2.2,4.9-4.9,4.9H18.2c-2.1,0-3.8-1.7-3.8-3.8V38c0-1,0.4-2,1.1-2.7L47.3,3.6c1.5-1.5,3.9-1.5,5.4,0l31.8,31.8   c0.7,0.7,1.1,1.7,1.1,2.7v55.6C85.7,95.8,83.9,97.5,81.8,97.5z M63.2,92h16.9V38.8L50,8.7l-30.1,30v53.2h16.9V74.2   c0-4.8,3.9-8.8,8.8-8.8h8.9c4.8,0,8.8,3.9,8.8,8.8V92z"></path>
                              </g>
                           </svg>
                        </div>
                     </div>
                     <a href="<?php echo e(url('/')); ?>" class="font-semibold text-grey-500">Home</a><span class="ml-4">/</span>
                  </li>
                  <li class="px-4 text-grey-900"><span class="font-semibold">Login</span></li>
               </ul>
            </nav>
         </div>
         <div class="relative flex items-center mb-20 p-20 bg-red-100 rounded font-semibold text-red-1000" style="display: none !important;">
            Demo account:
            <div class="flex flex-wrap ml-auto">
               <div class="flex w-full"><button class="btn bg-red-600 rounded text-white leading-none hover:bg-red-700">Login</button></div>
            </div>
         </div>
         <form class="form--auth -mb-20" method="post" action="<?php echo e(url('login')); ?>">
			 <?php echo csrf_field(); ?>

            <div class="field flex flex-col mb-20">
               <div class="field--top flex justify-between"><label for="username" class="field--label mb-4 text-sm text-grey-500">Email address</label></div>
               <div class="field--wrapper relative flex items-center h-44 p-14 border border-grey-300 rounded bg-grey-100">
                  <div class="relative mr-8 w-16 h-16 fill-field-icon">
                     <div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve" class="injected-svg" data-src="https://classic.lisfinity.com/wp-content/plugins/lisfinity-core/dist/images/home.9ea7122d8e.svg">
                           <g>
                              <path d="M81.8,97.5H62.6c-2.7,0-4.9-2.2-4.9-4.9V74.2c0-1.8-1.5-3.3-3.3-3.3h-8.9c-1.8,0-3.3,1.5-3.3,3.3v18.3   c0,2.7-2.2,4.9-4.9,4.9H18.2c-2.1,0-3.8-1.7-3.8-3.8V38c0-1,0.4-2,1.1-2.7L47.3,3.6c1.5-1.5,3.9-1.5,5.4,0l31.8,31.8   c0.7,0.7,1.1,1.7,1.1,2.7v55.6C85.7,95.8,83.9,97.5,81.8,97.5z M63.2,92h16.9V38.8L50,8.7l-30.1,30v53.2h16.9V74.2   c0-4.8,3.9-8.8,8.8-8.8h8.9c4.8,0,8.8,3.9,8.8,8.8V92z"></path>
                           </g>
                        </svg>
                     </div>
                  </div>
                  <input type="text" id="username" name="username" class="bg-transparent text-bold w-full" placeholder="Your email address" autocomplete="off">
               </div>
            </div>
            <div class="field flex flex-col mb-20">
               <div class="field--top flex justify-between"><label for="password" class="field--label mb-4 text-sm text-grey-500">Password</label></div>
               <div class="field--wrapper relative flex items-center h-44 p-14 border border-grey-300 rounded bg-grey-100">
                  <div class="relative mr-8 w-16 h-16 fill-field-icon">
                     <div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve" class="injected-svg" data-src="https://classic.lisfinity.com/wp-content/plugins/lisfinity-core/dist/images/lock.5facb903f8.svg">
                           <g>
                              <path d="M75.8,33.7v-5.6C75.8,13.9,64.2,2.4,50,2.4c-14.2,0-25.8,11.6-25.8,25.8v5.6c-9.1,1.7-16,9.7-16,19.3v26.2   c0,10.2,8.3,18.5,18.5,18.5h46.5c10.2,0,18.5-8.3,18.5-18.5V53C91.8,43.4,84.8,35.4,75.8,33.7z M50,7.9c11.2,0,20.3,9.1,20.3,20.3   v5.2H29.7v-5.2C29.7,17,38.8,7.9,50,7.9z M86.3,79.1c0,7.2-5.8,13-13,13H26.7c-7.2,0-13-5.8-13-13V53c0-7.8,6.3-14.1,14.1-14.1   h44.3c7.8,0,14.1,6.3,14.1,14.1V79.1z"></path>
                              <path d="M50,59.5c-2.2,0-4,1.8-4,4v6.6c0,1.1,0.5,2.2,1.3,2.9v4.1c0,1.5,1.2,2.8,2.8,2.8s2.8-1.2,2.8-2.8V73   c0.8-0.7,1.3-1.8,1.3-2.9v-6.6C54,61.3,52.2,59.5,50,59.5z"></path>
                           </g>
                        </svg>
                     </div>
                  </div>
                  <input type="password" id="password" name="password" class="bg-transparent text-bold w-full" placeholder="Password" autocomplete="off">
               </div>
            </div>
            <div class="flex justify-between">
               <div class="field flex flex-col mb-20">
                  <div class="field--checkbox field--checkbox__auth"><input type="checkbox" id="rememberme" name="rememberme"><label for="rememberme" class="w-full font-normal">Remember me</label></div>
               </div>
               <a class="text-red-700 hover:underline" data-animation="ripple" href="/password-reset">Forgot Password?</a>
            </div>
            <button type="submit" class="btn text-lg flex-center w-full h-44 bg-blue-700 font-bold hover:bg-blue-900">Login</button>
            <div class="flex justify-center items-center mt-20"><span class="text-grey-1100">Don't have an account?</span><a href="<?php echo e(url('register')); ?>" class="relative btn-auth-redirect btn flex-center ml-6 p-0 font-semibold text-blue-700 hover:underline">Create an account</a></div>
         </form>
      </div>
   </div>
   <div class="auth--promo relative w-full md:w-1/2">
   <img src="<?php echo e(asset('images/sign-in-copy.jpg')); ?>" alt="Promo Image" class="absolute top-0 left-0 w-full h-full object-cover"/>
   <span class="absolute top-0 left-0 w-full h-full" style="background-color: rgb(0, 0, 0); opacity: 0.2;"></span></div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\minee\resources\views/login.blade.php ENDPATH**/ ?>