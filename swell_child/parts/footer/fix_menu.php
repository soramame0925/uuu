<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$SETTING = SWELL_Theme::get_setting();
?>
<div id="fix_bottom_menu">
	<ul class="menu_list">
		<?php if ( $SETTING['show_fbm_menu'] ) : ?>
			<li class="menu-item menu_btn" data-onclick="toggleMenu">
				<i class="icon-menu-thin open_btn"></i>
				<span><?=esc_html( $SETTING['fbm_menu_label'] )?></span>
			</li>
		<?php endif; ?>

		<?php
			wp_nav_menu([
				'container'       => '',
				'fallback_cb'     => '',
				'theme_location'  => 'fix_bottom_menu',
				'items_wrap'      => '%3$s',
				'link_before'     => '',
				'link_after'      => '',
			]);
		?>

		<li class="menu-item">
			<a href="#" id="mno-filter-btn">
				<span>フィルター</span>
			</a>
		</li>

		<li class="menu-item">
			<a href="/library">
				<span>ライブラリ</span>
			</a>
		</li>

		<?php if ( $SETTING['show_fbm_pagetop'] ) : ?>
			<li class="menu-item pagetop_btn" data-onclick="pageTop">
				<i class="icon-chevron-up"></i>
				<span><?=esc_html( $SETTING['fbm_pagetop_label'] )?></span>
			</li>
		<?php endif; ?>
	</ul>
</div>