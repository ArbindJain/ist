@extends('masterhome')

@section('title', 'Home')

@section('content')
		{{HTML::style('css/default.css')}}
		{{HTML::style('css/component.css')}}
		{{HTML::script('js/modernizr.custom.js')}}
<div class="container">	
			<div class="main">
				<ul id="og-grid" class="og-grid">
					<li>
						<a href="#" data-largesrc="/homeimage/1.jpg" data-title="Arbind Jain" data-description="Cake danish oat cake tart marshmallow gummi bears. Ice cream toffee tart oat cake brownie gummies brownie. Gummies candy canes cupcake gingerbread. Marzipan icing brownie bear claw sugar plum marshmallow. Topping tart icing. Liquorice candy liquorice dragée tiramisu. Croissant gummies jelly tiramisu marshmallow cupcake donut powder.">
							<img src="/homeimage/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="#" data-largesrc="/homeimage/2.jpg" data-title="Akshay Mahadev" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="/homeimage/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="#" data-largesrc="/homeimage/3.jpg" data-title="John Hopkins" data-description="Gummi bears lemon drops oat cake. Tart halvah cheesecake. Bear claw marshmallow cake tiramisu caramels tiramisu sugar plum. Cake tiramisu apple pie macaroon tiramisu oat cake macaroon candy.">
							<img src="/homeimage/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="#" data-largesrc="/homeimage/4.jpg" data-title="John Hopkins" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="/homeimage/thumbs/4.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="#" data-largesrc="/homeimage/3.jpg" data-title="Arbind Jain" data-description="Cake danish oat cake tart marshmallow gummi bears. Ice cream toffee tart oat cake brownie gummies brownie. Gummies candy canes cupcake gingerbread. Marzipan icing brownie bear claw sugar plum marshmallow. Topping tart icing. Liquorice candy liquorice dragée tiramisu. Croissant gummies jelly tiramisu marshmallow cupcake donut powder.">
							<img src="/homeimage/thumbs/3.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="#" data-largesrc="/homeimage/2.jpg" data-title="Akshay Mahadev" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="/homeimage/thumbs/1.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="#" data-largesrc="/homeimage/4.jpg" data-title="John Hopkins" data-description="Gummi bears lemon drops oat cake. Tart halvah cheesecake. Bear claw marshmallow cake tiramisu caramels tiramisu sugar plum. Cake tiramisu apple pie macaroon tiramisu oat cake macaroon candy.">
							<img src="/homeimage/thumbs/4.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="#" data-largesrc="/homeimage/1.jpg" data-title="John Hopkins" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="/homeimage/thumbs/2.jpg" alt="img03"/>
						</a>
					</li>
				</ul>
			</div>
		</div><!-- /container -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		{{HTML::script('js/grid.js')}}
		<script>
			$(function() {
				Grid.init();
			});
		</script>

@stop