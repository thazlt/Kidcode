<?php
include APPROOT . '/resources/views/inc/header.blade.php';
 ?>
 <div class="container" id="intro">
   <div class="row justify-content-center" style="background-color: <?php echo $data['headcolor'] ?>;">
     <div class="col-md-4 text-center">
       <h1 style="color: white"><?php echo $data['Lesson']['LessonName'] ?></h1>
       <p><?php echo $data['Lesson']['LessonDescription'] ?></p>
       <a href="<?php echo URLROOT . "lessons/exercise?lessonID=" . $data['Lesson']['LessonID'] . "&exerciseID=" . $data['Exercise'][0]['ExerciseID'] ?>"><button type="submit" name="button" class="btn btn-danger">Start Now</button></a>
     </div>
     <button class="fa fa-edit option-btn"></button>
   </div>
 </div>
 <div class="container" id="content">
   <div class="row justify-content-center">
     <div class="col-md">
       <table class="table table-hover">
         <thead>
           <tr>
             <th scope="col">EXERCISES</th>
             <th scope="col">SCORE</th>
             <?php if (session()->get('username') == $data['Lesson']['Teacher']):?>
             <th scope="col">Options</th>
             <?php endif?>
           </tr>
         </thead>
         <tbody>
           <?php foreach ($data['Exercise'] as $key): ?>
               <tr>
                 <th scope="row"><a href = "<?php echo URLROOT . "lessons/exercise?lessonID=" . $data['Lesson']['LessonID'] . "&exerciseID=" . $key['ExerciseID'] ?>"><?php echo $key['ExerciseID']. "/&nbsp&nbsp&nbsp&nbsp" . $key['ExerciseName'] ?></a></th>
                 <td>
                   <?php $errors=($key['Errors']!==null)?$key['Errors']:100; $score = (int)((100-$errors)/20);?>
                   <?php for ($i=1; $i<=5; $i++){
                     if ($i<=$score) {
                       echo "<span class='fa fa-star checked'></span>";
                     } else {
                       echo "<span class='fa fa-star'></span>";
                     }
                   }
                    ?>
                 </td>
                 <?php if (session()->get('username') == $data['Lesson']['Teacher']):?>
                 <td>
                 <button class="fa fa-edit option-btn"></button>
                 <button class="fa fa-trash option-btn"></button>
                 </td>
                 <?php endif?>
               </tr>
           <?php endforeach; ?>

         </tbody>
       </table>
     </div>
   </div>
 </div>
 <div class= "container" id= "comment">
   <h3>Comment:</h3>
   <form class="" action="" method="POST" id="comment_form">
  <?php echo Form::token();?>
     <div class="form-group">

       <input type="hidden" class="form-control" name="comment_name" id="comment_name" value="<?php echo session()->get('username');  ?>">

     </div>

     <div class="form-group">

      <textarea name="comment_content" rows="5" id="comment_content" class="form-control" placeholder="Enter comment"></textarea>

     </div>

     <div class="form-group">

       <input type="hidden" name="comment_id" id="comment_id" value="0">

       <input type="submit" name="submit" class="btn2 btn-info" id="submit" value="Submit">

     </div>

     <div class="form-group">

       <input type="hidden" class="form-control" name="lessonID" id="" value="<?php echo $data['Lesson']['LessonID'];?>">

     </div>

   </form>

   <span id="comment_message"></span>

   <br>

   <div id="display_comment">



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

        url:"<?php echo URLROOT . "lesson/add_comment"; ?>",

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

      url:"<?php echo URLROOT . "lesson/fetch_comment?lessonID=" . $data['Lesson']['LessonID']; ?>",

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
