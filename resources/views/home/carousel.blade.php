<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <?php
            $directory = 'uploads/slider/';
            $images = glob($directory . "*.{jpg,png,gif}",GLOB_BRACE);

            foreach($images as $k=>$image):
            
            ?>
            <div class="carousel-item <?php echo $k==0?'active':''?>" >
                <img class="d-block w-100" src="<?php echo $image?>" alt="First slide">
            </div>

            <?php endforeach;?>        

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

