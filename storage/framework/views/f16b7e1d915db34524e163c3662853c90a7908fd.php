<section class="banner relative flex justify-center items-center bg-grey-900">
         <span class="banner--bg absolute inset-0 bg-cover"
            style="background-image: url(images/collage_1.jpg); background-position: center top"> </span> <span class="video--overlay"
            style="background-color: rgba(0,0,0,0.7)"></span>
         <div class="container mx-auto z-10 px-20 lg:p-0">
            <div class="banner--wrapper">
               <div class="banner--home">
                  <p style="text-align: center">More than 63 ads in 5 categories</p>
                  <h1 style="text-align: center">List or find anything, literally.</h1>
               </div>
               <div id="home-search" class="flex-center mx-auto w-full lg:w-50%"
                  data-options="{&quot;columns&quot;:1,&quot;padding&quot;:4,&quot;width&quot;:50}">
                  <div class="flex-center flex-col">
                     <svg width="45" height="45" viewBox="0 0 45 45" xmlns="http://www.w3.org/2000/svg" stroke="#4c4c4c">
                        <g fill="none" fill-rule="evenodd" transform="translate(1 1)" stroke-width="1">
                           <circle cx="22" cy="22" r="6" stroke-opacity="0">
                              <animate attributeName="r"
                                 begin="1.5s" dur="3s"
                                 values="6;22"
                                 calcMode="linear"
                                 repeatCount="indefinite"/>
                              <animate attributeName="stroke-opacity"
                                 begin="1.5s" dur="3s"
                                 values="1;0" calcMode="linear"
                                 repeatCount="indefinite"/>
                              <animate attributeName="stroke-width"
                                 begin="1.5s" dur="3s"
                                 values="2;0" calcMode="linear"
                                 repeatCount="indefinite"/>
                           </circle>
                           <circle cx="22" cy="22" r="6" stroke-opacity="0">
                              <animate attributeName="r"
                                 begin="3s" dur="3s"
                                 values="6;22"
                                 calcMode="linear"
                                 repeatCount="indefinite"/>
                              <animate attributeName="stroke-opacity"
                                 begin="3s" dur="3s"
                                 values="1;0" calcMode="linear"
                                 repeatCount="indefinite"/>
                              <animate attributeName="stroke-width"
                                 begin="3s" dur="3s"
                                 values="2;0" calcMode="linear"
                                 repeatCount="indefinite"/>
                           </circle>
                           <circle cx="22" cy="22" r="8">
                              <animate attributeName="r"
                                 begin="0s" dur="1.5s"
                                 values="6;1;2;3;4;5;6"
                                 calcMode="linear"
                                 repeatCount="indefinite"/>
                           </circle>
                        </g>
                     </svg>
                  </div>
               </div>
               <div class="banner--taxonomies flex flex-wrap justify-center items-center mt-30 -mb-10 -mx-2">
			     <?php
				  $bannerCategories = [
				  ['text' => "Cars",'image' => "images/001_sedan_car.svg"],
				  ['text' => "Real Estates",'image' => "images/008_home_apartment_house_building_7.svg"],
				  ['text' => "Boats",'image' => "images/001_boat_speed_yacht_vessel.svg"],
				  ['text' => "Bikes",'image' => "images/001_bicycle_transport_sport.svg"],
				  ['text' => "Pets",'image' => "images/009_rabbit_animal_nature_speed_fast_quick.svg"],
				  ];
				  foreach($bannerCategories as $bc)
				  {
				 ?>
                  <a href="javascript:void(0)"
                     class="banner--taxonomy__container flex-center flex-col mt-10 px-2">
                     <div class="banner--taxonomy__bg flex-center h-64 w-86 sm:h-86 sm:w-86 rounded">
                        <div class="banner--taxonomy__icon "> <img src="<?php echo e($bc['image']); ?>" alt="icon" class="h-48 w-48 sm:h-48 sm:w-48"></div>
                     </div>
                     <h5 class="mt-6 text-sm text-grey-400"><?php echo e($bc['text']); ?></h5>
                  </a>
				  <?php
				  }
				  ?>
                 
               </div>
            </div>
         </div>
      </section><?php /**PATH C:\bkupp\lokl\repo\fidellty\resources\views/banner.blade.php ENDPATH**/ ?>