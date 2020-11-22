jQuery(document).ready(function(){
    const likeButton = jQuery('a.likebutton');
    likeButton.on('click',function(){
        const thisButton = jQuery(this);
        const postID = thisButton.data('postid');
        
        const url = '/wp-json/zimperfect/v1/like/' + postID;
        console.log(url);
        jQuery.get(url,function(data){
            if(data.response == 'OK'){
                thisButton.text(data.data);
            }
        });
    });
});