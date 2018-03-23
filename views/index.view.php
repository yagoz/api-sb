<?php require ("partials/head.php"); ?>


<div class="container">
	<section class="hero is-primary">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        Scatchbling
	      </h1>
	      <h2 class="subtitle">
	        The bests back scratchers for your shop
	      </h2>
	    </div>
	  </div>
	</section>

	<div class="columns is-centered">
      <div class="column is-narrow">
		<section class="section" id="table">
		  <h1 class="title"> All Products </h1>
		  <hr>
		  <table class="table">
		    <thead>
		      <tr>
		        <th>
		          <abbr title="Name"> Name </abbr>
		        </th>
		        <th>
		          <abbr title="Description"> Description </abbr>
		        </th>
		        <th>
		          <abbr title="Size"> Size </abbr>
		        </th>
		        <th>
		          <abbr title="Price"> Price </abbr>
		        </th>
		      </tr>
		    </thead>
		    <tbody>

			<?php foreach ($products as $product) : ?>
			      <tr>
			        <td> <?= $product->name; ?> </td>
			        <td> <?= $product->description; ?> </td>
			        <td> <?= $product->size; ?> </td>
			        <td> $<?= $product->price; ?> </td>
			      </tr>
			<?php endforeach; ?>
			      
			    </tbody>
			  </table>
			</section>
		</div>
	</div>
</div>
<?php require ("partials/footer.php"); ?>