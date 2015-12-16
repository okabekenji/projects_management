

<div class="clear"></div>

<div id="footer" >
	<p id="copyright"><?php echo $this->config->item('COPYRIGHT'); ?></p>
</div><!-- /#footer -->

<?php if ($is_smart_phone ) { ?>
	<script type="text/javascript" src="/assets/js/sp-slidemenu.js?<?php echo echo_filedate('/assets/js/api.js'); ?>"></script>
<?php }else{ ?>
	<script type="text/javascript" src="/assets/js/sp-slidemenu.js?<?php echo echo_filedate('/assets/js/api.js'); ?>"></script>
<?php } ?>
<script>
var menu = SpSlidemenu({
	main : '#main',
	button: '.menu-button-left',
	slidemenu : '.slidemenu-left',
	direction: 'left'
});


</script>

</div><!-- /#main -->

<script>
(function() {


	$("a[id^=octicon]").click(function(){
		$(".flash").fadeOut(500);
	});



})();

var escapeHTML = function(val) {
	return $('<div />').text(val).html();
};

</script>
