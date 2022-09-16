<?php
$user = null;
$cart = [];
$dt = [];
?>


<?php $__env->startSection('title',"Page Not Found"); ?>


<?php $__env->startSection('headerClass',"bg-header"); ?>
<?php $__env->startSection('main-id',"id=main class=site-main py-40 sm:py-60"); ?>

<?php $__env->startSection('content'); ?>
   <div class="container">
      <div class="flex flex-wrap mx-auto w-full ">
         <section class="mx-auto px-col w-full lg:w-4/6">
           <div class="error-404 not-found p-30 bg-grey-100 rounded">
           <header class="page-header">
             <h1 class="page-title">Oops! That page can’t be found.</h1>
           </header>
           <div class="page-content clearfix">
             <p>It looks like nothing was found at this location. Maybe try a search?</p>
             <form role="search" method="get" class="search-form" action="https://classic.lisfinity.com/">
                <label for="widget-search-form">
                   <span class="screen-reader-text">Search for:</span> 
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve" class="absolute top-12 left-20 w-16 h-16 fill-grey-500">
                      <path d="M94.4,83.8L73.2,62.6c-1.9-1.9-4.9-1.9-6.8-0.1l-9.3-9.2c4.3-5.2,7-11.9,7-19.2c0-16.5-13.4-30-30-30s-30,13.4-30,30
                       s13.4,30,30,30c7.2,0,13.9-2.6,19.1-6.9l9.3,9.2l-0.1,0.1c-1.9,1.9-1.9,5.1,0,7l21.2,21.1c1.9,1.9,5.1,1.9,7,0l3.8-3.8
                       C96.3,88.8,96.3,85.7,94.4,83.8z M9.7,34.1c0-13.5,11-24.5,24.5-24.5s24.5,11,24.5,24.5s-11,24.5-24.5,24.5S9.7,47.5,9.7,34.1z"></path>
                    </svg>
                    <input type="search" id="widget-search-form" class="search-field pl-30" placeholder="Type your search term..." value="" name="s"> 
                </label>
             </form>
           </div>
          </div>
         </section>
         
		 <?php echo $__env->make('__generic_aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\minee\resources\views/errors/404.blade.php ENDPATH**/ ?>