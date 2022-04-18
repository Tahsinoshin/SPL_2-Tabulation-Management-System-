<footer class="footer">
			    <div class="container-fluid">
				   <div class="row">
				       <div class="col-md-6">
					       <nav class="d-flex">
						      <ul class="m-0 p-0">
							     <li><a href="#">Home</a></li>
								  <li><a href="#">About us</a></li>
							  <ul>
						   </nav>
					   </div>
					   
					   <div class="col-md-6">
					       <p class="copyright d-flex justify-content-end">
						      &copy 2022 &nbsp
						      <a href="#">Tabulation Management System</a>&nbsp website
						   </p>
					   </div>
				   </div>
				</div>
			 
			 </footer>
		</div>
</div>

     
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
        
		$(document).ready(function(){
		  $("#sidebar-collapse").on('click',function(){
		    $('#sidebar').toggleClass('active');
			$('#content').toggleClass('active');
		  });
		  
		   $(".more-button,.body-overlay").on('click',function(){
		     $('#sidebar,.body-overlay').toggleClass('show-nav');
		   });
		  
		});
		
</script>
  
  



  </body>
  
  </html>