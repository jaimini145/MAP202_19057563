
<?php require_once 'app/views/templates/header.php' ?>

 <div class="container">
	 
     <div class="page-header" id="banner">
		 
         <div class="row">
             <div class="col-lg-12">
                 <h1>Programs</h1>
             </div>
			 
         </div>
		 
     </div>
	 <?php
		 if(count($data['$courseList'] ) > 0){
		foreach ($data['$courseList']  as $course) { 
	 ?> 
	<?php  
		$name = $course['Program'];
		 echo "<a href=/courses/display/",urlencode($course),">$name</a>";
		 echo $name;
	 ?>
 		<br>
 	 <?php } }?>
		 
		 
	<?php
		 if(count($data['programs'] ) > 0){
		foreach ($data['programs']  as $programbyDepartment) {
	 ?> 
	<?php  
		$pname = $programbyDepartment['courseName'];
		 echo "<a href=/courses/display/",urlencode($programbyDepartment),">$pname</a>";
		 echo $pname;
	 ?>
 		<br>
 	 <?php } }?>
		 
		 <br>
		 <a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a>
		</div>
</div>
		
	
 <?php require_once 'app/views/templates/footer.php' ?>
	 
