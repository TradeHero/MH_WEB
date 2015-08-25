<?php
$download_link_ios = get_field('download_link_ios');
$download_link_andriod = get_field('download_link_andriod');
if( !empty( $download_link_ios ) ) {
?>
	<a class="button-capsule" href="<?php echo $download_link_ios; ?>">
		<span class="button-capsule-inner icon download-btn-ios"></span>
	</a>
<?php
}
if( !empty( $download_link_andriod ) ) {
?>
	<a class="button-capsule" href="<?php the_field('download_link_andriod'); ?>">
		<span class="button-capsule-inner icon download-btn-andriod"></span>
	</a>
<?php
}
?>