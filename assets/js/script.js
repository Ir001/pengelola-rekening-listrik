$(document).ready(function(){
	$('#pencarian').keyup(function(){
		setTimeout(function(){
			data = $('#pencarian').val();
			window.location.replace('index.php?q='+data);
		},1000)
	});
	//
	$('#content').load('list_user.php');
		
});