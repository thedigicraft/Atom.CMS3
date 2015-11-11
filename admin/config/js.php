<?php
// Javascript:





?>

<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- jQuery UI -->
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

<!-- Summernote -->
<script src="js/summernote.min.js"></script>

<!-- Dropzone.js -->
<script src="js/dropzone.js"></script>

<!-- Atom.SaveOnBlur.js -->
<script src="js/jquery.atom.SaveOnBlur.js"></script>

<script>
	
	$(document).ready(function() {
		
		$('.editor').summernote();
		
		$("#console-debug").hide();
		
		$("#btn-debug").click(function(){
			
			$("#console-debug").toggle();
			
		});
		
		
		$(".btn-delete").on("click", function() {
			
			var selected = $(this).attr("id");
			var pageid = selected.split("del_").join("");
			
			var confirmed = confirm("Are you sure you want to delete this page?");
			
			if(confirmed == true) {
				
				$.get("ajax/pages.php?id="+pageid);
				
				$("#page_"+pageid).remove();				
				
			}
			

			
			//alert(selected);
			
		})
		
		
		$("#sort-nav").sortable({
			cursor: "move",
			update: function() {
				var order = $(this).sortable("serialize");
				$.get("ajax/list-sort.php", order);
			}
		});


		$('.nav-form').submit(function(event){
			
			var navData = $(this).serializeArray();
			var navLabel = $('input[name=label]').val();
			var navID = $('input[name=id]').val();
		
			
			$.ajax({
				
				url: "ajax/navigation.php",
				type: "POST",
				data: navData
				
			}).done(function(){
				
				$("#label_"+navID).html(navLabel);
				
			});
			
			
			event.preventDefault();
			
		});
		
		
	}); // END document.ready();


	
</script>