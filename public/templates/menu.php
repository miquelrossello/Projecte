<header class="container-fluid">
    <div class="row bg-secondary pt-1">
    	<div class="col">
        		<div class="dropdown show">
  				<a class="btn text-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    			<i class="fas fa-user"></i>
  				</a>

  				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  				<?php
  				if (!(isset($_SESSION["AUTH"]))){
  				  echo "<a class='dropdown-item' href='login.php'><i class='fas fa-sign-in-alt' aria-hidden='true'></i>".$lang[$idioma]["login"]."</a>";
  				} else {
  				  echo "<a class='dropdown-item' href='tancarsessio.php'><i class='fas fa-sign-out-alt' aria-hidden='true'></i>".$lang[$idioma]["logout"]."</a>";
    			  echo "<a class='dropdown-item' href='#'><i class='fas fa-map-marked-alt'></i>".$lang[$idioma]["yourRutes"]."</a>";
  				}
  				?>
  				</div>
</div>
    	</div>
        <div class="col d-flex justify-content-end">
            <i class="fas fa-language float-left text-light h2 mr-3"></i>
            <form action="sesioIdioma.php" method="post">
                <div class="form-group">
                    <select class="form-control float-right custom-select-sm" id="language" onChange="canviaIdioma()">
                        <?php
                          foreach ($lang as $i) {
                              $selected = ($idioma==$i["langCode"])?('selected'):('');
                              echo "<option value='".$i["langCode"]."'".$selected.">".$i["lang"]."</option>";
                        }
    
                        ?>
                	</select>
                </div>
            </form>
        </div>
    </div>
</header>
<script type="text/javascript">
$('document').ready(function(){
var loc = window.location.pathname;
var doc = loc.split(/(\\|\/)/g).pop();
switch (doc) {
case "login.php":
	$("li#Login").attr("class","active");
	break;
case "registre.php":
	$("li#Register").attr("class","active");
	break;
case "index.php":
	$("li#Home").attr("class","active");
	  break;
}
});
</script>
    <nav class="navbar  navbar-light navbar-expand-md bg-light p-2 shadow-sm">
    	<a class="navbar-brand mr-5">
            <img src="../img/logo.png" class="rounded mr-2 float-left" alt="" height="50px">
        	<h1 class="text-secondary">GOATrails</h1>
        </a>
      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      		<span class="navbar-toggler-icon"></span>
      	</button>
      	<div class="h5 collapse navbar-collapse ml-4 mt-2" id="navbarNavDropdown">
        	<ul class="navbar-nav">
          		<li id="Home" class="nav-item mx-1">
            		<a class="nav-link" href="index.php"><?php echo $lang[$idioma]["home"] ?></a>
          		</li>
          		<li id="Login" class="nav-item mx-1">
            		<a class="nav-link" href="login.php"><?php echo $lang[$idioma]["login"] ?></a>
          		</li>
          		<li id="Register" class="nav-item mx-1">
           			<a class="nav-link" href="registre.php"><?php echo $lang[$idioma]["register"] ?></a>
          		</li>
        	</ul>
      </div>
    </nav>