import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, InnerBlocks } from '@wordpress/block-editor';

const ITEM_BLOCK = 'blockfolio/work-experience-item';
const ALLOWED_BLOCKS = [ ITEM_BLOCK ];
const TEMPLATE = [ [ ITEM_BLOCK ] ];

export default function Edit( { attributes, setAttributes } ) {
	const { title } = attributes;
	const blockProps = useBlockProps( { className: 'blockfolio-work-experience' } );

	return (
		<div { ...blockProps }>
			<div className="blockfolio-work-experience__header">
				<RichText
					tagName="h2"
					className="blockfolio-work-experience__title wp-block-heading"
					placeholder={ __( 'Work Experience', 'blockfolio' ) }
					value={ title }
					onChange={ ( value ) => setAttributes( { title: value } ) }
					allowedFormats={ [] }
				/>
			</div>
			<InnerBlocks
				allowedBlocks={ ALLOWED_BLOCKS }
				template={ TEMPLATE }
				templateLock={ false }
				renderAppender={ () => <InnerBlocks.ButtonBlockAppender /> }
			/>
		</div>
	);
}
