jQuery(document).ready(function(){
	// This is a repair for BootStrap breaking the WordPress Screen Options
	jQuery("#contextual-help-link").click(function () {
		jQuery("#contextual-help-wrap").css("cssText", "display: block !important;");
	});
	jQuery("#show-settings-link").click(function () {
		jQuery("#screen-options-wrap").css("cssText", "display: block !important;");
	});
});