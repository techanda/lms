<div id="homeCarousel" class="carousel slide  drop-shadow border-grey" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#homeCarousel" data-slide-to="1"></li>
    <li data-target="#homeCarousel" data-slide-to="2"></li>
    <li data-target="#homeCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php include $PATH['BLOCKS'].'carousel/block.carousel.tile4.php'; ?>
    <?php include $PATH['BLOCKS'].'carousel/block.carousel.tile2.php'; ?>
    <?php include $PATH['BLOCKS'].'carousel/block.carousel.tile1.php'; ?>
    <?php include $PATH['BLOCKS'].'carousel/block.carousel.tile3.php'; ?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href='#homeCarousel' role="button" data-slide="prev">
    <i class="fa fa-chevron-left"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href='#homeCarousel' role="button" data-slide="next">
    <i class="fa fa-chevron-right"></i>
    <span class="sr-only">Next</span>
  </a>
</div>
