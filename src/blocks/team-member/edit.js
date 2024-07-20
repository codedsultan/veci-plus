import { 
useBlockProps, InspectorControls,BlockControls,MediaReplaceFlow, RichText ,MediaPlaceholder
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { 
PanelBody, TextareaControl ,Spinner ,ToolbarButton
} from '@wordpress/components';
import {isBlobURL, revokeBlobURL} from '@wordpress/blob';
import {useState} from '@wordpress/element'

export default function({ attributes, setAttributes, context }) {
    const { 
      name, title, bio, imgID, imgAlt, imgURL, socialHandles
    } = attributes;
    const blockProps = useBlockProps();
    const [imgPreview,setImgPreview ] = useState()
    const selectImg =  img => {
        let newImgURL = null
        if(isBlobURL(img.url)){
          newImgURL = img.url
        }else{
          newImgURL = img.sizes ? img.sizes.teamMember.url :img.media_details.sizes.teamMember.source_url
          setAttributes({
            imgID: img.id,
            imgAlt: img.alt,
            imgURL: newImgURL
          })

          revokeBlobURL(imgPreview)
        }
        setImgPreview(newImgURL)
        // console.log(img)
    }
    const selectImgURL = url => {
        setAttributes({
          imgID: null,
          imgAlt: null,
          imgURL: url
        })

        setImgPreview(url)
    }

    const imageClass = `wp-image-${imgID} img-${context["veci-plus/image-shape"]}`
    return (
      <>
        {imgPreview && (
            <BlockControls group="inline">
                <MediaReplaceFlow
                name={__("Replace Image", "veci-plus")}
                mediaId={imgID}
                mediaURL={imgURL}
                allowedTypes={["image"]}
                accept={"image/*"}
                onError={(error) => console.error(error)}
                onSelect={selectImg}
                onSelectURL={selectImgURL}
                />
                <ToolbarButton onClick={() =>{
                    setAttributes({
                        imgID: 0,
                        imgAlt: '',
                        imgURL: ''
                    })

                    setImgPreview('')
                }}>
                   {__('Remove Image','veci-plus')} 
                </ToolbarButton>
            </BlockControls>
        )}

        <InspectorControls>
          <PanelBody title={__('Settings', 'veci-plus')}>
            {
                imgPreview && !isBlobURL(imgPreview) && // only appear if image is selected
                <TextareaControl 
                    label={__('Alt Attribute', 'veci-plus')}
                    value={imgAlt}
                    onChange={imgAlt => setAttributes({imgAlt})}
                    help={__(
                        'Description of your image for screen readers.',
                        'veci-plus'
                    )}
                />
            }
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <div className="author-meta">
            {imgPreview && <img src={imgPreview} alt={imgAlt} className={imageClass} />}
            {isBlobURL(imgPreview) && <Spinner />}
            <MediaPlaceholder 
              allowedTypes={['image']}  // for specific 'image/png'
              accept={'image/*'} // for upoads
              icon="admin-users" //placeholder
              onSelect={selectImg}
              onError={error => console.error(error)}
              disableMediaButtons={imgPreview}
              onSelectURL={selectImgURL}
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
  }