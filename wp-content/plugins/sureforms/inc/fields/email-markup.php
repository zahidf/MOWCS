<?php
/**
 * Sureforms Email Markup Class file.
 *
 * @package sureforms.
 * @since 0.0.1
 */

namespace SRFM\Inc\Fields;

use SRFM\Inc\Helper;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * SureForms Email Markup Class.
 *
 * @since 0.0.1
 */
class Email_Markup extends Base {
	/**
	 * Flag indicating whether email confirmation is required.
	 *
	 * @var bool
	 * @since 0.0.2
	 */
	protected $is_confirm_email;

	/**
	 * Fallback label for the confirmation input field.
	 *
	 * @var string
	 * @since 0.0.2
	 */
	protected $input_confirm_label_fallback;

	/**
	 * Encrypted label for the confirmation input field.
	 *
	 * @var string
	 * @since 0.0.2
	 */
	protected $input_confirm_label;

	/**
	 * Unique slug for the confirmation input field, combining the form slug, block ID, and encrypted label.
	 *
	 * @var string
	 * @since 0.0.2
	 */
	protected $unique_confirm_slug;

	/**
	 * Retains a copy of Confirmation Email input label.
	 *
	 * @var string
	 * @since 0.0.7
	 */
	protected $confirm_label;

	/**
	 * Read-only attribute for the email field.
	 *
	 * @var bool
	 * @since 1.7.2
	 */
	protected $read_only;

	/**
	 * Initialize the properties based on block attributes.
	 *
	 * @param array<mixed> $attributes Block attributes.
	 * @since 0.0.2
	 */
	public function __construct( $attributes ) {
		$this->set_properties( $attributes );
		$this->set_input_label( __( 'Email', 'sureforms' ) );
		$this->set_error_msg( $attributes, 'srfm_email_block_required_text' );
		$this->set_duplicate_msg( $attributes, 'srfm_email_block_unique_text' );
		$this->slug                         = 'email';
		$this->is_confirm_email             = $attributes['isConfirmEmail'] ?? false;
		$this->input_confirm_label_fallback = __( 'Confirm ', 'sureforms' ) . $this->input_label_fallback;
		$this->input_confirm_label          = '-lbl-' . Helper::encrypt( $this->input_confirm_label_fallback );
		$this->unique_confirm_slug          = 'srfm-' . $this->slug . '-confirm-' . $this->block_id . $this->input_confirm_label;
		$this->read_only                    = ! empty( trim( $this->default ) ) && $attributes['readOnly'];
		$this->set_unique_slug();
		$this->set_field_name( $this->unique_slug );
		$this->set_markup_properties( $this->input_label, true );
		$this->set_aria_described_by();
		// Translators: %s is label of block.
		$this->confirm_label = ! empty( $attributes['confirmLabel'] ) ? sanitize_text_field( $attributes['confirmLabel'] ) : sprintf( __( 'Confirm %s', 'sureforms' ), $this->label );
		$this->set_label_as_placeholder( $this->input_label );
	}

	/**
	 * Render the sureforms email classic styling
	 *
	 * @since 0.0.2
	 * @return string|bool
	 */
	public function markup() {
		ob_start(); ?>
			<div data-block-id="<?php echo esc_attr( $this->block_id ); ?>" class="srfm-block-single srfm-block srfm-<?php echo esc_attr( $this->slug ); ?>-block-wrap<?php echo esc_attr( $this->block_width ); ?><?php echo esc_attr( $this->class_name ); ?> <?php echo esc_attr( $this->conditional_class ); ?><?php echo esc_attr( $this->read_only ? ' srfm-read-only' : '' ); ?>">
				<div class="srfm-<?php echo esc_attr( $this->slug ); ?>-block srf-<?php echo esc_attr( $this->slug ); ?>-<?php echo esc_attr( $this->block_id ); ?>-block">
					<?php echo wp_kses_post( $this->label_markup ); ?>
					<?php echo wp_kses_post( $this->help_markup ); ?>
					<div class="srfm-block-wrap">
						<input class="srfm-input-common srfm-input-<?php echo esc_attr( $this->slug ); ?>" type="email" name="<?php echo esc_attr( $this->field_name ); ?>" id="<?php echo esc_attr( $this->unique_slug ); ?>"
						<?php echo ! empty( $this->aria_described_by ) ? "aria-describedby='" . esc_attr( trim( $this->aria_described_by ) ) . "'" : ''; ?>
						data-required="<?php echo esc_attr( strval( $this->data_require_attr ) ); ?>" data-unique="<?php echo esc_attr( $this->aria_unique ); ?>" value="<?php echo esc_attr( $this->default ); ?>" <?php echo wp_kses_post( $this->placeholder_attr ); ?> <?php echo $this->read_only ? 'readonly' : ''; ?> />
					</div>
					<div class="srfm-error-wrap">
						<?php echo wp_kses_post( $this->duplicate_msg_markup ); ?>
					</div>
				</div>
				<?php
				if ( true === $this->is_confirm_email ) {
					$confirm_label_markup   = Helper::generate_common_form_markup( $this->form_id, 'label', $this->confirm_label, $this->slug . '-confirm', $this->block_id . $this->input_confirm_label, boolval( $this->required ) );
					$placeholder            = Helper::generate_common_form_markup( $this->form_id, 'placeholder', $this->confirm_label, $this->slug, $this->block_id . $this->block_id . $this->input_confirm_label, boolval( $this->required ) );
					$this->placeholder_attr = '';
					if ( ! empty( $placeholder ) ) {
						$confirm_label_markup   = '';
						$this->placeholder_attr = ' placeholder="' . $placeholder . '" ';
					}

					?>
					<div class="srfm-<?php echo esc_attr( $this->slug ); ?>-confirm-block srf-<?php echo esc_attr( $this->slug ); ?>-<?php echo esc_attr( $this->block_id ); ?>-confirm-block">
					<?php echo wp_kses_post( $confirm_label_markup ); ?>
						<div class="srfm-block-wrap">
							<input class="srfm-input-common srfm-input-<?php echo esc_attr( $this->slug ); ?>-confirm" type="email" id="<?php echo esc_attr( $this->unique_confirm_slug ); ?>"
						<?php echo ! empty( $this->aria_described_by ) ? "aria-describedby='" . esc_attr( trim( $this->aria_described_by ) ) . "'" : ''; ?>
							data-required="<?php echo esc_attr( $this->data_require_attr ); ?>" value="<?php echo esc_attr( $this->default ); ?>" <?php echo wp_kses_post( $this->placeholder_attr ); ?> <?php echo $this->read_only ? 'readonly' : ''; ?> />
						</div>
						<div class="srfm-error-wrap">
						<?php echo wp_kses_post( $this->error_msg_markup ); ?>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php
		$markup = ob_get_clean();

		return apply_filters(
			'srfm_block_field_markup',
			$markup,
			[
				'slug'       => $this->slug,
				'is_editing' => $this->is_editing,
				'field_name' => $this->field_name,
				'attributes' => $this->attributes,
			]
		);
	}

}
