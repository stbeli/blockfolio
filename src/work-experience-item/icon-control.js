/**
 * Small icon picker shown next to a company's details: lets the editor pick a
 * logo image from the media library, or remove it again.
 */

import { __ } from '@wordpress/i18n';
import { MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';

export default function IconControl( { icon, iconId, onSelect, onRemove } ) {
	return (
		<div className="blockfolio-work-experience-item__icon-control">
			<MediaUploadCheck>
				<MediaUpload
					onSelect={ ( media ) => onSelect( media.url, media.id ) }
					allowedTypes={ [ 'image' ] }
					value={ iconId }
					render={ ( { open } ) =>
						icon ? (
							<button
								type="button"
								className="blockfolio-work-experience-item__icon-button"
								onClick={ open }
							>
								<img src={ icon } alt="" />
							</button>
						) : (
							<Button variant="secondary" onClick={ open }>
								{ __( 'Add Icon', 'blockfolio' ) }
							</Button>
						)
					}
				/>
			</MediaUploadCheck>
			{ icon && (
				<Button
					variant="link"
					isDestructive
					className="blockfolio-work-experience-item__icon-remove"
					onClick={ onRemove }
				>
					{ __( 'Remove', 'blockfolio' ) }
				</Button>
			) }
		</div>
	);
}
