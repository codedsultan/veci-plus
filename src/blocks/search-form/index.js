import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import block from './block.json';
import icons from '../../icons';
import './main.css'

registerBlockType(block.name, {
    icon: icons.primary,
    edit() {
        const blockProps = useBlockProps()
        return( 
            <div {...blockProps}>
                <h1>Search: Your search term here</h1>
                <form>
                <input type="text" placeholder="Search" />
                <div className="btn-wrapper">
                    <button type="submit">Search</button>
                </div>
                </form>
            </div>
        )
    }
}) 