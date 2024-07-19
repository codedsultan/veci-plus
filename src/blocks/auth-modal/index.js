import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody , ToggleControl} from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import icons from '../../icons.js'
import metadata from './block.json';
import './main.css'

registerBlockType(metadata.name, {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { showRegister } = attributes;
    const blockProps = useBlockProps({
      className: "wp-block-udemy-plus-auth-modal"
    });

    return (
      <>
        <InspectorControls>
          <PanelBody title={ __('General', 'veci-plus') }>
            <ToggleControl 
              label={ __('Show Register', 'veci-plus')}
              help={
                showRegister ?
                __('Showing Registration Form', 'veci-plus') :
                __('Hiding Registration Form', 'veci-plus') 
              }
              checked={showRegister}
              onChange={showRegister => setAttributes({showRegister})} />
          </PanelBody>
        </InspectorControls>
        <div { ...blockProps }>
          {__('This block is not previewable from the editor. View your site for a live demo.', 'veci-plus')}
        </div>
      </>
    );
  }
});