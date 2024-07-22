import "./neon.css"
import {registerFormatType,toggleFormat} from "@wordpress/rich-text";
import { __ } from "@wordpress/i18n";
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { useSelect } from '@wordpress/data';

const MyCustomButton = ({ isActive, onChange, value }) => {
    const selectedBlock = useSelect( ( select ) => {
        return select( 'core/block-editor' ).getSelectedBlock();
    }, [] );
    return (
        <>{ selectedBlock.name === 'core/paragraph' && (
            <RichTextToolbarButton
                title={__("Neon" , 'veci-plus')}
                icon="superhero"
                isActive={ isActive }
                onClick={ () => {
                    onChange(
                        toggleFormat( value, {
                            type: "veci-plus/neon",
                        } )
                    );
                } }
            />
            )}
        </>
        
    );
};

registerFormatType( 'veci-plus/neon', {
    title: __("Neon" , 'veci-plus'),
    tagName: "span",
    className: "neon",
    edit: MyCustomButton,
} );


registerFormatType( 'my-custom-format/sample-output', {
    title: 'Sample output',
    tagName: 'samp',
    className: null,
} );
