<?php
/**
 * Author: triopsi
 * Author URI: http://wiki.profoxi.de
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0
 *
 * Ice-Cold is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Ice-Cold is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with wpicecold. If not, see https://www.gnu.org/licenses/gpl-3.0.
 *
 * @package Ice-Cold
 *
 * @since 1.0.0
 *
 * @version 1.0.0
 */

?>

<?php

$i = 0;
$i = ( is_active_sidebar( 'footer-1' ) ? $i = $i + 1 : $i );
$i = ( is_active_sidebar( 'footer-2' ) ? $i = $i + 1 : $i );
$i = ( is_active_sidebar( 'footer-3' ) ? $i = $i + 1 : $i );
$i = ( is_active_sidebar( 'footer-4' ) ? $i = $i + 1 : $i );

if ( 0 === $i ) {
	$i = 12;
}
$count_md = round( 12 / $i );

if ( is_active_sidebar( 'footer-1' ) ||
	is_active_sidebar( 'footer-2' ) ||
	is_active_sidebar( 'footer-3' ) ||
	is_active_sidebar( 'footer-4' ) ) {
	?>
	<aside class="widget-area row" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'ice-cold' ); ?>">
		<?php
		if ( is_active_sidebar( 'footer-1' ) ) {
			?>
			<div class="col-md-<?php echo $count_md; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> footer-widget-1">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<?php
		}
		if ( is_active_sidebar( 'footer-2' ) ) {
			?>
			<div class="col-md-<?php echo $count_md; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> footer-widget-2">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
			<?php
		}
		if ( is_active_sidebar( 'footer-3' ) ) {
			?>
			<div class="col-md-<?php echo $count_md; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> footer-widget-3">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
			<?php
		}
		if ( is_active_sidebar( 'footer-4' ) ) {
			?>
			<div class="col-md-<?php echo $count_md; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> footer-widget-4">
				<?php dynamic_sidebar( 'footer-4' ); ?>
			</div>
			<?php
		}
		?>
	</aside><!-- /.widget-area -->
	<?php } else { ?>
		<aside class="widget-area-empty" role="complementary">
		</aside><!-- /.widget-area -->
	<?php } ?>
