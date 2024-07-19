import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody , SelectControl , CheckboxControl} from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import icons from '../../icons.js'
import './main.css'

registerBlockType('veci-plus/header-tools', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { showAuth } = attributes
    const blockProps = useBlockProps({
      className: "wp-block-udemy-plus-header-tools"
    });

    return (
      <>
        <InspectorControls>
          <PanelBody title={ __('General', 'veci-plus') }>
              <SelectControl
                label={__('Show Login/Register Link' , 'veci-plus')}
                value={showAuth}
                options={[
                    {
                      label: __('No' , 'veci-plus'), value: false
                    },
                    {
                      label: __('Yes' , 'veci-plus'), value: true
                    }
                ]}
                onChange={newVal => setAttributes({showAuth: (newVal === "true")})}
              />
              <CheckboxControl
                label={__('Show Login/Register Link' , 'veci-plus')}
                help={ showAuth ?
                  __('Showing Link' , 'veci-plus') :
                  __('Hiding Link', 'veci-plus')
                }
                checked={showAuth}
                onChange={showAuth => setAttributes({showAuth})}
              />
          </PanelBody>
        </InspectorControls>
        <div { ...blockProps }>
          <a className="signin-link open-modal" href="#">
            <div className="signin-icon">
              <i className="bi bi-person-circle"></i>
            </div>
            <div className="signin-text">
              <small>Hello, Sign in</small>
              My Account
            </div>
          </a>
        </div>
      </>
    );
  }
});