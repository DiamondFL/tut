<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Edubeanz" />
	<meta name="author" content="" />

	<link rel="icon" href="{{asset('frontd')}}/images/favicon.ico">

	<title>Neon | Portfolio</title>

	<link rel="stylesheet" href="{{asset('frontd')}}/css/bootstrap.css">
	<link rel="stylesheet" href="{{asset('frontd')}}/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="{{asset('frontd')}}/css/neon.css">

	<script src="{{asset('frontd')}}/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="{{asset('frontd')}}/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body>

<div class="wrap">
	
	<!-- Logo and Navigation -->
<div class="site-header-container container">

	<div class="row">
	
		<div class="col-md-12">
			
			<header class="site-header">
			
				<section class="site-logo">
				
					<a href="index.html">
						<img src="{{asset('frontd')}}/images/logo@2x.png" width="120" />
					</a>
					
				</section>
				
				<nav class="site-nav">
					
					<ul class="main-menu hidden-xs" id="main-menu">
						<li>
							<a href="index.html">
								<span>Home</span>
							</a>
						</li>
						<li>
							<a href="about.html">
								<span>Pages</span>
							</a>
							
							<ul>
								<li>
									<a href="about.html">
										<span>About Us</span>
									</a>
								</li>
								<li class="active">
									<a href="#">
										<span>Active Menu Item</span>
									</a>
								</li>
								<li>
									<a href="gallery.html">
										<span>Gallery</span>
									</a>
									
									<ul>
										<li>
											<a href="index.html?2">
												<span>Sub 1</span>
											</a>
										</li>
										<li>
											<a href="about.html">
												<span>Sub 2</span>
											</a>
											
											<ul>
												<li>
													<a href="contact.html">
														<span>Sub of sub 1</span>
													</a>
												</li>
												<li>
													<a href="portfolio.html">
														<span>Sub of sub 2</span>
													</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="#">
												<span>Sub 3</span>
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="blog-post.html">
										<span>Blog Post</span>
									</a>
								</li>
								<li>
									<a href="portfolio-single.html">
										<span>Portfolio Item</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="active">
							<a href="portfolio.html">
								<span>Portfolio</span>
							</a>
						</li>
						<li>
							<a href="blog.html">
								<span>Blog</span>
							</a>
						</li>
						<li>
							<a href="contact.html">
								<span>Contact</span>
							</a>
						</li>
						<li class="search">
							<a href="#">
								<i class="entypo-search"></i>
							</a>
							
							<form method="get" class="search-form" action="" enctype="application/x-www-form-urlencoded">
								<input type="text" class="form-control" name="q" placeholder="Type to search..." />
							</form>
						</li>
					</ul>
					
				
					<div class="visible-xs">
						
						<a href="#" class="menu-trigger">
							<i class="entypo-menu"></i>
						</a>
						
					</div>
				</nav>
				
			</header>
			
		</div>
		
	</div>
	
</div>	
	<!-- Breadcrumb -->
<section class="breadcrumb">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-sm-7">
				
				<h1>Portfolio</h1>
				
							<ol class="breadcrumb bc-3" >
						<li>
				<a href="index.html"><i class="fa-home"></i>Home</a>
			</li>
					<li>

							<a href="index.html">Frontend</a>
					</li>
				<li class="active">

							<strong>Portfolio</strong>
					</li>
					</ol>
							
			</div>
			
			<div class="col-sm-5">
				
				<!-- Category Filter -->
				<div class="btn-group alt-select-field" id="category-filter">
				
					<button type="button" class="btn btn-label" data-toggle="dropdown">Category</button>
					<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
					</button>
					
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="#" data-filter="design">Design &amp; Development</a>
						</li>
						<li>
							<a href="#" data-filter="campaign">Campaigns</a>
						</li>
						<li>
							<a href="#" data-filter="branding">Branding</a>
						</li>
						<li>
							<a href="#" data-filter="print">Print</a>
						</li>
					</ul>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</section>


<section class="portfolio-container">
	
	<div class="container">
		
		<div class="row" id="portfolio-items">
			
			<div class="item col-sm-4 col-xs-6 filter-design">
				
				<div class="portfolio-item">
					<a href="portfolio-single.html" class="image">
						<img src="{{asset('frontd')}}/images/portfolio-thumb-1.png" class="img-rounded" />
						<span class="hover-zoom"></span>
					</a>
					
					<h4>
						<a href="portfolio-single.html" class="like">
							<i class="entypo-heart"></i>
						</a>
						
						<a href="portfolio-single.html" class="name">Neon</a>
					</h4>
					
					<div class="categories">
						<a href="portfolio-single.html">Web Design / Development</a>
					</div>
				</div>
				
			</div>
			
			<div class="item col-sm-4 col-xs-6 filter-design">
				
				<div class="portfolio-item">
					<a href="portfolio-single.html" class="image">
						<img src="{{asset('frontd')}}/images/portfolio-thumb-1.png" class="img-rounded" />
						<span class="hover-zoom"></span>
					</a>
					
					<h4>
						<a href="portfolio-single.html" class="like liked">
							<i class="entypo-heart"></i>
						</a>
						
						<a href="portfolio-single.html" class="name">Motorola</a>
					</h4>
					
					<div class="categories">
						<a href="portfolio-single.html">Photography</a>
					</div>
				</div>
				
			</div>
			
			<div class="item col-sm-4 col-xs-6 filter-branding">
				
				<div class="portfolio-item">
					<a href="portfolio-single.html" class="image">
						<img src="{{asset('frontd')}}/images/portfolio-thumb-1.png" class="img-rounded" />
						<span class="hover-zoom"></span>
					</a>
					
					<h4>
						<a href="portfolio-single.html" class="like">
							<i class="entypo-heart"></i>
						</a>
						
						<a href="portfolio-single.html" class="name">Dribbble</a>
					</h4>
					
					<div class="categories">
						<a href="portfolio-single.html">UI Design</a>
					</div>
				</div>
				
			</div>
			
			<div class="item col-sm-4 col-xs-6 filter-branding">
				
				<div class="portfolio-item">
					<a href="portfolio-single.html" class="image">
						<img src="{{asset('frontd')}}/images/portfolio-thumb-1.png" class="img-rounded" />
						<span class="hover-zoom"></span>
					</a>
					
					<h4>
						<a href="portfolio-single.html" class="like liked">
							<i class="entypo-heart"></i>
						</a>
						
						<a href="portfolio-single.html" class="name">Package Design</a>
					</h4>
					
					<div class="categories">
						<a href="portfolio-single.html">Branding</a>
					</div>
				</div>
				
			</div>
			
			<div class="item col-sm-4 col-xs-6 filter-print">
				
				<div class="portfolio-item">
					<a href="portfolio-single.html" class="image">
						<img src="{{asset('frontd')}}/images/portfolio-thumb-1.png" class="img-rounded" />
						<span class="hover-zoom"></span>
					</a>
					
					<h4>
						<a href="portfolio-single.html" class="like">
							<i class="entypo-heart"></i>
						</a>
						
						<a href="portfolio-single.html" class="name">Google+</a>
					</h4>
					
					<div class="categories">
						<a href="portfolio-single.html">Printing</a>
					</div>
				</div>
				
			</div>
			
			<div class="item col-sm-4 col-xs-6 filter-campaign filter-design">
				
				<div class="portfolio-item">
					<a href="portfolio-single.html" class="image">
						<img src="{{asset('frontd')}}/images/portfolio-thumb-1.png" class="img-rounded" />
						<span class="hover-zoom"></span>
					</a>
					
					<h4>
						<a href="portfolio-single.html" class="like">
							<i class="entypo-heart"></i>
						</a>
						
						<a href="portfolio-single.html" class="name">Origami</a>
					</h4>
					
					<div class="categories">
						<a href="portfolio-single.html">Package Design</a>
					</div>
				</div>
				
			</div>
			
		</div>
		
		<div class="row">
		
			<div class="col-md-12">
			
				<div class="text-center">
				
					<ul class="pagination">
						<li class="active">
							<a href="#">1</a>
						</li>
						<li>
							<a href="#">2</a>
						</li>
						<li>
							<a href="#">3</a>
						</li>
						<li>
							<a href="#">4</a>
						</li>
						<li>
							<a href="#">5</a>
						</li>
						<li>
							<a href="#">Next</a>
						</li>
					</ul>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</section>


<script type="text/javascript">
jQuery(document).ready(function($)
{
	var $portfolio_items = $("#portfolio-items"),
		$category_filter = $("#category-filter");
	
	$portfolio_items.isotope({
		itemSelector: '.item',
		columnWidth: 1/4
	});
	
	$category_filter.on('change', function(ev, o)
	{
		var filter = o.el.data('filter');
		
		$portfolio_items.isotope({
			filter: o.isDefault ? '.item' : '.filter-' + filter
		});
	});
	
	$(window).on('neon.resize', function()
	{
		$portfolio_items.isotope('reLayout');
	});
	
	$portfolio_items.isotope('reLayout');
});
</script>	
	<!-- Footer Widgets -->
<section class="footer-widgets">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-sm-6">
				
				<a href="#">
					<img src="{{asset('frontd')}}/images/logo@2x.png" width="100" />
				</a>
				
				<p>
					Vivamus imperdiet felis consectetur onec eget orci adipiscing nunc. <br />
					Pellentesque fermentum, ante ac interdum ullamcorper.
				</p>
				
			</div>
			
			<div class="col-sm-3">
				
				<h5>Address</h5>
				
				<p>
					Loop, Inc. <br />
					795 Park Ave, Suite 120 <br />
					San Francisco, CA 94107
				</p>
				
			</div>
			
			<div class="col-sm-3">
				
				<h5>Contact</h5>
				
				<p>
					Phone: +1 (52) 2215-251 <br />
					Fax: +1 (22) 5138-219 <br />
					info@laborator.al
				</p>
				
			</div>
			
		</div>
		
	</div>
	
</section>

<!-- Site Footer -->
<footer class="site-footer">

	<div class="container">
	
		<div class="row">
			
			<div class="col-sm-6">
				Copyright &copy; Neon - All Rights Reserved. 
			</div>
			
			<div class="col-sm-6">
				
				<ul class="social-networks text-right">
					<li>
						<a href="#">
							<i class="entypo-instagram"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="entypo-twitter"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="entypo-facebook"></i>
						</a>
					</li>
				</ul>
				
			</div>
			
		</div>
		
	</div>
	
</footer>	
</div>


	<!-- Bottom scripts (common) -->
	<script src="{{asset('frontd')}}/js/gsap/TweenMax.min.js"></script>
	<script src="{{asset('frontd')}}/js/bootstrap.js"></script>
	<script src="{{asset('frontd')}}/js/joinable.js"></script>
	<script src="{{asset('frontd')}}/js/resizeable.js"></script>
	<script src="{{asset('frontd')}}/js/isotope/jquery.isotope.min.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="{{asset('frontd')}}/js/neon-custom.js"></script>

</body>
</html>