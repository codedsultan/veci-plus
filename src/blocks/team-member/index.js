import { registerBlockType } from '@wordpress/blocks';
import { 
  useBlockProps, InspectorControls, RichText ,MediaPlaceholder
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { 
  PanelBody, TextareaControl
} from '@wordpress/components';
import {isBlobURL} from '@wordpress/blob';
import icons from '../../icons.js';
import './main.css';

registerBlockType('veci-plus/team-member', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { 
      name, title, bio, imgID, imgAlt, imgURL, socialHandles
    } = attributes;
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title={__('Settings', 'veci-plus')}>
            <TextareaControl 
              label={__('Alt Attribute', 'veci-plus')}
              value={imgAlt}
              onChange={imgAlt => setAttributes({imgAlt})}
              help={__(
                'Description of your image for screen readers.',
                'veci-plus'
              )}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <div className="author-meta">
            {
              imgURL && <img src={imgURL} alt={imgAlt} /> 
            }
            <MediaPlaceholder 
              acceptedTyoes={['image']}  // for specific 'image/png'
              accept={'image/*'} // for upoads
              icon="admin-users" //placeholder
              onSelect={ img => {

                let newImgURL = null
                if(isBlobURL(img.url)){
                  newImgURL = img.url
                }else{
                  newImgURL = img.sizes ? img.sizes.teamMember.url :img.media_details.sizes.teamMember.source_url
                }
                setAttributes({
                  imgID: img.id,
                  imgAlt: img.alt,
                  imgURL: newImgURL
                })
                // console.log(img)
              }}
              onError={error => console.error(TypeError)}
              disableMediaButtons={imgURL}
              onSelectURL={url => {
                setAttributes({
                  imgID: null,
                  imgAlt: null,
                  imgURL: url
                })
              }}
            />
            <p>
              <RichText 
                placeholder={__('Name', 'veci-plus')}
                tagName="strong"
                onChange={name => setAttributes({name})}
                value={name}
              />
              <RichText 
                placeholder={__('Title', 'veci-plus')}
                tagName="span"
                onChange={title => setAttributes({title})}
                value={title}
              />
            </p>
          </div>
          <div className="member-bio">
            <RichText 
              placeholder={__('Member bio', 'veci-plus')}
              tagName="p"
              onChange={bio => setAttributes({bio})}
              value={bio}
            />
          </div>
          <div className="social-links"></div>
        </div>
      </>
    );
  },
  save({ attributes }) {
    const { 
      name, title, bio, imgURL, imgID, imgAlt, socialHandles, imageShape
    } = attributes;
    const blockProps = useBlockProps.save();

    return (
      <div {...blockProps}>
        <div class="author-meta">
            {
              imgURL && <img src={imgURL} alt={imgAlt} /> 
            }
          <p>
            <RichText.Content tagName="strong" value={name} />
            <RichText.Content tagName="span" value={title} />
          </p>
        </div>
        <div class="member-bio">
          <RichText.Content tagName="p" value={bio} />
        </div>
        <div class="social-links"></div>
      </div>
    )
  }
});
