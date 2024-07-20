import { 
    useBlockProps, RichText 
  } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
 
export default function({ attributes }) {
    const { 
      name, title, bio, imgURL, imgID, imgAlt, socialHandles, imageShape
    } = attributes;
    const blockProps = useBlockProps.save();
    const imageClass = `wp-image-${imgID} img-${imageShape}`
    return (
      <div {...blockProps}>
        <div class="author-meta">
            {imgURL && <img src={imgURL} alt={imgAlt} className={imageClass}/> }
          <p>
            <RichText.Content tagName="strong" value={name} />
            <RichText.Content tagName="span" value={title} />
          </p>
        </div>
        <div class="member-bio">
          <RichText.Content tagName="p" value={bio} />
        </div>
        <div class="social-links">
            {socialHandles.map((handle) => {
                return <a href={handle.url} data-icon={handle.icon}><i class={`bi bi-${handle.icon}`}></i></a>
            }

            )}
        </div>
      </div>
    )
  }