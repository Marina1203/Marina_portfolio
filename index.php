<?php require 'back/connexion.php'; ?>

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
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		
		<!-- top-area Start -->
		<header class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav navbar-fixed dark no-background">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand" href="index.php"><?php echo $ligne_utilisateur['prenom']; ?></a>
			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li class=" smooth-menu active"></li>
			                    <li class=" smooth-menu"><a href="#education">Formations</a></li>
			                    <li class="smooth-menu"><a href="#skills">Compétences</a></li>
								<li class="smooth-menu"><a href="#languages">Langues</a></li>
			                    <li class="smooth-menu"><a href="#experience">Experiences</a></li>
			                    <li class="smooth-menu"><a href="#portfolio">Portfolio</a></li>
			                    <li class="smooth-menu"><a href="#loisirs">Loisirs</a></li>
			                    <li class="smooth-menu"><a href="#contact">Contact</a></li>
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->

		    <div class="clearfix"></div>

		</header><!-- /.top-area-->
		<!-- top-area End -->
	
		<!--welcome-hero start -->
		<section id="welcome-hero" class="welcome-hero">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="header-text">
							<h2>Bonjour<span>,</span> Je suis <br> <?php echo $ligne_utilisateur['prenom']; ?> <br>  <span>.</span>   </h2>
							<p>Vous êtes sur mon site Portfolio</p>
							<a href="assets/download/marina_vasylenko_cv.pdf" download>Télécharger CV</a>
						</div><!--/.header-text-->
					</div><!--/.col-->
				</div><!-- /.row-->
			</div><!-- /.container-->

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--about start -->
		<section id="about" class="about">
			<div class="section-heading text-center">
				<h2>à propos</h2>
			</div>
			<div class="container">
				<div class="about-content">
					<div class="row">
						<div class="col-sm-6">
							<div class="single-about-txt">
														<h3>Après avoir travaillée pendant 10 ans dans le domaine de l' <strong>Export</strong> en tant que <strong> responsable</strong> j'ai trouvé un
											intérêt important pour l'informatique. Je suis actuellement en <strong>formation</strong> de 10 mois <strong>Intégrateur-Dévéloppeur</strong> à WF3-LePoles où j'apprends à
											maîtriser les langages de <strong>programmation</strong> dans le but de devenir un <strong>développeur WEB</strong>.</h3>
											<p><strong>Passionné</strong> par l'informatique, en quête de nouvelles <strong>connaissances</strong>,je suis interessée par les nouvelles technologies, je suis <strong>autonome</strong>, <strong> responsable</strong> et <strong>détérminé</strong> dans mes projets, je pratique de la <strong> natation</strong>, du   <strong> ski</strong>, j'aime  <strong>voyager</strong> et j'ai le <strong>Permis B</strong>.
											</p>
								<div class="row">
									<div class="col-sm-5">
										<div class="single-about-add-info">
											<h3>Téléphone</h3>
											<p><?php echo $ligne_utilisateur['portable']; ?></p>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="single-about-add-info">
											<h3>Email</h3>
											<p><?php echo $ligne_utilisateur['email']; ?></p>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="single-about-add-info">
											<h3>site</h3>
											<br>
											<p><a href="http://mlouchnikova.ma6tvacoder.org/index.php"><?php echo $ligne_utilisateur['site']; ?></a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-offset-1 col-sm-4">
							<div class="single-about-img">
								<img src="assets/images/about/profil_marina.jpg" alt="profile_image">
								<div class="about-list-icon">
									<ul>
										<li>
											<a href="https://www.facebook.com/marina.louchnikova">
												<i  class="fa fa-facebook" aria-hidden="true"></i>
											</a>
										</li><!-- / li -->
										
										<li>
											<a href="https://github.com/Marina1203">
												<i class="fab fa-github-square" aria-hidden="true"></i>
											</a>
										</li><!-- / li -->
										<li>
											<a href="https://www.linkedin.com/in/marina-vasylenko-66b1b116a/">
												<i  class="fa fa-linkedin" aria-hidden="true"></i>
											</a>
										</li><!-- / li -->
										<li>
											<a href="https://www.instagram.com/louchnikova/?hl=fr">
												<i  class="fa fa-instagram" aria-hidden="true"></i>
											</a>
										</li><!-- / li -->
										
										
									</ul><!-- / ul -->
								</div><!-- /.about-list-icon -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</section><!--/.about-->
		<!--about end -->
		
		<!--education start -->
		<section id="education" class="education">
			<div class="section-heading text-center">
				<h2>formations</h2>
			</div>
			<div class="container">
				<div class="education-horizontal-timeline">
					<div class="row">
					<?php
 $contenu = '';



    $donnee = $pdoCV->query("SELECT * FROM t_formations ORDER BY id_formation DESC");
    while($formations = $donnee->fetch(PDO::FETCH_ASSOC)){

        $contenu.= ' <div class="col-sm-4">';
        $contenu.= ' <div class="single-horizontal-timeline">';
        $contenu.= ' <div class="experience-time">';
        $contenu .='<h2>' .$formations['dates_form'] . '</h2>';
        $contenu .='<h3>' .$formations['titre_form'] . '</h3>';
        $contenu .='</div>'; //experience time
        $contenu.= '  <div class="timeline-horizontal-border">';
        $contenu.= ' <i class="fa fa-circle" aria-hidden="true"></i>';
        $contenu.= ' <span class="single-timeline-horizontal"></span>';
        $contenu .='</div>'; //timeline horizontal border
        $contenu.= ' <div class="timeline">';
        $contenu.= ' <div class="timeline-content">';
        $contenu .='<h4 class="title">' .$formations['stitre_form'] . '</h4>';
        $contenu .='<h5>' .$formations['lieu'] . '</h5>';
        $contenu .='<p class"description">' .$formations['description'] . '</p>';
        $contenu .='</div>'; //timeline content
        $contenu .='</div>'; //timeline 
        $contenu .='</div>'; // single-horizontal timeline
        $contenu .='</div>'; //col-sm-4
    }
    echo $contenu;
    ?>

					</div>
				</div>
			</div>

		</section><!--/.education-->
		<!--education end -->

		<!--skills start -->
		
				
					
						
					
					
										
            <?php
$contenu = '';


$contenu.= '<section id="skills" class="skills">';
$contenu.= ' <div class="skill-content">';
$contenu.= ' <div class="section-heading text-center">';
$contenu.= '<h2>compétences</h2>';
?>


<?php
$donnee = $pdoCV->query("SELECT * FROM t_competences");

while($competence = $donnee->fetch(PDO::FETCH_ASSOC)){



$contenu.= ' </div>';//section-heading text-center
$contenu .=' <div class="container">';
$contenu.= ' <div class="row">';
$contenu.= ' <div class="col-md-6">';
$contenu.= ' <div class="single-skill-content">';
$contenu.= ' <div class="barWrapper">';
$contenu.= ' <span class="progressText">'.$competence['competence'] . '<span>';
$contenu .=' <div class="single-progress-txt">';
$contenu .=' <div class="progress ">';
$contenu .='<div class="progress-bar" role="progressbar" aria-valuenow="'.$competence['niveau'] .'" aria-valuemin="30" aria-valuemax="100" style="">'; 
$contenu .='</div>'; //progress-bar
$contenu .='</div>'; //progress
$contenu.= ' <h3>'.$competence['niveau'] . '%' .'</h3>';
$contenu .='</div>'; //progressText
$contenu .='</div>'; //barWrapper
$contenu .='</div>'; //single-skill-content
$contenu .='</div>'; //col-md-6
$contenu .='</div>'; //row
$contenu .='</div>'; //container
$contenu .='</div>'; //skill-content
$contenu .='</section>'; //skills

}
echo $contenu;
?>

	
	<!--languages start -->
		
				
					
						
					
					
										
	<?php
$contenu = '';


$contenu.= '<section id="languages" class="languages">';
$contenu.= ' <div class="skill-content">';
$contenu.= ' <div class="section-heading text-center">';
$contenu.= '<h2>langues</h2>';
?>


<?php
$donnee = $pdoCV->query("SELECT * FROM t_langues");

while($langue = $donnee->fetch(PDO::FETCH_ASSOC)){



$contenu.= ' </div>';//section-heading text-center
$contenu .=' <div class="container">';
$contenu.= ' <div class="row">';
$contenu.= ' <div class="col-md-6">';
$contenu.= ' <div class="single-skill-content">';
$contenu.= ' <div class="barWrapper">';
$contenu.= ' <span class="progressText">'.$langue['langue'] . '<span>';
$contenu .=' <div class="single-progress-txt">';
$contenu .=' <div class="progress ">';
$contenu .='<div class="progress-bar" role="progressbar" aria-valuenow="'.$langue['niveau'] .'" aria-valuemin="30" aria-valuemax="100" style="">'; 
$contenu .='</div>'; //progress-bar
$contenu .='</div>'; //progress
$contenu.= ' <h3>'.$langue['niveau'] . '%' .'</h3>';
$contenu .='</div>'; //progressText
$contenu .='</div>'; //barWrapper
$contenu .='</div>'; //single-skill-content
$contenu .='</div>'; //col-md-6
$contenu .='</div>'; //row
$contenu .='</div>'; //container
$contenu .='</div>'; //skill-content
$contenu .='</section>'; //languages

}
echo $contenu;
?>
 	<!--langue finish -->
	

			<!--experience start -->
			<?php $donnee = $pdoCV->query("SELECT * FROM t_experiences");?>
			<section id="experience" class="experience">
			<div class="section-heading text-center">
				<h2>experiences</h2>
			</div>
			<div class="container">
				<div class="experience-content">
						<div class="main-timeline">
							<ul>
								<li>
									<div class="single-timeline-box fix">
										<div class="row">
            <?php
$contenu = '';

while($experience = $donnee->fetch(PDO::FETCH_ASSOC)){

$contenu.= ' <div class="col-md-5">';
$contenu.= ' <div class="experience-time text-right">';
$contenu .='<h2>' .$experience['dates_exp'] . '</h2>';
$contenu .='<h3>' .$experience['titre_exp'] . '</h3>';
$contenu .='</div>'; //experience time
$contenu .='</div>'; //col
$contenu.= ' <div class="col-md-offset-1 col-md-5">';
$contenu.= ' <div class="timeline">';
$contenu.= ' <div class="timeline-content">';
$contenu .='<h4 class="title">'.'<span><i class="fa fa-circle" aria-hidden="true"></i></span>' .$experience['stitre_exp'] . '</h4>';
$contenu .='<h5>' .$experience['lieu'] . '</h5>';
$contenu .='<p class"description">' .$experience['description'] . '</p>';
$contenu .='</div>'; //timeline content
$contenu .='</div>'; //timeline 
$contenu .='</div>'; //col-md-5

}
echo $contenu;
?>

         	</div>
									</div><!--/.single-timeline-box-->
								</li>
							</ul>
						</div><!--.main-timeline-->
					</div><!--.experience-content-->
			</div> <!-- container -->
		</section><!--/.experience-->
		<!--experience end -->

		<!--portfolio start -->
		<section id="portfolio" class="portfolio">
			<div class="portfolio-details">
				<div class="section-heading text-center">
					<h2>portfolio</h2>
				</div>
				<div class="container">
					<div class="portfolio-content">
						<div class="isotope">
							<div class="row">
							<div class="col-sm-4">
												<div class="item">
													<img src="assets/images/portfolio/screen_licorne.jpg" alt="portfolio image"/>
													<div class="isotope-overlay">
														<a href="#">
															HTML5-CSS3
														</a>
													</div><!-- /.isotope-overlay -->
												</div><!-- /.item -->
											</div><!-- /.col -->
									<div class="col-sm-4">
											<div class="item">
												<img src="assets/images/portfolio/screen_chat_adopter.JPG"  alt="portfolio image"/>
												<div class="isotope-overlay">
													<a href="#">
														HTML5-CSS3-B0OTSTRAP
													</a>
												</div><!-- /.isotope-overlay -->
											</div><!-- /.item -->
										</div><!-- /.col -->
										<div class="col-sm-4">
											<div class="item">
												<img src="assets/images/portfolio/screen-jurassic.jpg"  alt="portfolio image"/>
												<div class="isotope-overlay">
													<a href="#">
														HTML5-CSS3-B0OTSTRAP
													</a>
												</div><!-- /.isotope-overlay -->
											</div><!-- /.item -->
										</div><!-- /.col -->
										</div><!-- /.row -->
									
											
							<div class="row">
	
									<div class="col-sm-6">
										<div class="item">
											<img src="assets/images/portfolio/screen-mixa-wp.jpg" alt="portfolio image"/>
											<div class="isotope-overlay">
												<a href="http://mlouchnikova.ma6tvacoder.org/dyakov/">
													WORDPRESS-GUTENBERG
												</a>
											</div><!-- /.isotope-overlay -->
										</div><!-- /.item -->
									</div><!-- /.col -->
									<div class="col-sm-6">
										<div class="item">
											<img src="assets/images/portfolio/mdyakov-divi-screen.JPG" alt="portfolio image"/>
											<div class="isotope-overlay">
												<a href="http://mlouchnikova.ma6tvacoder.org/mdyakov_divi/">
													WORDPRESS-DIVI
												</a>
											</div><!-- /.isotope-overlay -->
										</div><!-- /.item -->
									</div><!-- /.col -->
										</div> <!-- row -->
						</div><!--/.isotope-->
					</div><!--/.gallery-content-->
				</div><!--/.container-->
			</div><!--/.portfolio-details-->
		</section><!--/.portfolio-->
		<!--portfolio end -->

		<!--loisirs start -->
		<section id="loisirs" class="loisirs">
			<div class="section-heading text-center">
				<h2>loisirs</h2>
			</div>
			<div class="loisirs-area">
				<div class="container">
					<div class="owl-carousel owl-theme" id="client">
						<div class="item">
						<a href="#voyage">
								<img src="assets/images/loisirs/globe-terrestre2.png" alt="loisir-image" />
								</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#boulange">
								<img src="assets/images/loisirs/boulange.jpeg" alt="loisir-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#livres">
								<img src="assets/images/loisirs/livres.png" alt="loisir-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#opera">
								<img src="assets/images/loisirs/opera.jpg" alt="loisir-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#theatre">
								<img src="assets/images/loisirs/theatre.jpg" alt="loisir-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#camping">
								<img src="assets/images/loisirs/camping.jpg" alt="loisir-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#natation">
								<img src="assets/images/loisirs/natation.jpg" alt="loisir-image" />
							</a>
						</div><!--/.item-->
					</div><!--/.owl-carousel-->
				</div><!--/.container-->
			</div><!--/.loisirs-area-->

		</section><!--/.loisirs-->

		<!-- </section> -->
		<!--loisirs end -->
		<div class="container">
		
				<div class="row">
				<div class="col-sm-12 voyages">
				<img src="assets/images/portfolio/image2.jpg"class="image" alt="">
				<img src="assets/images/portfolio/image6.jpg" class="image"alt="">
				<img src="assets/images/portfolio/image.jpg"class="image" alt="">
				<img src="assets/images/portfolio/image19.jpg"class="image" alt="">
				<img src="assets/images/portfolio/image9.jpg" class="image"alt="">
				<img src="assets/images/portfolio/image10.jpg" class="image"alt="">
				</div> <!-- fin de col -->
				<div class="col-sm- voyages">
			</div> <!-- fin de col -->
				</div> <!-- fin de row -->
			<div class="row">
			<div class="col-sm-12 boulange">
			<img src="assets/images/portfolio/image_boulange4.jpg" class="image" alt="">
			<img src="assets/images/portfolio/image18.jpg" class="image" alt="">
			<img src="assets/images/portfolio/image_boulange1.jpg" class="image" alt="">
			<img src="assets/images/portfolio/image_boulange2.jpg" class="image" alt="">
			<img src="assets/images/portfolio/image8.jpg" class="image" alt="">
			<img src="assets/images/portfolio/imgstreliaiu.jpg" class="image" alt="">
			<img src="assets/images/portfolio/image5.jpg" class="image" alt="">
			</div> <!-- fin de col -->
			</div> <!-- fin de row -->
	
</div>

		<!--contact start -->
		<?php include 'formulaire.php' ?>
		<!--contact end -->

		<!--footer-copyright start-->
		<footer id="footer-copyright" class="footer-copyright">
			<div class="container">
				<div class="hm-footer-copyright text-center">
					<p>
						&copy; copyright <?php echo $ligne_utilisateur['prenom']; ?>. design and developed by <a href="https://www.themesine.com/">themesine</a>
					</p><!--/p-->
				</div><!--/.text-center-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" ></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-copyright-->
		<!--footer-copyright end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>
		
		<!-- jquery.sticky.js -->
		<script src="assets/js/jquery.sticky.js"></script>
		
		<!-- for progress bar start-->

		<!-- progressbar js -->
		
		<script src="assets/js/progressbar.js"></script>

		<!-- appear js -->
		<script src="assets/js/jquery.appear.js"></script>

		<!-- for progress bar end -->

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		
        
        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        
    </body>
	
</html>