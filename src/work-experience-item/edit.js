import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { CheckboxControl } from '@wordpress/components';

import IconControl from './icon-control';

export default function Edit( { attributes, setAttributes } ) {
	const {
		icon,
		iconId,
		company,
		companyDescription,
		companyUrl,
		role,
		startDate,
		endDate,
		current,
		description,
	} = attributes;
	const blockProps = useBlockProps( {
		className: 'blockfolio-work-experience-item',
	} );

	return (
		<div { ...blockProps }>
			<div className="blockfolio-work-experience-item__header">
				<IconControl
					icon={ icon }
					iconId={ iconId }
					onSelect={ ( url, id ) =>
						setAttributes( { icon: url, iconId: id } )
					}
					onRemove={ () => setAttributes( { icon: '', iconId: 0 } ) }
				/>
				<div className="blockfolio-work-experience-item__header-fields">
					<div className="blockfolio-work-experience-item__row">
						<RichText
							tagName="h3"
							className="blockfolio-work-experience-item__role"
							placeholder={ __( 'Position', 'blockfolio' ) }
							value={ role }
							onChange={ ( value ) => setAttributes( { role: value } ) }
							allowedFormats={ [ 'core/bold', 'core/italic' ] }
						/>
						<div className="blockfolio-work-experience-item__period-fields">
							<input
								type="text"
								className="blockfolio-work-experience-item__date-input"
								placeholder={ __( 'Start (e.g. Jan 2020)', 'blockfolio' ) }
								value={ startDate }
								onChange={ ( event ) =>
									setAttributes( { startDate: event.target.value } )
								}
							/>
							<span className="blockfolio-work-experience-item__date-sep">
								–
							</span>
							{ current ? (
								<span className="blockfolio-work-experience-item__current-label">
									{ __( 'Current', 'blockfolio' ) }
								</span>
							) : (
								<input
									type="text"
									className="blockfolio-work-experience-item__date-input"
									placeholder={ __( 'End (e.g. Dec 2022)', 'blockfolio' ) }
									value={ endDate }
									onChange={ ( event ) =>
										setAttributes( { endDate: event.target.value } )
									}
								/>
							) }
							<CheckboxControl
								label={ __( 'I currently work here', 'blockfolio' ) }
								checked={ !! current }
								onChange={ ( value ) =>
									setAttributes( {
										current: value,
										endDate: value ? '' : endDate,
									} )
								}
							/>
						</div>
					</div>
					<div className="blockfolio-work-experience-item__row">
						<p className="blockfolio-work-experience-item__company-group">
							<RichText
								tagName="span"
								className="blockfolio-work-experience-item__company"
								placeholder={ __( 'Company Name', 'blockfolio' ) }
								value={ company }
								onChange={ ( value ) => setAttributes( { company: value } ) }
								allowedFormats={ [] }
							/>
							<span className="blockfolio-work-experience-item__company-sep">
								•
							</span>
							<RichText
								tagName="span"
								className="blockfolio-work-experience-item__company-description"
								placeholder={ __( 'Company Description (optional)', 'blockfolio' ) }
								value={ companyDescription }
								onChange={ ( value ) =>
									setAttributes( { companyDescription: value } )
								}
								allowedFormats={ [ 'core/bold', 'core/italic' ] }
							/>
						</p>
						<input
							type="url"
							className="blockfolio-work-experience-item__company-link-input"
							placeholder={ __(
								'Company Link (e.g. https://company.com)',
								'blockfolio'
							) }
							value={ companyUrl }
							onChange={ ( event ) =>
								setAttributes( { companyUrl: event.target.value } )
							}
						/>
					</div>
				</div>
			</div>
			<RichText
				tagName="ul"
				multiline="li"
				className="blockfolio-work-experience-item__description"
				placeholder={ __(
					'Description of responsibilities and achievements…',
					'blockfolio'
				) }
				value={ description }
				onChange={ ( value ) => setAttributes( { description: value } ) }
			/>
		</div>
	);
}
