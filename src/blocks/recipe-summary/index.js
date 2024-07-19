import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import icons from '../../icons.js';
import { useEntityProp } from '@wordpress/core-data';
import { useSelect } from '@wordpress/data';
import metadata from './block.json';
import './main.css';

registerBlockType(metadata.name, {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes , context }) {
    const { prepTime, cookTime, course } = attributes;
    const { postId } = context;
    const [ termIDs ] = useEntityProp('postType','recipe' ,'cuisine' ,postId)

    const{cuisines} = useSelect((select) => {
        const {getEntityRecords} = select('core')

        return {
            cuisines : getEntityRecords('taxonomy','cuisine',{
                include: termIDs
            })
        }
    },[termIDs]) // watches changes in termIDs to run query

    console.log(cuisines)
    const blockProps = useBlockProps({
        className: "wp-block-udemy-plus-recipe-summary"
    });

    return (
      <>
        <div {...blockProps}>
          <i className="bi bi-alarm"></i>
          <div className="recipe-columns-2">
            <div className="recipe-metadata">
              <div className="recipe-title">{__('Prep Time', 'veci-plus')}</div>
              <div className="recipe-data recipe-prep-time">
                <RichText
                  tagName="span"
                  value={ prepTime } 
                  onChange={ prepTime => setAttributes({ prepTime }) }
                  placeholder={ __('Prep time', 'veci-plus') }
                />
              </div>
            </div>
            <div className="recipe-metadata">
              <div className="recipe-title">{__('Cook Time', 'veci-plus')}</div>
              <div className="recipe-data recipe-cook-time">
                <RichText
                  tagName="span"
                  value={ cookTime } 
                  onChange={ cookTime => setAttributes({ cookTime }) }
                  placeholder={ __('Cook time', 'veci-plus') }
                />
              </div>
            </div>
          </div>
          <div className="recipe-columns-2-alt">
            <div className="recipe-columns-2">
              <div className="recipe-metadata">
                <div className="recipe-title">{__('Course', 'veci-plus')}</div>
                <div className="recipe-data recipe-course">
                  <RichText
                    tagName="span"
                    value={ course } 
                    onChange={ course => setAttributes({ course }) }
                    placeholder={ __('Course', 'veci-plus') }
                  />
                </div>
              </div>
              <div className="recipe-metadata">
                <div className="recipe-title">{__('Cuisine', 'veci-plus')}</div>
                <div className="recipe-data recipe-cuisine">
                </div>
              </div>
              <i className="bi bi-egg-fried"></i>
            </div>
            <div className="recipe-metadata">
              <div className="recipe-title">{__('Rating', 'veci-plus')}</div>
              <div className="recipe-data">
              </div>
              <i className="bi bi-hand-thumbs-up"></i>
            </div>
          </div>
        </div>
      </>
    );
  }
});