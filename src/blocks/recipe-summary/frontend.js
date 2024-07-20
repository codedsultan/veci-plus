import { Rating } from "@mui/material"
import {createRoot , useState ,useEffect} from '@wordpress/element'
import apiFetch from '@wordpress/api-fetch'
function RecipeRating(props){
    const [avgRating,setAvgRating] = useState(props.avgRating)
    const [permission,setPermission] = useState(props.loggedIn)

    useEffect(() => {
        if(props.ratingCount){
            setPermission(false)
        }
    },[])
    return(
        <Rating
            value={avgRating}
            precision={0.5}
            onChange={async (event,rating) => {
                if(!permission){
                    return alert('You have already rated this recipe or you may need to log in')
                }
                setPermission(false)

                const response = await apiFetch({
                    //example.com/wp-json/vp/v1/rate
                    path: 'vp/v1/rate',
                    method: 'POST',
                    data:{
                        postID:props.postID,
                        rating
                    }
                })
                if(response.status == 2){
                    setAvgRating(response.rating)
                }
            }}
        />
    )
}

document.addEventListener('DOMContentLoaded' ,event =>{
    const block = document.querySelector('#recipe-rating')
    const postID = parseInt(block.dataset.postId)
    const avgRating = parseFloat(block.dataset.avgRating)
    const loggedIn = !!block.dataset.loggedIn //!! to convert to boolean 
    const ratingCount = !!parseInt(block.dataset.ratingCount)
    const root = createRoot(block)
    // console.log(postID,avgRating,loggedIn)

    root.render(
        <RecipeRating
            postID={postID}
            avgRating={avgRating}
            loggedIn={loggedIn}
            ratingCount={ratingCount}
        />
    )
})

