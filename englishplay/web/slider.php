<div class="container">
	<div id="da-slider" class="da-slider">
		<div class="da-slide">
			<h2>
				Java
			</h2>
			<p>
				java bla bla bla
			</p>
			<div class="da-img">
				<img src="images/2.png" alt="image01">
			</div>
		</div>

		<div class="da-slide">
			<h2>
				CSS
			</h2>
			<p>
				css bla bla bla
			</p>
			<div class="da-img">
				<img src="images/3.png" alt="image01">
			</div>
		</div>

		<div class="da-slide">
			<h2>
				HTML5
			</h2>
			<p>
				html5 bla bla bla
			</p>
			<div class="da-img">
				<img src="images/1.png" alt="image01">
			</div>
		</div>

		<div class="da-slide">
			<h2>
				MYSQL
			</h2>
			<p>
				mysql bla bla bla
			</p>
			<div class="da-img">
				<img src="images/4.png" alt="image01">
			</div>
		</div>

		<nav class="da-arrows">
			<span class="da-arrows-prev"></span>
			<span class="da-arrows-next"></span>
		</nav>
	</div>
</div>
<script type="text/javascript" src="js/jquery.cslider.js"></script>
<script type="text/javascript">
	$(function () {
		$('#da-slider').cslider({
			autoplay : true,
			bgincrement : 450
		});
	});
</script>