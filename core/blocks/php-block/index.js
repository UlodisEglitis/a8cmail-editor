import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';

import './editor.scss';

import metadata from './block.json';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType( metadata, {
	/**
	 * @see ./edit.js
	 */
	edit: function( { attributes: { message }, setAttributes } ) {
		return (
			<p { ...useBlockProps() }>
				<RichText
					tagName="span"
					value={ message }
					onChange={ ( newMessage ) =>
						setAttributes( { message: newMessage } )
					}
				/>
			</p>
		);
	},
	// No save function needed - rendering handled by PHP
	save: function() {
		return null;
	}
} );
