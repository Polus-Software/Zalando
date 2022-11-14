jQuery( document ).ready( function( $ ) {
        "use strict";
	/**
         * The file is enqueued from inc/admin/class-admin.php.
	 */        
        $( '#nds_add_user_meta_ajax_form' ).submit( function( event ) {
            
            event.preventDefault(); // Prevent the default form submit.            
            
            // serialize the form data
            var ajax_form_data = $("#nds_add_user_meta_ajax_form").serialize();
            
            //add our own ajax check as X-Requested-With is not always reliable
            ajax_form_data = ajax_form_data+'&ajaxrequest=true&submit=Submit+Form';
            
            $.ajax({
                url:    params.ajaxurl, // domain/wp-admin/admin-ajax.php
                type:   'post',                
                data:   ajax_form_data
            })
            
            .done( function( response ) { // response from the PHP action
                $(" #nds_form_feedback ").html( "<h2>The request was successful </h2><br>" + response );
            })
            
            // something went wrong  
            .fail( function() {
                $(" #nds_form_feedback ").html( "<h2>Something went wrong.</h2><br>" );                  
            })
        
            // after all this time?
            .always( function() {
                event.target.reset();
            });
        
		});
		$('#add_new_client,#cancel,button.edit').click(function(){
			$('#input_client_id,#zalendo_client_id,#zalendo_client_secret').val('');
			$('#nds_add_user_meta_form').slideToggle();
		});
		$('button.delete').click(function(){
			var id = jQuery(this).attr('data-id');
			if(id > 0){
				if (confirm("Are you sure?")) {
					$.ajax({
						url:    params.ajaxurl, // domain/wp-admin/admin-ajax.php
						type:   'post',                
						data: {action: 'zalendo_form_response', client_id:id},
					}).done( function( response ) { // response from the PHP action
						$(" #client_"+id).remove();
					}).fail( function() {// something went wrong
						alert('Please try once again');                  
					});
				}
				return false;
			}
		});
		$('button.edit').click(function(){
			var id = jQuery(this).attr('data-id');
			if(id > 0){
				$.ajax({
					url:    params.ajaxurl, // domain/wp-admin/admin-ajax.php
					type:   'post',                
					data: {action: 'zalendo_form_response', client_id:id,update_client:1},
				}).done( function( response ) { // response from the PHP action
					if(response){
						var obj = JSON.parse(response);
						$('#zalendo_client_id').val(obj.client_id);
						$('#zalendo_client_secret').val(obj.client_secret);
						$('#input_client_id').val(id);
					}
				}).fail( function() {// something went wrong
					alert('Please try once again');                  
				});
			}
		});
        $('button.print_invoice').click(function(){
			window.print();
			return false;
		});
});
