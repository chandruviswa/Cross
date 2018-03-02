<?php

include('config.php');

?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Snack Bar a Restaurants Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- Meta tag keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Snack Bar Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta tag keywords -->
<!-- Style sheet -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/lsb.css">
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />


<!-- //Style sheet -->
<!-- //Online fonts -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<!-- //Online fonts -->

  <script type="text/javascript">
    
    $(document).ready(function () {
    $('#myCarousel').carousel({
        interval: 10000
    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':fifth');
        }
       // next.children(':first-child').clone().appendTo($(this));
	
       // if (next.next().length > 0) {
         //   next.next().children(':first-child').clone().appendTo($(this));
        //}
        //else {
         //   $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        //}
    });
});

  </script>
</head>
	
<body>
<!-- banner -->
	<div class="banner-figures">
		<div class="banner">
			<div class="container banner-drop">
				<div class="header">
					<div class="header-left">
					
					</div>
					<div class="header-right">
						<nav>
						  <ul>
							<li class="active">
								<a href="index.html" class="active"><span>Home</span></a>
							</li>
							<li>
								<a href="#about" class="scroll"><span>About</span></a>
							</li>
							<li>
								<a href="#chefs" class="scroll"><span>Chefs</span></a>
							</li>
							<li>
								<a href="#menu" class="scroll"><span>Menu</span></a>
							</li>
							<li>
								<a href="#contact" class="scroll"><span>Contact</span></a>
							</li>
						  </ul>
						</nav>
						<div class="menu-icon animated wow zoomIn" data-wow-duration="1000ms" data-wow-delay="800ms"><span></span></div>
						<!-- start search-->
				      <div class="search-box">
							<div id="sb-search" class="sb-search">
								<form action="#" method="post">
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>	
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="logo-w3ls">
					<h1><a href="index.html">Snack Bar</a></h1>
				</div>
				<div class="bnr-sub-text" >
					<p>Feel the taste of mexico</p>
				</div>
				<div class="book-form">
			<!--<p>Prearrange a Table.</p>
			   <form action="#" method="post">
					<div class="col-md-4 form-time-w3layouts">
							<label><i class="fa fa-clock-o" aria-hidden="true"></i></label>
							<input type="text" id="timepicker" name="Time" placeholder="Time" class="timepicker form-control hasWickedpicker" value="Time" onkeypress="return false;" required="" >
					</div>
					<div class="col-md-4 form-date-w3-agileits">
						        <label><i class="fa fa-calendar" aria-hidden="true"></i> </label>
									<input  id="datepicker1" name="Text" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="" >
								</div>
					<div class="col-md-4 form-left-agileits-w3layouts ">
							<label><i class="fa fa-users" aria-hidden="true"></i></label>
							<select class="form-control">
								<option>No.of People</option>
								<option>1 Person</option>
								<option>2 People</option>
								<option>3 People</option>
								<option>4 People</option>
								<option>5 People</option>
								<option>More</option>
							</select>
					</div>
					<div class="clearfix"> </div>
					<div class="col-md-3 form-left">
						  <ul>
							<li><i class="fa fa-check-square-o" aria-hidden="true"></i>Over 10,000 restaurants Worldwide</li>
							<li><i class="fa fa-check-square-o" aria-hidden="true"></i>No booking fees</li>
						  </ul>
					</div>
					<div class="col-md-3 form-left-agileits-submit">
						  <input type="submit" value="Book a table">
					</div>
					<div class="clearfix"> </div>
				</form>-->
			</div>

			</div>
		</div>
		
	</div>

<!-- //banner -->
<!-- banner-bottom -->
<div class="banner-bottom">
<div class="container">
	<div class="col-md-3 left-logo-main">
		<div class="left-logo-w3ls">
			<img src="images/side.png" alt="logo">
		</div>
	</div>
	<div class="col-md-3 bnr-btn-grids one">
		<i class="fa fa-comments-o" aria-hidden="true"></i>
		<p><span>Read</span> Reviews</p>
		<a href="#testimonials" class="scroll" ><i class="fa fa-level-down" aria-hidden="true"></i></a>
		<div class="clearfix"> </div>
	</div>
	<div class="col-md-6 bnr-btn-grids two">
		<i class="fa fa-phone" aria-hidden="true"></i>
		<p><span>Call us now for</span> Home delivery</p>
		<h2>1-002 003 004</h2>
		<div class="clearfix"> </div>
	</div>
</div>
</div>
<!-- //banner-bottom -->
<!-- about -->
<div class="about" id="about"> 
<div class="about-left-w3-agileits">
	<h6>Welcome to Snack Bar</h6>
	<h3>Perfect experience & high quality services</h3>
	<p class="para-w3-agile">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed sollicitudin ante. Nullam condimentum mollis odio, sed aliquet dolor consectetur vel. Proin faucibus pellentesque eros nec volutpat. Nulla facilisi. Nam eu dolor eget ligula molestie condimentum.</p>
</div>
<div class="col-md-7 about-right-w3-agileits">
<div  class="callbacks_container">
				<ul class="rslides" id="slider3">
					<li>
						<div class="banner-text1">
						</div>
					</li>
					<li>
						<div class="banner-text2">
						</div>
					</li>
					<li>
						<div class="banner-text3">
						</div>
					</li>
					<li>
						<div class="banner-text4">
						</div>
					</li>
				</ul>
			</div>
</div>
<div class="clearfix"> </div>
</div>
<!-- //about -->
<!-- team -->
	<div class="team" id="chefs">
		<div class="container">
			<h4 class="title-w3ls">Meet Our Chefs</h4>
			<div class="team-grids"> 
				<ul class="ch-grid">
					<li class="ch-grid-item">
						<div class="ch-item ch-img-1">
						</div>
						<div class="ch-info">
								<h3>Eva Adamson</h3>
								<p>Chef</p>
								<div class="social-icons animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="800ms">
										<ul class="top-links">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										</ul>
										<div class="clearfix"> </div>  
								</div>
						</div>
					</li>
					<li class="ch-grid-item">
						<div class="ch-item ch-img-2">
						</div>
							<div class="ch-info">
								<h3>Natalie Barnes</h3>
								<p>Saucier</p>
								<div class="social-icons animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="800ms">
										<ul class="top-links">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										</ul>
										<div class="clearfix"> </div>  
								</div>
							</div>
					</li>
					<li class="ch-grid-item">
						<div class="ch-item ch-img-3">
						</div>
							<div class="ch-info">
								<h3>David Austin</h3>
								<p>Chef</p>
								<div class="social-icons animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="800ms">
										<ul class="top-links">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										</ul>
										<div class="clearfix"> </div>  
								</div>
							</div>
					</li>
					<li class="ch-grid-item">
						<div class="ch-item ch-img-4">
						</div>
							<div class="ch-info">
								<h3>Thomas Bishop</h3>
								<p>Saucier</p>
								<div class="social-icons animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="800ms">
										<ul class="top-links">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										</ul>
										<div class="clearfix"> </div>  
								</div>
							</div>
					</li>
				</ul>
				<div class="clearfix"> </div>  
			</div>
			<div class="clearfix"> </div>  
		</div>
	</div>
	<!-- //team -->
<!-- Stats -->
	<div class="stats-agileits" id="stats">
	<div class="container">
		<h4 class="title-w3ls">Our Achievements</h4>
	</div>
		<div class="stats-info agileits w3layouts">
		<div class="container">
			<div class="col-md-3 agileits w3layouts col-sm-6 stats-grid stats-grid-1">
				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='2500' data-delay='3' data-increment="2">2500</div>
				<div class="stat-info-w3ls">
					<h4 class="agileits w3layouts">Visitors daily</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 agileits w3layouts stats-grid stats-grid-2">
				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='150' data-delay='3' data-increment="2">150</div>
				<div class="stat-info-w3ls">
					<h4 class="agileits w3layouts">Chefs and sous chefs</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 stats-grid agileits w3layouts stats-grid-3">
				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='3421' data-delay='3' data-increment="2">3421</div>
				<div class="stat-info-w3ls">
					<h4 class="agileits w3layouts">Orders served daily</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 stats-grid stats-grid-4 agileits w3layouts">
				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='210' data-delay='3' data-increment="2">210</div>
				<div class="stat-info-w3ls">
					<h4 class="agileits w3layouts">Total dishes</h4>
				</div>
			</div>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //Stats -->  
<!--dishes -->
		<div class="dishes" id="dishes">
		    <h4 class="title-w3ls">This Week's Dishes</h4>
			<div class="inst-grids">
					<div class="col-md-3 blog-gd-w3ls">
						<img src="images/blog3.jpg" alt="blog-image">
						<div class="date-w3">
							<h4>$ 18.50</h4>
						</div>
						<div class="blog-description-w3agile">
							<h5>Red-cake Dessert</h5>
						 </div>
					</div>
					<div class="col-md-3 blog-gd-w3ls">
						<img src="images/blog4.jpg" alt="blog-image">
						<div class="date-w3">
							<h4>$ 50.00</h4>
						</div>
						<div class="blog-description-w3agile">
							<h5>Grilled Spare-rib</h5>
						 </div>
					</div>
					<div class="col-md-3 blog-gd-w3ls last">
						<img src="images/blog2.jpg" alt="blog-image">
						<div class="date-w3">
							<h4>$ 10.65</h4>
						</div>
						<div class="blog-description-w3agile">
							<h5>Tofu Mushrooms-fry</h5>
						 </div>
					</div>
					<div class="col-md-3 blog-gd-w3ls last">
						<img src="images/blog1.jpg" alt="blog-image">
						<div class="date-w3">
							<h4>$ 10.45</h4>
						</div>
						<div class="blog-description-w3agile">
							<h5>Strawberry-dessert</h5>
						 </div>
					</div>

					<div class="clearfix"> </div>		
				</div>
	</div>
<!--//dishes -->

<!-- testimonials -->
	<div id="testimonials" class="testimonials">
		<div class="container">
		<h4 class="title-w3ls white-agileits">What Our Customers Says</h4>
			<div class="w3_agile_team_grids">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="agile_testimonials_grid">
									<div class="agileits_w3layouts_testimonials_grid">
										<img src="images/p1.jpg" alt=" " class="img-responsive" />
										<div class="wthree_test_social_pos">
											<ul class="w3_agileits_social_list1">
												<li><a href="#" class="w3_agile_facebook1"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#" class="agile_twitter2"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li><a href="#" class="w3_agile_dribble3"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
									<h3>Peter Parker <span>Customer</span></h3>
									<p>Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem, 
										ac scelerisque nisl nibh vel lacus. Proin eget gravida odio. Donec ullamcorper est 
										eu accumsan cursus.</p>
								</div>
							</li>
							<li>
								<div class="agile_testimonials_grid">
									<div class="agileits_w3layouts_testimonials_grid">
										<img src="images/p2.jpg" alt=" " class="img-responsive" />
										<div class="wthree_test_social_pos">
											<ul class="w3_agileits_social_list1">
												<li><a href="#" class="w3_agile_facebook1"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#" class="agile_twitter2"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li><a href="#" class="w3_agile_dribble3"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
									<h3>Johan Botha <span>Customer</span></h3>
									<p>Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem, 
										ac scelerisque nisl nibh vel lacus. Proin eget gravida odio. Donec ullamcorper est 
										eu accumsan cursus.</p>
								</div>
							</li>
							<li>
								<div class="agile_testimonials_grid">
									<div class="agileits_w3layouts_testimonials_grid">
										<img src="images/p3.jpg" alt=" " class="img-responsive" />
										<div class="wthree_test_social_pos">
											<ul class="w3_agileits_social_list1">
												<li><a href="#" class="w3_agile_facebook1"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#" class="agile_twitter2"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li><a href="#" class="w3_agile_dribble3"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
									<h3>Steven Wilson <span>Customer</span></h3>
									<p>Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem, 
										ac scelerisque nisl nibh vel lacus. Proin eget gravida odio. Donec ullamcorper est 
										eu accumsan cursus.</p>
								</div>
							</li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- testimonials -->
		
		
	
		
		<div >
		    <h4 class="title-w3ls">Featured Category</h4>
			<div class="inst-grids">
		

       
							
							<?php 
							 $result = mysqli_query($con, "SELECT *FROM  item_cat");
							 while ($row = mysqli_fetch_array($result)) {
								 
								 ?>
								 
								 <div class="item active">
                                    <div class="col-md-3 blog-gd-w3ls">
                                        <a href="#"><img src="images/<?php if(isset($row['image_path'])){echo $row['image_path'];}?>" class="img-responsive center-block"></a>
                                        <div class="text-center"><?php if(isset($row['item_cat'])){echo $row['item_cat'];}?></div>
                                    </div>
                                </div>
								 <?php
								 
								 
							 }
							 
							 
							?>
                            </div>
                           
                        </div>
                      
                 
     
			
		


<!-- gallery -->
	<div class="gallery-grids" id="menu">
		<div class="container">
		<h4 class="title-w3ls">Featured Menu</h4>
			<div class="show-reel">
				<div class="col-md-3 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/1.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/1.jpg" alt="" />
							<div class="agileits-caption">
								<p>Mexican Tacos <span>$30.00</span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/2.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/2.jpg" alt="" />
							<div class="agileits-caption">
								<p>Cheese Rissole <span>$40.00</span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/3.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/3.jpg" alt="" />
							<div class="agileits-caption">
								<p>Bacon-rolls <span>$35.00</span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/4.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/4.jpg" alt="" />
							<div class="agileits-caption">
								<p>Fruit Salad <span>$20.00</span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="show-reel">
				<div class="col-md-3 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/5.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/5.jpg" alt="" />
							<div class="agileits-caption">
								<p>Mousse Starter <span>$35.00</span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/6.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/6.jpg" alt="" />
							<div class="agileits-caption">
								<p>Barbecue Grill <span>$60.00</span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/7.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/7.jpg" alt="" />
							<div class="agileits-caption">
								<p>Egg Variety <span>$20.00</span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/8.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/8.jpg" alt="" />
							<div class="agileits-caption">
								<p>Grilled BBQ <span>$65.00</span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="show-reel">
				<div class="col-md-3 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/9.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/9.jpg" alt="" />
							<div class="agileits-caption">
								<p>Mexican Tacos <span>$45.00 <button class="btn btn-success">Add to cart</button> </span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 agile-gallery-grid">
					<div class="agile-gallery">
						<a href="images/4.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/4.jpg" alt="" />
							<div class="agileits-caption">
								<p>Fruit Salad <span>$20.00</span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 agile-gallery-grid l1">
					<div class="agile-gallery">
						<a href="images/1.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/1.jpg" alt="" />
							<div class="agileits-caption">
								<p>Mexican Tacos <span>$30.00</span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 agile-gallery-grid l2">
					<div class="agile-gallery">
						<a href="images/5.jpg" class="lsb-preview" data-lsb-group="header">
							<img src="images/5.jpg" alt="" />
							<div class="agileits-caption">
								<p>Mousse Starter <span>$35.00</span></p>
							</div>
						</a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //gallery -->
<!-- contact -->
<div class="contact" id="contact">
	<div class="container">
	<h4 class="title-w3ls white-agileits">Get in Touch</h4>
		<div class="col-md-6 contact-agileits-w3layouts">
		<h5 class="sub">Send us a message</h5>
		<form action="#" method="post">
				<input type="text" class="name" name="Your Name" placeholder="Name" required="" />
				<input type="email" class="email" name="Your Email" placeholder="Email" required="" />
				<input type="text" Name="Phone Number" placeholder="Number" required=""/>
				<textarea name="Message" placeholder="Message" required=""></textarea>
				<input type="submit" value="Submit">
			</form>
		</div>
		<div class="col-md-6 contact-agileits-left">
			<h5 class="sub">Looking for Address</h5>
			<p><span>Location</span>London Luton Airport, Airport Way, Luton, United Kingdom.</p>
			<p><span>Phone</span>+33 892 35 35 35</p>
			<p><span>Email</span><a href="mailto:example@mail.com">mail@example.com</a></p>
			<div class="social-icons animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="800ms">
					<ul class="top-links">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					</ul>
			</div>
		</div>
	</div>
</div>
<!-- //contact -->
	<div class="map-agileits-w3layouts">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2463.161495163648!2d-0.37393578421642976!3d51.8762645796975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487637d0e4f706d5%3A0x2e06e7f34ad91ad0!2sLondon+Luton+Airport+(LTN)!5e0!3m2!1sen!2sin!4v1496042920328"></iframe>
	</div>
	<div class="footer">
		<div class="container">
			<p>© 2017 Snack Bar. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	</div>
	
	
<!-- //footer -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
			<script>
				(function($){
				  $(".menu-icon").on("click", function(){
						$(this).toggleClass("open");
						$(".container").toggleClass("nav-open");
						$("nav ul li").toggleClass("animate");
				  });
				  
				})(jQuery);
			</script>
<!-- Calendar -->
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
		<script>
			$(function() {
			$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
			});
		</script>
<!-- //Calendar -->
<!-- time -->
<script type="text/javascript" src="js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>
<!-- //time -->
<!--search-scripts-->
	<script src="js/classie.js"></script>
	<script src="js/uisearch.js"></script>
	<script>
		new UISearch( document.getElementById( 'sb-search' ) );
	</script>
<!--//search-scripts-->	
<!-- OnScroll-Number-Increase-JavaScript -->
	<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //OnScroll-Number-Increase-JavaScript -->
<!-- responsiveslides -->
<script src="js/responsiveslides.min.js"></script>
			<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: true,
										nav: false,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
			</script>
<!-- //responsiveslides -->
<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
  </script>
<!-- //flexSlider -->
<!-- lightspeedBox -->
	<script src="js/lsb.js"></script>
			<script>
				$(window).load(function() {
				  $.fn.lightspeedBox();
				});

			</script>
<!-- //lightspeedBox -->
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smooth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>