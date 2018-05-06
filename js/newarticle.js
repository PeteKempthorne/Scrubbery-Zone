$(document).ready(function() {
	//on clicking the button submitnew
	$('#submitnew').on('click', function() 
	{	
		//variables from the form
		//title is equal to the named element title from the pages HTML
		var title = jQuery('#title').val();
		var image = jQuery('#image').val();
		var metaTags = jQuery('#metaTags').val();
		var metaDesc = jQuery('#metaDesc').val();
		var posttext = jQuery('#posttext').val();
			
			//sends all the variable to the php processing file
			$.post('articleprocess.php', {title: title, image: image, metaTags: metaTags, metaDesc: metaDesc, posttext: posttext}, 
			function(data) 
			{
				alert(title);
			});			
			
	});
});

