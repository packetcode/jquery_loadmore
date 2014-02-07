<html>
<head>
	<title>Jquery Loadmore</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<Style>
		body{
			background:#16a085;
		}
		.container{
			background:white;
			padding:30px;
			margin:40px auto;
			width:500px;
		}
	</style>
	<script src="http://code.jquery.com/jquery-git2.min.js" type="text/javascript" ></script>
	<script>
		$(function(){
				$('.loadmore').click(function(){
					var val = $('.final').attr('val');
					$.post('sql.php',{'from':val},function(data){
						if(!isFinite(data))
						{
							$('.final').remove();
							$(data).insertBefore('.loadmore');
						}
						else
						{
							$('<div class="well">No more feeds</div>').insertBefore('.loadmore');
							$('.loadmore').remove();
						}	
							
					});
				});
		});
	</script>
</head>
<?php
	require_once 'sql.php';
	
?>
<body>
<div class="container">
	<div class="well">
		<h1>JQuery Load more</h1>
		<p>This is a demostrative tutorial for jquery loadmore functionality</p>
	</div>
	<div>
		<?php echo $data; ?>
	</div>

	<button class="btn btnt-primary loadmore" >Loadmore</button>
</div>

</body>


</html>