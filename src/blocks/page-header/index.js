import { registerBlockType } from '@wordpress/blocks';
import { 
  useBlockProps , RichText , InspectorControls
} from '@wordpress/block-editor';
import {PanelBody ,ToggleControl} from '@wordpress/components'
import { __ } from '@wordpress/i18n';
import icons from '../../icons.js'
import metadata from './block.json';
import './main.css'

registerBlockType(metadata.name, {
  icon: icons.primary,
	edit({attributes , setAttributes}) {
    const { content , showCategory} = attributes
    const blockProps = useBlockProps({
        className: "wp-block-udemy-plus-page-header"
    });

    return (
      <>
      <InspectorControls>
        <PanelBody title={__('General', 'veci-plus')}>
            <ToggleControl 
                label={__('Show Category', 'veci-plus')}
                checked={showCategory}
                onChange={showCategory => setAttributes({ showCategory })}
                help = {showCategory ? __('Category Shown', 'veci-plus') : __('Custom Content Shown' , 'veci-plus')}
            />
        </PanelBody>
      </InspectorControls>
        <div { ...blockProps } >
            <div className="inner-page-header">
                {   
                    showCategory ? 
                    <h1>{__('Category : Some Category' , 'veci-plus')}</h1> : 
                    <RichText
                        tagName='h1'
                        placeholder={__("Heading" , "veci-plus")}
                        onChange={content => setAttributes({content}) }
                    />
                }
            </div>
        </div>
      </>
    );
  }
})