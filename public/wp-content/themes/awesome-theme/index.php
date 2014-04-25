<? get_header(); ?>

<h2>Heading H2</h2>

<h3>Heading H3</h3>
<h4>Heading H4</h4>

<p>A paragraph with a <a href="#">Link</a> and some more text. A paragraph with a <a href="#">Link</a> and
	some more text. A paragraph with a <a href="#">Link</a> and some more text. A paragraph with a
	<a href="#">Link</a> and some more text. A paragraph with a <a href="#">Link</a> and some more text.
	A paragraph with a <a href="#">Link</a> and some more text. A paragraph with a <a href="#">Link</a> and
	some more text. A paragraph with a <a href="#">Link</a> and some more text.</p>

<ul>
	<li>List Item</li>
	<li>List Item</li>
	<li>
		<ul>
			<li>Nested List Item</li>
			<li>Nested List Item</li>
		</ul>
	</li>
</ul>

<h4>Grid Example</h4>

<p>Use the grid via .row and .col mixins or directly in the Markup as HTML classes.</p>

<div class="debug-grid">
	<div class="row">
		<div class="col-6">
			<div class="row">
				<div class="col-3"></div>
				<div class="col-3"></div>
				<div class="col-3"></div>
				<div class="col-3"></div>
			</div>
		</div>
		<div class="col-6">
			<div class="row">
				<div class="col-4"></div>
				<div class="col-4"></div>
				<div class="col-4"></div>
			</div>
		</div>
	</div>
</div>

<? get_sidebar(); ?>

<? get_footer(); ?>
