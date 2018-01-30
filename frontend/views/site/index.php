<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Button;

$this->title = 'PeBib';
?>
<div class="site-index">

  <!-- <div class="container"> -->

      <div class="row">
        <a href = <?=Url::to(["buecher/myindex"]);?>>
        <div class="col-md-3">
          <button type="button" class="btn btn-denise btn-user" > <p style="text-align:center;">
            <?php echo Html::img('@web/images/User.png') ?>
          <!-- <img src="assets/User.png" widht="100%" height="100%"
             class="img-fluid" alt="Responsive image" > </p> -->

        </div>
            </a>
            <a href = <?=Url::to(["user/index"]);?>>
            <!-- <a href = "index.php?r=buecher/index"> -->
            <!-- <a href="teilen.html"> -->
            <!-- <a href="teilen.html"> -->
            <div class="col-md-3">
              <button type="button" class="btn btn-denise btn-teilen" > <p style="text-align:center;">
                <?php echo Html::img('@web/images/Teilen.png') ?>
              <!-- <img src="assets/Teilen.png" widht="100%" height="100%"
                 class="img-fluid" alt="Responsive image" > </p> -->
            </div>
          </a>
            <a href = <?=Url::to(["buecher/buecheroffriends"]);?>>
            <!-- <a href="index.php?r=buecher/index"> -->
            <!-- <a href="friends.html"> -->
            <div class="col-md-3">
              <button type="button" class=" btn btn-denise btn-friends" > <p style="text-align:center;">
                <?php echo Html::img('@web/images/friends.png') ?>
              <!-- <img src="assets/friends.png" widht="100%" height="100%"
                 class="img-fluid" alt="Responsive image" > </p> -->
            </div>
          </a>
            <!-- <a href="index.php?r=buecher/index"> -->
            <a href = <?=Url::to(["buecher/create"]);?>>
            <!-- <a href="hinzufuegen.html"> -->
            <div class="col-md-3">
              <button type="button" class="btn btn-denise btn-book" > <p style="text-align:center;">
                <?php echo Html::img('@web/images/book.png') ?>
                <!-- <img src="assets/book.png" widht="100%" height="100%"
              class="img-fluid" alt="Responsive image" > </p> -->

            </div>
          </a>

    </div>

    <div class="row">


            <a href = <?=Url::to(["user/index"]);?>>
              <div class="col-md-3">
                <button type="button" class="btn btn-denise btn-place" > <p style="text-align:center;">
              <?php echo Html::img('@web/images/place.png') ?>
              <!--<img src="assets/place.png" widht="100%" height="100%"
            class="img-fluid" alt="Responsive image" > </p> -->
          </div>
          </a>


          <div class="col-md-9">
            <button type="button" class="btn btn-denise btn-msg" >
            = Eine neue Nachticht vom 01.01.18 <br><br>

            Lisa:"Ich brauche mein Buch wieder!"
          </div>



  </div>
  <div class="row">
    <a href = <?=Url::to(["site/about"]);?>>
        <div class="col-md-12">
          <button type="button" class="btn btn-denise btn-about btn-block">How to use...</button>
        </div>
      </a>
        <!-- <a href="index.php?r=buecher/index"> -->
        <!-- <a href="user.html"> -->

  </div>
  <!-- </div> -->

</div>
