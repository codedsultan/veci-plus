import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps , InspectorControls , PanelColorSettings } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import block from './block.json';
import icons from '../../icons';
import './main.css'

registerBlockType(block.name, {
    icon: icons.primary,
    edit({ attributes , setAttributes}) {
        const { bgColor , textColor } = attributes
        const blockProps = useBlockProps({
            className: 'wp-block-udemy-plus-search-form',
            style : {
                'background-color' : bgColor,
                color :textColor
            }
        })
        return( 
            <>
                <InspectorControls>
                    <PanelColorSettings 
                        title={__('Colors' , 'veci-plus')}
                        colorSettings={[
                            {
                                label: __('Background Color', 'veci-plus'),
                                value: bgColor,
                                onChange: newVal => setAttributes({bgColor: newVal})
                            },
                            {
                                label: __('Text Color', 'veci-plus'),
                                value: textColor,
                                onChange: newVal => setAttributes({textColor: newVal})
                            }
                        ]}
                    />
                </InspectorControls>
                <div {...blockProps}>
                    <h1>Search: Your search term here</h1>
                    <form>
                    <input type="text" placeholder="Search" />
                    <div className="btn-wrapper">
                        <button type="submit" style={{'background-color' : bgColor, color :textColor}}>Search</button>
                    </div>
                    </form>
                </div>
            </>
        )
    }
}) 