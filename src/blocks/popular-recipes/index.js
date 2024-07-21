import { registerBlockType } from '@wordpress/blocks'
import { 
  useBlockProps, InspectorControls, RichText
} from '@wordpress/block-editor'
import { __ } from '@wordpress/i18n'
import { PanelBody,QueryControls } from '@wordpress/components'
import { useSelect} from '@wordpress/data'
import { RawHTML} from '@wordpress/element'
import icons from '../../icons.js'
import './main.css'

registerBlockType('veci-plus/popular-recipes', {
  icon: {
    src: icons.primary
  },
	edit({ attributes, setAttributes }) {
    const { title, count, cuisines } = attributes
    const blockProps = useBlockProps()
    const terms = useSelect( (select) => {
      return select("core").getEntityRecords(
        'taxonomy',
        'cuisine',{
          per_page : -1 //grab all taxonomy
        }
      )
    })

    const suggestions = {}

    terms?.forEach(term => {
      suggestions[term.name] = term
    });

    const cuisineIDs = cuisines.map((term)=> term.id);
    const posts = useSelect((select) => {
      return select("core").getEntityRecords("postType","recipe",{
        per_page: count,
        _embed: true,
        cuisine: cuisineIDs,
        order: "desc",
        orderByRating: 1
      }); //wp query
    },
    [count,cuisineIDs] // watch variables for changes to send new request
  );

  // console.log(posts)
    return (
      <>
        <InspectorControls>
          <PanelBody title={__('Settings', 'veci-plus')}>
            <QueryControls 
              numberOfItems={count}
              minItems={1}
              maxItems={10}
              onNumberOfItemsChange={count => setAttributes({count})}
              categorySuggestions={ suggestions}
              onCategoryChange={newTerms => {
                const newCuisines = []
                newTerms.forEach( cuisine => {

                  if(typeof cuisine === 'object' ){
                    return newCuisines.push(cuisine)
                  } // means cuisine exixts
                  const cuisineTerm = terms?.find(
                    (term) => term.name === cuisine
                  );
                  if(cuisineTerm){
                    newCuisines.push(cuisineTerm)
                  }
                })
                setAttributes({cuisines: newCuisines})
              }}
              selectedCategories={cuisines}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <RichText
            tagName="h6"
            value={ title }
            withoutInteractiveFormatting
            onChange={ title => setAttributes({ title }) }
            placeholder={ __('Title', 'veci-plus') }
          />
          {
            posts?.map((post)=> {
              const featureImage = 
                post._embedded && 
                post._embedded["wp:featuredmedia"] &&
                post._embedded["wp:featuredmedia"].length > 0 && 
                post._embedded["wp:featuredmedia"][0];
              return(
                <div class="single-post">
                  {
                    featureImage && (
                      <a class="single-post-image" href={post.link}>
                        <img src={featureImage.media_details.sizes.thumbnail.source_url} alt={featureImage.alt_text} />
                      </a>
                    )
                  }
                  
                  <div class="single-post-detail">
                    <a href={post.link}>
                      <RawHTML>{post.title.rendered}</RawHTML>
                    </a>
                    <span>
                      by <a href={post.link}>{post._embedded.author[0].name}</a>
                    </span>
                  </div>
                </div>
              )
            })
          }
          
        </div>
      </>
    );
  }
});