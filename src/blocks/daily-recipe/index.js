import { registerBlockType } from '@wordpress/blocks'
import { useBlockProps, RichText } from '@wordpress/block-editor'
import { __ } from '@wordpress/i18n'
import icons from '../../icons.js'
import './main.css';

registerBlockType('veci-plus/daily-recipe', {
  icon: {
    src: icons.primary
  },
	edit({ attributes, setAttributes }) {
    const { title } = attributes;
    const blockProps = useBlockProps();
        
    return (
      <div {...blockProps}>
        <RichText
          tagName="h6"
          value={ title } 
          withoutInteractiveFormatting
          onChange={ title => setAttributes({ title }) }
          placeholder={ __('Title', 'veci-plus') }
        />
        <a href="#">
          <img src="" />
          <h3>Post Title</h3>
        </a>
      </div>
    );
  },
});