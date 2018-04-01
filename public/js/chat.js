$(document).ready(function (){
	//alert('entred');
	load_users_right()
});
$( document ).on( 'pageshow', "#swap_event", function() {
$( document ).on( "swipeleft swiperight", "#swap_event", function( e ) {  
	//alert("swap");
                        // We check if there is no open panel on the page because otherwise
                        // a swipe to close the left panel would also open the right panel (and v.v.).
                        // We do this by checking the data that the framework stores on the page element (panel: open).
                        if ( $( ".ui-page-active" ).jqmData( "panel" ) !== "open" ) {
                        	if ( e.type === "swipeleft" ) {
                        		$( "#right-panel" ).panel( "open" );
                        		//load_users('id');

                        	} else if ( e.type === "swiperight" ) {
                        		$( "#left-panel" ).panel( "open" );
                        		//new_messages(5);
                        	}
                        }
                    });
});


$("#chat_list" ).on( "click", '#chat_name ',  function() {
	$('.chat_convertation').empty();
	id=$(this).val();
	//alert(id)
	ajax_call_get("messages/"+id);
	$( "#right-panel" ).panel( "close" );
});



$(".chat_list" ).on( "click", '#new_msg ',  function() {
	id=$('#new_msg').val()
	$('.chat_convertation').empty();
	ajax_call_get("messages/"+id);
	$("#left-panel" ).panel("close");
});
/*
$( document ).on( 'pagecreate', "#swap_event", function() {alert('a')
		
	$( document ).on( "swipeleft", "#swap_event", function( e ){
		
	});
});


*/

$(document).ready(function (){
	$('#chat_sending_box').on('click','#send_btn', function(){
		msg=$('#textarea').val();
		if(msg!=''){
			$("#textarea").val('');
			sender=$("#sender").val();
			token=$("input[name=_token]").val();
			send_msg_to_db(sender,msg,token);
		}

	});
	
});


// this is for send msg when pressed enter
$(function(){
	$("#textarea").keypress(function(e){
		var	msg= $("#textarea").val();
		msg=$("#textarea").val();
		if(e.keyCode == 13){
			if(msg==''){
				e.preventDefault();
			}
			else{
				e.preventDefault();
				$("#textarea").val('');
				sender=$("#sender").val();
				token=$("input[name=_token]").val();
				send_msg_to_db(sender,msg,token);
			}
		}
	});
});


//functions





//this function is used for sending data to db and storing

function send_msg_to_db(sender,msg,token)
{
	//alert("message send to db");
	ajax_call_post(sender,msg,token)
	
}


//this is used do insert msg in to user view
function insert_msg_to_view(sender,msg){
	$(".chat_convertation").append('<div data-role="header" id="msg"  class="msg '+sender+' ui-header ui-bar-inherit"><p class="message">'+msg+'</p></div>');
	$('.chat_convertation').scrollTop($('.chat_convertation')[0].scrollHeight);
	//alert('a message had been inserted to view');
}





// this is ajax funtrion used to send data to database
//sender varable is id of sender integer datatype
// msg is contend of msg
function ajax_call_post(sender,msg,token)


{
	/*$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	})*/
	$.ajax(
	{
		type: "post",
		url: "messages",
		data: { sender : sender, msg : msg, _token: token},
		success: function(a){
			alert(a);

			insert_msg_to_view(sender,msg)
		}
	});
}

//this function is used for filling names on panel(left and right) and also for fetching msg's for inserting in chat 

// url should be "messages/"+id for inserting message in to view calling show methord
//id  for user id of user to which loged in user is talking to


//url for displaying names is massages and calling index methord
//in this on need of id
function ajax_call_get(url)
{//alert(url)
	$.ajax(
	{
		type: "get",
		url: url,
		success: function(a){
			if (url=='chat') {
			for (var i = 0; i < a.length; i++) {
			  	//console.log(a[i].id,a[i].name,a[i].email);
			  	//insert_msg_to_view(a[i].mid,a[i].msg);
			  	insert_name_to_panel(a[i].id,a[i].name,)
			  };
				
			} else {
				for (var i = 0; i < a.length; i++) {
			  	//console.log(a[i].id,a[i].mid,a[i].msg);
			  	insert_msg_to_view(a[i].mid,a[i].msg);
			  	//insert_name_to_panel(a[i].id,a[i].name,)
			  };
			
			}
			}
		});
}




//load online users on to the right side panel
function load_users_right() {
	ajax_call_get('chat');

}

function insert_name_to_panel(id, name){
	//$("#list").append('<li><a id="new_msg" class"ui-btn ui-btn-icon-right ui-icon-carat-r" href="#">Acura <span class="ui-li-count">12</span></a></li>');
	$("#list").append('<li id="chat_name" value="'+id+'" class="ui-first-child ui-last-child"><a href="#" class="ui-btn ui-btn-icon-right ui-icon-carat-r">'+name+'</a></li>');
};


 

/*
//laod new messages to the left panal
function new_messages(id) {
    alert(id);
    $.ajax({
        type: "get",
        url: "/ajax/"+id,
        //data: { uid : uid },
        success: function(a)
        {
            alert(a);
        }


    });
    
}


*/



 /*
	$.get('/messages/23', function(){ 
        console.log(id); 
    });*/