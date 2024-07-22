import {registerPlugin} from "@wordpress/plugins"
import {PluginSidebar} from "@wordpress/edit-post"
import {PanelBody,TextControl,TextareaControl,ToggleControl} from "@wordpress/components"
import { __ } from "@wordpress/i18n";
import {useSelect} from "@wordpress/data";
registerPlugin("vp-sidebar", {
    render() {

        const {og_title, og_image, og_description, og_override_image} = useSelect((select)=> {
            return select('core/editor').getEditedPostAttribute("meta")
        })
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

                }}
            />
            <TextareaControl 
                label={__("Description", "veci-plus")}
                value={og_description}
                onChange={og_description => {

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

                }}
            />
            </PanelBody>
        </PluginSidebar>
    }
})