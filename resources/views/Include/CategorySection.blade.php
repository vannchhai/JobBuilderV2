<!-- Category Section Start -->


<section class="category section">
	<div class="container">
		<h2 class="section-title">Browse Categories</h2>
		<div class="row">
			<div class="col-md-12">
				<?php $i = 0 ?>
				@foreach($lstCategory as $item)
				<div class="col-md-3 col-sm-3 col-xs-12 f-category">
					<a href="{{ url('AdvanceSearch').'?keyword=&cities=all&categories='.$item->id }}">
						<div class="icon">
						<i class="{{ $item->picture }}"></i>
						</div>
						<h3>{{ $item->name }}</h3>
					<p>{{ $item->countJob }} jobs</p>
					</a>
				</div>
				<?php 
				$i++;
				if ($i == 8) {
					break;
				}
				?>
				@endforeach
			</div>
		</div>
	</div>
</section>



    <!-- Category Section End -->  