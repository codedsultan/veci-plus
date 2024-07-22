import "./main.css"

const ogImgBtn = document.querySelector("#og-img-btn");
const ogImgCtr = document.querySelector("#og-img-preview");
const ogImgInput = document.querySelector("#vp_og_image");

const mediaFrame = wp.media({
    title: 'Select or Upload Media',
    button: {
        text : "Use this media",
    },
    multiple : false,
})

ogImgBtn.addEventListener('click', event => {
    event.preventDefault();
    mediaFrame.open();
})

mediaFrame.on('select',() => {
    const attachment = mediaFrame.state().get("selection").first().toJSON();
    ogImgCtr.src = attachment.sizes.opengraph.url;
    ogImgInput.value = attachment.sizes.opengraph.url;
})