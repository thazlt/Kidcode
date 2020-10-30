<?php
include APPROOT . "/resources/views/inc/header.blade.php";
 ?>

    <!-- Banner -->
    <div class="container-fluid">
      <div class="banner">
        <div>
          <h1>ABOUT US</h1>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row team-info">
        <div class="col-md-2 mb-3">

            <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab">Overview</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab">Our Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab">Contact</a>
              </li>
            </ul>

        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-10">
          <div class="tab-content container-fluid" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel">
              <h2>Vision</h2>
              <p>Kid Code was established by four co-founders with the wish to spread the popularity of Python to the non-programmer world. Python is a very versatile programming language, with a plethora of uses in a variety of different fields.</p>
              <p>Instead of teaching an adult about Python, we see children under the age of 14 as our target audience. Starting from mini applications of Python like Raspberry Pi, simple games, your children will have a more solid ground if they wish to follow programming in the future.</p>
              <h2>ERD</h2>
              <img class="d-block w-100" src="<?php echo URLROOT; ?>/resources/img/ERD.png">
              <h2>UML use case</h2>
              <img class="d-block w-100" src="<?php echo URLROOT; ?>/resources/img/UMLusecase.png">
              <a href="#"><h2>Download our page files here</h2></a>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel">

                <h2>Our Team</h2>
                <p>Consist of 4 starting members, we split our workforce into 2 sub-teams. The first half will focus on the front-end side while the other half will work with the back-end of the project.</p>
                <h4>Front-end team:</h4>
                <div class="team-member">
                  <div class="">
                    <img src="<?php echo URLROOT; ?>/resources/img/di.jpg" width="200px" height="200px" style="object-fit: cover;">
                    <h4>Nguyen Vo Thanh Vy</h4>
                    <p>1859050</p>
                  </div>
                  <div class="">
                    <img src="<?php echo URLROOT; ?>/resources/img/ava.png"  width="200px" height="200px" style="object-fit: cover;">
                    <h4>Nguyen Tien Thien Thanh</h4>
                    <p>1859046</p>
                  </div>
                </div>
              <h4>Back-end team:</h4>
              <div class="team-member">
                <div class="">
                  <img src="<?php echo URLROOT; ?>/resources/img/ava.png" width="200px" height="200px" style="object-fit: cover;">
                  <h4>Lai Thien Thach</h4>
                  <p>1859044</p>
                </div>
                <div class="">
                  <img src="<?php echo URLROOT; ?>/resources/img/ava.png"  width="200px" height="200px" style="object-fit: cover;">
                  <h4>Huynh Xuan Tin</h4>
                  <p>1759039</p>
                </div>
              </div>
          </div>

          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>
            <div class="contact-block">
                <div>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6307047611886!2d106.67998301526029!3d10.7629182623849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1c06f4e1dd%3A0x43900f1d4539a3d!2sHo%20Chi%20Minh%20City%20University%20of%20Science!5e0!3m2!1sen!2s!4v1579415840024!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div>
                  <form>
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" id="fullname" placeholder="Insert your full name here!">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="message">Message:</label>
                      <textarea class="form-control" rows="5" id="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
          </div>

            </div>


        </div>
      </div>
        <!-- /.col-md-8 -->
    </div>

    <!---->



    <?php
    include APPROOT . "/resources/views/inc/footer.blade.php";
     ?>
