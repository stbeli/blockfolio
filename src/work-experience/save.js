import { useBlockProps, RichText, InnerBlocks } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { title } = attributes;
	const blockProps = useBlockProps.save( {
		className: 'blockfolio-work-experience',
	} );

	return (
		<div { ...blockProps }>
			<div className="blockfolio-work-experience__header">
				<RichText.Content
					tagName="h2"
					className="blockfolio-work-experience__title wp-block-heading"
					value={ title }
				/>
			</div>
			<InnerBlocks.Content />
		</div>
	);
}
