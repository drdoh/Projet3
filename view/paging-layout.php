<?php ob_start();
if(isset($pagingBtns)){
?>

    <!-- Navigation -->
<nav class="container">

  <ul class="m-2 justify-content-center pagination">
    <li class="page-item">
      <a class="page-link" href="index.php?action=listPosts&p=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
          <?php
          
            foreach($pagingBtns as $pagingBtn){
          ?>


    <li class="page-item <?=$pagingBtn['class']?>"><?=$pagingBtn['link']?></li>


          <?php
            }
          ?>
    <li class="page-item">
      <a class="page-link" href="index.php?action=listPosts&p=<?=$i-1?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>


</nav>

<?php } $paging = ob_get_clean(); ?>