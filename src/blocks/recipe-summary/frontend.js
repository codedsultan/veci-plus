import { Rating } from "@mui/material"
import {createRoot , useState} from '@wordpress/element'
function RecipeRating(props){
    const [avgRating,setAvgRating] = useState(props.avgRating)
    const [permission,setPermission] = useState(props.loggedIn)
    return(
        <Rating
            value={avgRating}
            precision={0.5}
            onChange={async () => {
                if(!permission){
                    return alert('You habe already rated this recipe or you may need to log in')
                }
                setPermission(false)
            }}
        />
    )
}

document.addEventListener('DOMContentLoaded' ,event =>{
    const block = document.querySelector('#recipe-rating')
    const postID = parseInt(block.dataset.postId)
    const avgRating = parseFloat(block.dataset.avgRating)
    const loggedIn = !!block.dataset.loggedIn //!! to convert to boolean 
    const root = createRoot(block)
    console.log(postID,avgRating,loggedIn)

    root.render(
        <RecipeRating
            postID={postID}
            avgRating={avgRating}
            loggedIn={loggedIn}
        />,
    )
})

