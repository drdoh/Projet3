<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<section id="contact">
<div class="container">
  <div class="row">
    <div class="col-lg-8 mx-auto text-center">
      <h2 class="section-heading">Contactez moi !</h2>
      <hr class="my-4">
      <p class="mb-5">Je vous répondrais peut-être ...</p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 ml-auto text-center">
      <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
      <p>01-02-03-04-05</p>
    </div>
    <div class="col-lg-4 mr-auto text-center">
      <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
      <p>
        <a href="mailto:your-email@your-domain.com">feedback@jean-forteroche.com</a>
      </p>
    </div>
  </div>
</div>
</section>
    </nav>


<?php $footer = ob_get_clean(); ?>
