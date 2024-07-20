import { registerBlockType } from '@wordpress/blocks';
import { 
  useBlockProps, InspectorControls ,InnerBlocks
} from '@wordpress/block-editor';
import {
  PanelBody, RangeControl, SelectControl
} from '@wordpress/components'
import { __ } from '@wordpress/i18n';
import icons from '../../icons.js';
import './main.css';

registerBlockType('veci-plus/team-members-group', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { columns, imageShape } = attributes;
    const blockProps = useBlockProps({
      className: `cols-${columns}`
    });
   
    return (
      <>
        <InspectorControls>
          <PanelBody title={__('Settings', 'veci-plus')}>
            <RangeControl 
              label={__('Columns', 'veci-plus')}
              onChange={columns => setAttributes({columns})}
              value={columns}
              min={2}
              max={4}
            />
            <SelectControl 
              label={__('Image Shape', 'veci-plus')}
              value={ imageShape }
              options={[
                  { label: __('Hexagon', 'veci-plus'), value: 'hexagon' },
                  { label: __('Rabbet', 'veci-plus'), value: 'rabbet' },
                  { label: __('Pentagon', 'veci-plus'), value: 'pentagon' },
              ]}
              onChange={imageShape => setAttributes({ imageShape })}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <InnerBlocks
            orientation='horizontal'
            allowedBlocks={['veci-plus/team-member']}
            template={[
              [
                'veci-plus/team-member',
                {
                  name: 'John Doe',
                  title : 'CEO of Veci Techologies'
                }
              ],
              [
                'veci-plus/team-member',
              ],
              [
                'veci-plus/team-member',
              ],
            ]}
            // templateLock = "insert"
          />
        </div>
      </>
    );
  },
  save({ attributes }) {
    const { columns } = attributes;
    const blockProps = useBlockProps.save({
      className: `cols-${columns}`
    });

    return (
      <div {...blockProps}>
          <InnerBlocks.Content/>
      </div>
    )
  }
});