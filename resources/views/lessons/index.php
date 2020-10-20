<?php
include APPROOT . '/views/inc/header.php';
 ?>
 <div class="container" id="intro">
   <div class="row justify-content-center" style="background-color: <?php echo $data['headcolor'] ?>;">
     <div class="col-md-4 text-center">
       <h1 style="color: white"><?php echo $data['Lesson']['LessonName'] ?></h1>
       <p><?php echo $data['Lesson']['LessonDescription'] ?></p>
       <a href="code.php"><button type="submit" name="button" class="btn btn-danger">Start Now</button></a>
     </div>
   </div>
 </div>
 <div class="container" id="content">
   <div class="row justify-content-center">
     <div class="col-md">
       <table class="table table-hover">
         <thead>
           <tr>
             <th scope="col">EXERCISES</th>
             <th scope="col">PROGRESS</th>
             <th scope="col">SCORE</th>
           </tr>
         </thead>
         <tbody>
           <?php foreach ($data['Exercise'] as $key): ?>
               <tr>
                 <th scope="row"><a href = "<?php echo URLROOT . "lessons/exercise/" . $data['Lesson']['LessonID'] . "/" . $key['ExerciseID'] ?>"><?php echo $key['ExerciseID']. "/&nbsp&nbsp&nbsp&nbsp" . $key['ExerciseName'] ?></a></th>
                 <td>
                   <div class="progress">
                     <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                   </div>
                 </td>
                 <td>
                   <span class="fa fa-star" id="star1" onclick="add(this,1)"></span>
                   <span class="fa fa-star" id="star2" onclick="add(this,2)"></span>
                   <span class="fa fa-star" id="star3" onclick="add(this,3)"></span>
                   <span class="fa fa-star" id="star4" onclick="add(this,4)"></span>
                   <span class="fa fa-star" id="star5" onclick="add(this,5)"></span>
                 </td>
               </tr>
           <?php endforeach; ?>
         </tbody>
       </table>
       <script>
         function add(ths, sno) {
           for (var i = 1; i <= 5; i++) {
             var cur = document.getElementById("star" + i);
             cur.className = "fa fa-star";
           }
           for (var i = 1; i <= sno; i++) {
             var cur = document.getElementById("star" + i);
             if (cur.className == "fa fa-star") {
               cur.className = "fa fa-star checked";
             }
           }
         }
       </script>
     </div>
   </div>
 </div>
<?php
include APPROOT . '/views/inc/footer.php';
?>
