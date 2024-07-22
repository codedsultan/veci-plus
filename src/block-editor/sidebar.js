import {registerPlugin} from "@wordpress/plugins"
import {PluginSidebar} from "@wordpress/edit-post"
import { __ } from "@wordpress/i18n"
registerPlugin("vp-sidebar", {
    render() {
        return <PluginSidebar
        name="vp_sidebar"
        icon="share"
        title={__("Veci Plus Sidebar", "veci-plus")}
        >
            Random Text
        </PluginSidebar>
    }
})