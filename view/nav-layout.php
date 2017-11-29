<?php ob_start(); ?>

    <!-- Navigation -->
 
    <nav class="navbar navbar-expand-lg navbar-light border border-top-0" id="">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?='index.php'?>">Jean Forteroche</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <?php if(isset($button1)){echo $button1;}?>
            <?php if(isset($button2)){echo $button2;}?>
            <?php if(isset($button3)){echo $button3;}?>
            <?php if(isset($buttonAdmin)){echo $buttonAdmin;}?>
          

          </ul>
        </div>
      </div>
    </nav>

<?php $nav = ob_get_clean(); ?>

