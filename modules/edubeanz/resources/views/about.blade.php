@extends('edu::layouts.app')
@section('container')
<!-- About Us Text -->
<section class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<h3>The Company</h3>
				<br />
				<p>In entirely be to at settling felicity. Fruit two match men you seven share. Needed as or is enough points. Miles at smart ﻿no marry whole linen mr. Income joy nor can wisdom summer. Extremely depending he gentleman improving intention rapturous as.</p>
			</div>
			<div class="col-sm-5">
				<a href="#">
					<img src="{{asset('frontd')}}/images/about-img-1.png" class="img-rounded" />
				</a>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Skills</h3>
			<br />
		</div>
	</div>
</div>
<!-- Skills and Info Section -->
<section class="content-section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h5>Web</h5>
				<div class="progress progress-rounded">
					<div class="progress-bar progress-bar-danger" role="progressbar" style="width: 78%">
					</div>
				</div>
				<h5>Photography</h5>
				<div class="progress progress-rounded">
					<div class="progress-bar progress-bar-danger" role="progressbar" style="width: 52%">
					</div>
				</div>
				<h5>Branding</h5>
				<div class="progress progress-rounded">
					<div class="progress-bar progress-bar-danger" role="progressbar" style="width: 35%">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<h5>&nbsp;</h5>
				<p>
					In entirely be to at settling felicity.
					Fruit two match men you seven share.
					Needed as or is enough points.
					Miles at smart ﻿no marry whole linen mr.
					Income joy nor can wisdom summer. Extremely depending he gentleman improving intention rapturous as.
				</p>
			</div>
		</div>
	</div>
</section>
<!-- Members -->
<section class="content-section">
	<div class="container">
		<div class="row">
			@for($i = 1; $i <4; $i++)
			<div class="col-sm-4">
				<div class="staff-member">
					<a class="image" href="#">
						<img  src="https://scontent.fhan4-1.fna.fbcdn.net/v/t1.0-9/23435056_701634133375670_4915778252683018850_n.jpg?oh=f6415df77507a85736de83998bd2b840&oe=5B0EB2A3" class="img-circle img-responsive" />
					</a>
					<h4>
						<a href="#">Fight Light Diamond</a>
						<small>Founder + CEO</small>
					</h4>
					<p>Lập trình trình viên, giống không ...</p>
					<ul class="social-networks">
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
			@endfor
		</div>
	</div>
</section>	
	<!-- Footer Widgets -->
@include('edu::layouts.footer-widgets')
@endsection