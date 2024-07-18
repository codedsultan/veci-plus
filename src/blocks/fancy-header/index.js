import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps , RichText , InspectorControls } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { PanelBody , ColorPalette} from '@wordpress/components';
import metadata from './block.json';
import './main.css'



// const Edit = () => <p { ...useBlockProps() }>Hello World - Block Editor</p>;
// const save = () => <p { ...useBlockProps.save() }>Hello World - Frontend</p>;

registerBlockType( metadata.name, {
    edit({attributes , setAttributes}) {
        const { content, underline_color } = attributes
        const blockProps = useBlockProps()
        // console.log(props)
        return(
            <>
                <InspectorControls>
                    <PanelBody title={__('Colors', 'veci-plus')}>
                        <ColorPalette 
                            colors={[
                                {name : 'Red' , color: '#f87171'},
                                {name : 'Indigo' , color: '#818cf8'}
                            ]}
                            value={underline_color}
                            onChange={newVal => setAttributes({underline_color: newVal})}
                        />
                    </PanelBody>
                    
                </InspectorControls>
                <div {...blockProps}> <RichText 
                    className= 'fancy-header'
                    tagName='h2' 
                    placeholder={__('Enter Heading', 'veci-plus')} 
                    value={content}
                    onChange={newVal => setAttributes({ content : newVal}) }
                    allowedFormats={['core/bold','core/italic']}
                />
                </div>
            </>
        )
    },
    save({attributes}){
        // atributes to save content and underline color
        const { content, underline_color } = attributes
        const blockProps = useBlockProps.save({
            className: 'fancy-header',
            style: {
                'background-image' : `
                    linear-gradient(transparent, transparent),
                    linear-gradient(${underline_color}, ${underline_color});
                `
            }
        })
        return ( 
            <RichText.Content
                {...blockProps}
                tagName='h2'
                value={content}
            />
        )
    }
} );
