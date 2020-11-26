<?php
include APPROOT . '/resources/views/inc/header.blade.php';
$i=1;
 ?>
    <div class="banner-faq">
        <div class="container-fluid">
            <h1 class="forum-title">Manage your lessons</h1>
            <p>Teachers can be able to edit their own lessons</p>
        </div>
    </div>
    <div class="container">
        <div class="row team-info">
            <div class="col-lg-3">
                <ul class="nav nav-pills flex-column" id="myTab">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" href="#home">Back to My lessons</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9" >
            <div class="container-fluid" id="exercise">
            <form action="<?php echo URLROOT . "teacher/uploadLesson";?>">
            <input type="hidden" name="PostAuthor" value="<?php echo session()->get('username');?>">
                <article>
                  <div class="single-post-content">
                    <div class="form-group">
                      <label for="Title">Exercise Title: </label>
                        <input type="text" id="title" class="text-field" placeholder="Your exercise title ..." name="PostTitle" autocomplete="off" maxlength="200">
                    </div>
                        <label for="Title">Exercise details: </label>
                        <div class="single-post-content" style="padding: 0px 15px; margin-bottom: 0;">
                            <br>
                            <textarea name="Content" id="editor1" cols="60" rows="9" class="post-content" placeholder="Enter text here ..."></textarea>
                              <script>
                                CKEDITOR.replace('editor1');
                              </script>
                        </div>
                        <label for="Title">Code: </label>
                        <div class="single-post-content" style="padding: 0px 15px; margin-bottom: 0;">
                            <br>
                            <textarea name="Content" id="editor2" cols="60" rows="13" class="post-content" placeholder="Enter text here ..."></textarea>
                              <script>
                                CKEDITOR.replace('editor2');
                              </script>
                        </div>
                        <button class="btn btn-primary button new_post" style="text-align: center; width:100%" type="" name="button"><span class="icon_edit"><i class="fa fa-edit"></i>Create Exercise</span></button>
                 </div>
                </article>
            </form>
            </div>
            </div>
        </div>
    </div>


<?php
    include APPROOT . "/resources/views/inc/footer.blade.php";
?>
