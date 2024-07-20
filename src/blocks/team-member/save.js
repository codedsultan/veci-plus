import { 
    useBlockProps, RichText 
  } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
 
export default function({ attributes }) {
    const { 
      name, title, bio, imgURL, imgID, imgAlt, socialHandles, imageShape
    } = attributes;
    const blockProps = useBlockProps.save();

    return (
      <div {...blockProps}>
        <div class="author-meta">
            {imgURL && <img src={imgURL} alt={imgAlt} /> }
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