                <div class="col-md-4 sidebar">
				 <?php
					 if(isset($posts))
					 {
				 ?>
				    <h4 class="text-uppercase">Related Posts</h4>
                    <div >
                    <?php
					 foreach($posts as $p)
						 {
					?>
                            <div class="block">


    <a href="{{$p['url']}}" class="block-link">
        <img class="img-responsive" src="{{$p['img']}}"></img>
        <div class="bordered-wrapper">
            <h5>{{$p['title']}}</h5>
        </div>
        <span class="btn btn--secondary btn--block">More</span>
    </a>

                            </div>
				<?php
						 }
					 }
				?>              