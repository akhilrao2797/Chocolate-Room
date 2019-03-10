<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>	

<title>Chocolate Room</title>
</head>
<body>
<?php session_start(); include 'includes/header.php';
?>

<div class="mainbody">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>
<li data-target="#myCarousel" data-slide-to="3"></li>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner">
<div class="item active img-responsive">
<img src="/images/img8.jpg" style="height:500px; width:1600px;">
<div class="carousel-caption">
<h3>Milk Chocolate</h3>
<p>Taste the sweetness and enter the milk galaxy!!!</p>
</div>
</div>

<div class="item">
<img src="/images/img9.jpg" style="height:500px; width:1600px;">
<div class="carousel-caption">
<h3>Dark Chocolate</h3>
<p>Chocolaty molten lava dripping down ... </p>
</div>
</div>

<div class="item">
<img src="/images/img10.jpg" style="height:500px; width:1600px;" >
</div>
<div class="item">
<img src="/images/img11.jpg"style="height:500px; width:1600px;" >
</div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>

<?php include 'includes/footer.php'; ?>
	
</body>
</html>