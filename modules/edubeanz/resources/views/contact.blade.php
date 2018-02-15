@extends('edu::layouts.app')
@section('container')<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29780.3666956835!2d106.06519927875179!3d21.090794051732704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31350a12166d86ed%3A0xa8096cdc78883ce3!2sT%C3%A2n+Chi%2C+Ti%C3%AAn+Du+District%2C+Bac+Ninh+Province!5e0!3m2!1sen!2s!4v1518686083399" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
{{--<section class="contact-map" id="map"></section>--}}
<section class="contact-container">
	<div class="container">
		<div class="row">
			<div class="col-sm-7 sep">
				<h4>Liên lạc với chúng tôi, hãy viết cho chúng tôi một tin nhắn!</h4>
				{{--<p>--}}
					{{--To shewing another demands to. Marianne property cheerful informed at striking at. <br />--}}
					{{--Clothes parlors however by cottage on.--}}
				{{--</p>--}}
				<form class="contact-form" role="form" method="post" action="" enctype="application/x-www-form-urlencoded">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Tên:" />
					</div>
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="E-mail:" />
					</div>
					<div class="form-group">
						<textarea class="form-control" name="message" placeholder="Tin nhắn:" rows="6"></textarea>
					</div>
					<div class="form-group text-right">
						<button class="btn btn-primary" name="send">Gửi</button>
					</div>
				</form>
			</div>
			<div class="col-sm-offset-1 col-sm-4">
				<div class="info-entry">
					<h4>Address</h4>
					<p>
						Bắc Ninh <br />
						Chi Đống - Tân Chi - Tiên Du<br />
						Công ty cổ phần Portalbeanzvn
						<br />
						<br />
						<strong>Giờ làm việc:</strong>
						<br />
						08:00 - 17:00 <br />
						Thứ 2 tới thứ 6
						<br />
						<br />
					</p>
				</div>
				<div class="info-entry">
					<h4>Liên hệ với chúng tôi</h4>
					<p>
						Phone: 0165 900 3851<br />
						i.am.m.cuong@gmail.com
					</p>
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
		</div>
	</div>
</section>
{{--<section class="footer-widgets">--}}
	{{--<div class="container">--}}
		{{--<div class="row">--}}
			{{--<div class="col-sm-6">--}}
				{{--<a href="#">--}}
					{{--<img src="{{asset('frontd')}}/images/logo@2x.png" width="100" />--}}
				{{--</a>--}}
				{{--<p>--}}
					{{--Vivamus imperdiet felis consectetur onec eget orci adipiscing nunc. <br />--}}
					{{--Pellentesque fermentum, ante ac interdum ullamcorper.--}}
				{{--</p>--}}
			{{--</div>--}}
			{{--<div class="col-sm-3">--}}
				{{--<h5>Address</h5>--}}
				{{--<p>--}}
					{{--Loop, Inc. <br />--}}
					{{--795 Park Ave, Suite 120 <br />--}}
					{{--San Francisco, CA 94107--}}
				{{--</p>--}}
			{{--</div>--}}
			{{--<div class="col-sm-3">--}}
				{{--<h5>Contact</h5>--}}
				{{--<p>--}}
					{{--Phone: +1 (52) 2215-251 <br />--}}
					{{--Fax: +1 (22) 5138-219 <br />--}}
					{{--info@laborator.al--}}
				{{--</p>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--</section>--}}
<!-- Site Footer -->
@endsection
	{{--<!-- Bottom scripts (common) -->--}}
	{{--<script src="{{asset('frontd')}}/js/gsap/TweenMax.min.js"></script>--}}
	{{--<script src="{{asset('frontd')}}/js/bootstrap.js"></script>--}}
	{{--<script src="{{asset('frontd')}}/js/joinable.js"></script>--}}
	{{--<script src="{{asset('frontd')}}/js/resizeable.js"></script>--}}
	{{--<!-- JavaScripts initializations and stuff -->--}}
	{{--<script src="{{asset('frontd')}}/js/neon-custom.js"></script>--}}
@push('head')
	<style>
		.contact-map {
			height: 0 !important;
			min-height: 0 !important;
		}
	</style>
@endpush
