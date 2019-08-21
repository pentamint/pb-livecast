jQuery(function($){
 
	/*
	 * Load More
	 */
	$('#pm_loadmore').click(function(){
 
		$.ajax({
			url : pm_loadmore_params.ajaxurl, // AJAX handler
			data : {
				'action': 'loadmorebutton', // the parameter for admin-ajax.php
				'query': pm_loadmore_params.posts, // loop parameters passed by wp_localize_script()
				'page' : pm_loadmore_params.current_page // current page
			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				$('#pm_loadmore').text('처리중..'); // some type of preloader
			},
			success : function( posts ){
				if( posts ) {
 
					$('#pm_loadmore').text( '글 더보기' );
					$('#pm_posts_wrap').append( posts ); // insert new posts
					pm_loadmore_params.current_page++;
 
					if ( pm_loadmore_params.current_page == pm_loadmore_params.max_page ) 
						$('#pm_loadmore').hide(); // if last page, HIDE the button
 
				} else {
					$('#pm_loadmore').hide(); // if no data, HIDE the button as well
				}
			}
		});
		return false;
	});
 
	/*
	 * Filter
	 */
	$('#pm_filters').submit(function(){
 
		$.ajax({
			url : pm_loadmore_params.ajaxurl,
			data : $('#pm_filters').serialize(), // form data
			dataType : 'json', // this data type allows us to receive objects from the server
			type : 'POST',
			beforeSend : function(xhr){
				$('#pm_filters').find('button').text('필터중..');
			},
			success : function( data ){
 
				// when filter applied:
				// set the current page to 1
				pm_loadmore_params.current_page = 1;
 
				// set the new query parameters
				pm_loadmore_params.posts = data.posts;
 
				// set the new max page parameter
				pm_loadmore_params.max_page = data.max_page;
 
				// change the button label back
				$('#pm_filters').find('button').text('필터 적용하기');
 
				// insert the posts to the container
				$('#pm_posts_wrap').html(data.content);
 
				// hide load more button, if there are not enough posts for the second page
				if ( data.max_page < 2 ) {
					$('#pm_loadmore').hide();
				} else {
					$('#pm_loadmore').show();
				}
			}
		});
 
		// do not submit the form
		return false;
 
	});
 
});