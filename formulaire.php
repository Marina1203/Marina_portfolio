<!doctype html>
<html class="no-js" lang="fr">
    <head>
	<?php
    $sql=$pdoCV->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
	$ligne_utilisateur = $sql->fetch();
	
    ?>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        
        <!-- title of site -->
        <title><?php echo $ligne_utilisateur['prenom']; ?> - Portfolio</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

		<!--flat icon css-->
		<link rel="stylesheet" href="assets/css/flaticon.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">

<section id="contact" class="contact">
	<div class="section-heading text-center">
		<h2>contactez moi</h2>
	</div>
	<div class="container">
		<div class="contact-content">
			<div class="row">
				<div class="col-md-offset-1 col-md-5 col-sm-6">
					<div class="single-contact-box">
						<div class="contact-form">
							<?php include 'form.php'; ?>
						</div><!--/.contact-form-->
					</div><!--/.single-contact-box-->
				</div><!--/.col-->
				
				<div class="col-md-offset-1 col-md-5 col-sm-6">
					<div class="single-contact-box">
						<div class="contact-adress">
							<div class="contact-add-head">
								<h3><?php echo $ligne_utilisateur['prenom'] .' ' .$ligne_utilisateur['nom'] ?></h3>
								<p>intégrateur-dévéloppeur</p>
							</div>
							<div class="contact-add-info">
								<div class="single-contact-add-info">
									<h3>téléphone</h3>
									<p><?php echo $ligne_utilisateur['portable']; ?></p>
								</div>
								<div class="single-contact-add-info">
									<h3>email</h3>
									<p><?php echo $ligne_utilisateur['email']; ?></p>
								</div>
								<div class="clic">
									<div class="single-contact-add-info">
										<h3>sites</h3>
										<p><a href="<?php echo $ligne_utilisateur['site']; ?>">http://mlouchnikova.ma6tvacoder.org</a></p>
										<p><a href="<?php echo $ligne_utilisateur['site2']; ?>">http://mlouchnikova.ma6tvacoder.org/mdyakov_divi</a></p>
									</div>
								</div>
							</div>
						</div><!--/.contact-adress-->
						<div class="hm-foot-icon">
							<ul>
								<li><a href="https://www.facebook.com/marina.louchnikova"><i class="fa fa-facebook"></i></a></li><!--/li-->
								<li><a href="https://www.linkedin.com/in/marina-vasylenko-66b1b116a/"><i class="fa fa-linkedin"></i></a></li><!--/li-->
								<li><a href="https://www.instagram.com/louchnikova/?hl=fr"><i class="fa fa-instagram"></i></a></li><!--/li-->
							</ul><!--/ul-->
						</div><!--/.hm-foot-icon-->
					</div><!--/.single-contact-box-->
				</div><!--/.col-->
			</div><!--/.row-->
		</div><!--/.contact-content-->
	</div><!--/.container-->

</section><!--/.contact-->