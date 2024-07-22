import defaultConfig from "@wordpress/scripts/config/webpack.config.js"

export default {
    ...defaultConfig,
    entry: { 
        ...defaultConfig.entry(),
        "admin/index" : "./src/admin",
        "block-editor/index" : "./src/block-editor",
    }
}