<nav class="navbar navbar-default">
	<div class="navbar-header">
        <a class="navbar-brand" href="#">Chocolate Room</a>
        </div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="home.php">Home</a></li>
				<li><a href="chocolates.php">Chocolates</a></li>
				<?php if(isset($_SESSION['username'])){?>
					<li><a href="logout.php">Log Out</a></li>
				<?php	}
				else{
				?><li><a href="login.php">Log In</a></li>				
				<?php }?>
			</ul>
		</div>
	</div>
</nav>