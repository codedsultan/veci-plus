import {registerPlugin} from "@wordpress/plugins"
import {PluginSidebar} from "@wordpress/edit-post"
import {PanelBody,TextControl,TextareaControl,ToggleControl,Button} from "@wordpress/components"
import { __ } from "@wordpress/i18n";
import {useSelect ,useDispatch} from "@wordpress/data";
import {MediaUpload,MediaUploadCheck } from "@wordpress/block-editor"
registerPlugin("vp-sidebar", {
    render() {

        const {og_title, og_image, og_description, og_override_image} = useSelect((select)=> {
            return select('core/editor').getEditedPostAttribute("meta")
        })

        const{editPost} = useDispatch('core/editor');
        return <PluginSidebar
        name="vp_sidebar"
        icon="share"
        title={__("Veci Plus Sidebar", "veci-plus")}
        >
            <PanelBody title={__("Opengraph Options", "veci-plus")}>
            <TextControl 
                label={__("Title", "veci-plus")}
                value={og_title}
                onChange={og_title => { 
                    editPost({
                        meta:{
                            og_title
                        }
                    })
                }}
            />
            <TextareaControl 
                label={__("Description", "veci-plus")}
                value={og_description}
                onChange={og_description => {
                    editPost({
                        meta:{
                            og_description
                        }
                    })
                }}
            />
            <ToggleControl 
                label={__("Override Featured Image", "veci-plus")}
                checked={og_override_image}
                help={__(
                "By default, the featured image will be used as the image. Check this option to use a different image.",
                "veci-plus"
                )}
                onChange={og_override_image => {
                    editPost({
                        meta:{
                            og_override_image
                        }
                    })
                }}
            />
            {
                og_override_image && (
                <>
                    <img src={og_image}/>
                    <MediaUploadCheck>
                        <MediaUpload 
                            accept={["image"]}
                            render={({ open }) => {
                                return <Button isPrimary onClick={open}>{__("Change Image", "veci-plus")}</Button>
                            }}
                            onSelect={(image) => {
                                editPost({
                                    meta: {
                                        og_image:image.sizes.opengraph.url
                                    }
                                })
                            }}
                        />
                    </MediaUploadCheck>
                </>
                )
            }
            </PanelBody>
        </PluginSidebar>
    }
})