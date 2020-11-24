<?php
include APPROOT . '/resources/views/inc/header.blade.php';
 ?>
    <div class="banner-forum">
        <div class="container-fluid">
            <h1 class="forum-title">Discussion - Questions and Answers</h1>
        </div>
    </div>
    <div class="cover-forum">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                           <div class="single-post">
                               <div class="post-content">
                                   <header>
                                       <div class="post-title">
                                           <h1 id="post-title"><?php echo $data['Post']['PostTitle']; ?></h1>
                                       </div>
                                       <div class="post-meta">
                                           <div class="author">
                                               <p>
                                                   <i class="fas fa-user"></i>
                                                   by
                                                   <a href="" title="author"><?php echo $data['Post']['PostAuthor']; ?></a>
                                               </p>
                                           </div>
                                           <div class="date_time">
                                               <p>
                                                <i class="fas fa-calendar"></i>
                                                <?php echo $data['Post']['PostDate']; ?>
                                               </p>
                                           </div>
                                           <div class="comment-view">
                                               <p>
                                                   <i class="fas fa-eye"></i>
                                                   <?php echo $data['Post']['ViewCount']; ?>
                                               </p>
                                               <p>
                                                   <i class="fas fa-comments"></i>
                                                   <?php echo $data['CommentsCount']['Num']; ?>
                                               </p>
                                           </div>
                                       </div>
                                   </header>
                               </div>
                               <div class="single-post-content" id="content-div">
                                    <?php echo $data['Post']['PostContent']; ?>
                               </div>
                           </div>

                           <div class="content-card" id="div-comment">
                                <div class="item-navigation" style="border-bottom: 1px solid #dee2e6">
                                    <ul class="nav nav-tabs">
                                        <li>
                                            <a href="" aria-controls="product-comment" role="tab" data-toggle="tab" class="active">
                                                Comments <span>(<?php echo ($data['CommentsCount']['Num']); ?>)</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content" style="margin-top: 0;">
                                    <div class="tab-pane fade product-tab active show" id="comment-tab" style="padding: 30px 0;">
                                        <div class="theard">
                                            <div class="comment-form-area" id="new-comment-form">
                                                <div class="media comment-form">
                                                    <div class="media-left">
                                                        <a href=""><img class="media-object" src="<?php echo URLROOT; ?>resources/img/ava.png" alt="user avatar"></a>
                                                    </div>
                                                    <div class="media-body">
                                                      <form class="" action="" method="POST" id="comment_form">
                                                     <?php echo Form::token();?>
                                                        <div class="form-group">

                                                          <input type="hidden" class="form-control" name="comment_name" id="comment_name" value="<?php echo session()->get('username');?>">

                                                        </div>

                                                        <div class="form-group">

                                                         <textarea name="comment_content" rows="5" id="comment_content" class="form-control" placeholder="Enter comment"></textarea>

                                                        </div>

                                                        <div class="form-group">

                                                          <input type="hidden" name="comment_id" id="comment_id" value="0">

                                                          <input type="submit" name="submit" class="btn2 btn-info" id="submit" value="Submit">

                                                        </div>

                                                        <div class="form-group">

                                                          <input type="hidden" class="form-control" name="postID" id="" value="<?php echo $data['Post']['PostID'];?>">

                                                        </div>

                                                      </form>

                                                      <span id="comment_message"></span>

                                                      <br>

                                                      <div id="display_comment">



                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                           </div>
                        </div>
                <div class="col-lg-4">
                    <aside id="sidebar" class="sidebar">
                        <a href="<?php echo URLROOT; ?>forum/create_post" class="new_post" style="text-align: center;">
                            <span class="icon_edit"><i class="fas fa-edit"></i>New Post</span>
                        </a>
                        <div class="content-card">
                            <div class="card-title">
                                <h4>Search</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="get">
                                    <div class="search">
                                        <input type="text" name="search" placeholder="Search post here...">
                                        <button type="submit" class="search_btn">
                                            <span class="icon_search">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="forum-categories content-card">
                            <div class="card-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="collapsible-content">
                                <ul class="card-content">
                                    <li>
                                        <a href=""><span class="icon_chevron"><i class="fas fa-chevron-right"></i></span>HTML
                                        <span class="item-count">10</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=""><span class="icon_chevron"><i class="fas fa-chevron-right"></i></span>CSS
                                        <span class="item-count">10</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=""><span class="icon_chevron"><i class="fas fa-chevron-right"></i></span>PYTHON
                                        <span class="item-count">10</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=""><span class="icon_chevron"><i class="fas fa-chevron-right"></i></span>JAVASCRIPT
                                        <span class="item-count">10</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=""><span class="icon_chevron"><i class="fas fa-chevron-right"></i></span>C++
                                        <span class="item-count">10</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <?php
    include APPROOT . '/resources/views/inc/footer.blade.php';
    ?>
    <script>

      $(document).ready(function(){

        $('#comment_form').on('submit',function(event){

          event.preventDefault();

          var form_data = $(this).serialize();

          $.ajax({

            url:"<?php echo URLROOT . "forum/add_comment"; ?>",

            method:"POST",

            data:form_data,

            dataType:"JSON",

            success:function(data)

            {

              if(data.error != ''){

                $('#comment_form')[0].reset();

                $('#comment_message').html(data.error);

                $('#comment_id').val('0');

       load_comment();

              }

            }

          })

        });





      load_comment();



      function load_comment()

      {

        $.ajax({

          url:"<?php echo URLROOT . "forum/fetch_comment?postID=" . $data['Post']['PostID']; ?>",

          method:"GET",

          success:function(data)

          {

            $('#display_comment').html(data);

          }

        })

      }



      $(document).on('click','.reply',function(){

        var comment_id = $(this).attr("id");

        $('#comment_id').val(comment_id);

        $('#comment_content').focus();

      });





      });

    </script>
