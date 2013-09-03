<form method="get" id="search_form" action="<?php echo home_url(); ?>/">
	<input type="text" class="search_input" value="..." name="s" id="s" onfocus="if (this.value == '...') {this.value = '';}" onblur="if (this.value == '') {this.value = '...';}" />
	<input type="hidden" id="searchsubmit" value="Search" />
</form>
