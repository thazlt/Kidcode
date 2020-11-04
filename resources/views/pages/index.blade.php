<?php
include APPROOT . "/resources/views/inc/header.blade.php";
 ?>

 <!-- Banner -->
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
 <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
 <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
 <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
</ol>
<div class="carousel-inner" >
 <div class="carousel-item active">
   <img class="d-block w-100" src="<?php echo URLROOT; ?>resources/img/carousel-1.png" alt="First slide">
   <div class="carousel-caption d-none d-md-block mx-auto">
     <h1 style="text-shadow: 1px 1px gray;">Kid Code</h1>
     <h4 style="text-shadow: 1px 1px gray;">Python is a powerful, expressive programming language that’s easy to learn and fun to use!</h4>
     <button type="button" class="btn btn-danger">START FOR FREE</button>
   </div>
 </div>
 <div class="carousel-item">
   <img class="d-block w-100" src="<?php echo URLROOT; ?>resources/img/carousel-3.jpg" alt="Second slide">
   <div class="carousel-caption d-none d-md-block mx-auto">
       <h1 style="text-shadow: 1px 1px gray;">Kid Code</h1>
       <h4 style="text-shadow: 1px 1px gray;">Python for Kids brings Python to life and brings you (and your parents) into the world of programming. The ever-patient Jason R. Briggs will guide you through the basics as you experiment with unique (and often hilarious) example programs that feature ravenous monsters, secret agents, thieving ravens, and more. New terms are defined; code is colored, dissected, and explained; and quirky, full-color illustrations keep things on the lighter side.</p>
   </div>
 </div>
 <div class="carousel-item">
   <img class="d-block w-100" src="<?php echo URLROOT; ?>resources/img/carousel-2.jpg" alt="Third slide">
 </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
 <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
 <span class="carousel-control-next-icon" aria-hidden="true"></span>
 <span class="sr-only">Next</span>
</a>
</div>

 <!-- Info -->
 <div class="container-fluid">
     <div class="card-container">

       <div class="card" style="background-color: rgb(238, 108, 75);">
         <div class="card-body">
           <h5 class="card-title mt-3"><img src="<?php echo URLROOT ?>resources/img/puzzle.png" height="25%" width="25%"></h5>
           <h6 class="card-subtitle mb-3 text-muted">Creative</h6>
           <p class="card-text">We have designed a wide range of activities that concentrate on
                 improving your kid's coding skill and trigger their creativity.</p>
         </div>
       </div>

       <div class="card" style="background-color: rgba(250, 207, 15);">
         <div class="card-body">
           <h5 class="card-title mt-3"><img src="<?php echo URLROOT ?>resources/img/robot.png" height="25%" width="25%"></h5>
           <h6 class="card-subtitle mb-3 text-muted">Easy to approach</h6>
           <p class="card-text">The lessons are well-prepared and simplified to adapt to children's
               mind.</p>
         </div>
       </div>

       <div class="card" style="background-color: #51c5d6;">
         <div class="card-body">
           <h5 class="card-title mt-3"><img src="<?php echo URLROOT ?>resources/img/telesketch.png" height="25%" width="25%"></h5>
           <h6 class="card-subtitle mb-3 text-muted">Enjoy and have fun</h6>
           <p class="card-text">Your children will definitely enjoy the funny content and get the best
               from their time with us</p>
         </div>
       </div>

     </div>
 </div>

 <!-- <div class="container-fluid">
   <div class="row feedback">
     <div class="col-lg-10">
       <p class="lead">I heard about Kid-Code from my friend, Linh and I immediately sent my kid to Saigon.
         It was amazing to see my boy started developing his programming skill from such a young age. The course
         was brilliant with lots of activities and fun, not just boring lessons.
       </p>
       <h4>Justin Bieber</h4>
       <p>Singer, America, Linh's friend. </p>
     </div>
     <div class="col-lg-2">
       <img src="img/bieber.jpg" class="img-fluid">
     </div>
   </div>
 </div> -->

 <!-- Promo -->

     <div class="container-fluid jumbotron">
         <div class="row padding">
             <div class="col-lg-6">
                 <img src="<?php echo URLROOT ?>resources/img/promo1.jpg" width="100%" height="80%" class="img-fluid">
             </div>
             <div class="col-lg-6 promo">
               <div class="promo-text">
                 <h2>Welcome to Kid Code</h2>
                 <p>Let your kids explore the Python World and have some fun!!!</p>
               </div>
             </div>
         </div>
     </div>

 <!-- Footer -->

<?php
include APPROOT . "/resources/views/inc/footer.blade.php";
 ?>
