<?php
/**
 * Server-side render for the "Company" block: formats the period
 * (start/end date, or "Current" when still employed there) and outputs the
 * company's markup.
 *
 * @package Blockfolio
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$icon                 = isset( $attributes['icon'] ) ? $attributes['icon'] : '';
$company              = isset( $attributes['company'] ) ? $attributes['company'] : '';
$company_description  = isset( $attributes['companyDescription'] ) ? $attributes['companyDescription'] : '';
$company_url          = isset( $attributes['companyUrl'] ) ? $attributes['companyUrl'] : '';
$role                 = isset( $attributes['role'] ) ? $attributes['role'] : '';
$start_date           = isset( $attributes['startDate'] ) ? $attributes['startDate'] : '';
$end_date             = isset( $attributes['endDate'] ) ? $attributes['endDate'] : '';
$current              = ! empty( $attributes['current'] );
$description          = isset( $attributes['description'] ) ? $attributes['description'] : '';

$period = '';

if ( '' !== $start_date ) {
	$period = $start_date;

	if ( $current ) {
		$period .= ' – ' . esc_html__( 'Current', 'blockfolio' );
	} elseif ( '' !== $end_date ) {
		$period .= ' – ' . $end_date;
	}
}

$company_link_label = '';

if ( '' !== $company_url ) {
	$company_link_label = preg_replace( '#^https?://(www\.)?#i', '', untrailingslashit( $company_url ) );
}

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'blockfolio-work-experience-item' ) );
?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="blockfolio-work-experience-item__header">
		<?php if ( '' !== $icon ) : ?>
			<img class="blockfolio-work-experience-item__icon" src="<?php echo esc_url( $icon ); ?>" alt="" />
		<?php endif; ?>
		<div class="blockfolio-work-experience-item__header-fields">
			<?php if ( '' !== $role || '' !== $period ) : ?>
				<div class="blockfolio-work-experience-item__row">
					<?php if ( '' !== $role ) : ?>
						<h3 class="blockfolio-work-experience-item__role"><?php echo wp_kses_post( $role ); ?></h3>
					<?php endif; ?>
					<?php if ( '' !== $period ) : ?>
						<p class="blockfolio-work-experience-item__period"><?php echo esc_html( $period ); ?></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if ( '' !== $company || '' !== $company_description || '' !== $company_url ) : ?>
				<div class="blockfolio-work-experience-item__row">
					<p class="blockfolio-work-experience-item__company-group">
						<?php if ( '' !== $company ) : ?>
							<span class="blockfolio-work-experience-item__company"><?php echo wp_kses_post( $company ); ?></span>
						<?php endif; ?>
						<?php if ( '' !== $company_description ) : ?>
							<span class="blockfolio-work-experience-item__company-sep">•</span>
							<span class="blockfolio-work-experience-item__company-description"><?php echo wp_kses_post( $company_description ); ?></span>
						<?php endif; ?>
					</p>
					<?php if ( '' !== $company_url ) : ?>
						<a class="blockfolio-work-experience-item__company-link" href="<?php echo esc_url( $company_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $company_link_label ); ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php if ( '' !== $description ) : ?>
		<ul class="blockfolio-work-experience-item__description"><?php echo wp_kses_post( $description ); ?></ul>
	<?php endif; ?>
</div>
