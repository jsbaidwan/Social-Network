var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;


function getRequests(mode, csrf) {
  $("#loader").show();
  if(mode == 'sent'){
    var requests_url = $('#sent_requests_url').val();
  }else{
    var requests_url = $('#recieved_requests_url').val();
  }

  var send_data = {  "_token" : csrf }
  jQuery.ajax({
      type: 'POST',
      url: requests_url,
      data: send_data,
      dataType: "html",
      success: function(resultData) { 
          console.log(resultData);
          $("#loader").hide();

          if(mode == 'sent'){
            $('#sent_request_table').html(resultData);
            $('#srtotalcount').html($('#sr_totcount').val());
          }else{
            
            $('#recieved_request_table').html(resultData);
            $('#rrtotalcount').html($('#rr_totcount').val());
          }
      }
  });

}

function getMoreRequests(mode) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnections() {
  // your code here...
}

function getMoreConnections() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnectionsInCommon(userId, connectionId) {
  // your code here...
}

function getMoreConnectionsInCommon(userId, connectionId) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getSuggestions(csrf) {
  $("#loader").show();
  var send_url_suggestion = $('#send_url_suggestion').val();
  var send_data = {  "_token" : csrf }
  jQuery.ajax({
      type: 'POST',
      url: send_url_suggestion,
      data: send_data,
      dataType: "html",
      success: function(resultData) { 
       //   console.log(resultData);
          $("#loader").hide();
          $('#suggestion_table').html(resultData);
          
          $('#suggtotalcount').html($('#sugg_totcount').val());
      }
  });


}

function getMoreSuggestions() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function sendRequest(userId, suggestionId, send_url, csrf) {
  // your code here...
 $("#loader").show();
  var send_data = { 'from_user_id' : userId, 'to_user_id' : suggestionId, status : 1, "_token" : csrf }
  jQuery.ajax({
      type: 'POST',
      url: send_url,
      data: send_data,
      dataType: "text",
      success: function(resultData) { 
          // alert(resultData);
          $("#loader").hide();
          $("#rowsuggest_"+suggestionId).remove();
          var count = $('#suggtotalcount').html();
          var count = parseInt(count)-1;
          $('#suggtotalcount').html(count);
          $('#sugg_totcount').val(count);


          var srcount = $('#srtotalcount').html();
          var srcount = parseInt(srcount)+1;
          
          $('#srtotalcount').html($('#sr_totcount').val());

          getRequests('sent', csrf);
          
       }
  });


}

function deleteRequest(userId, requestId, delurl, csrf) {
  $("#loader").show();

  var send_data = { "from_user_id": userId, "to_user_id":requestId, "_token" : csrf }
  jQuery.ajax({
      type: 'POST',
      url: delurl,
      data: send_data,
      dataType: "html",
      success: function(resultData) { 
        //   console.log(resultData);
        if(resultData == 'del'){
            $("#loader").hide();
         
            var srcount = $('#srtotalcount').html();
            var srcount = parseInt(srcount)-1;
            
            $('#srtotalcount').html($('#sr_totcount').val());
            getRequests('sent', csrf);
            getSuggestions(csrf);

        }
          
      }
  });

}

function acceptRequest(userId, requestId, accurl, csrf) {
  $("#loader").show();

  var send_data = { "to_user_id": userId, "from_user_id":requestId, "_token" : csrf }
  jQuery.ajax({
      type: 'POST',
      url: accurl,
      data: send_data,
      dataType: "html",
      success: function(resultData) { 
        //   console.log(resultData);
        if(resultData == 'acc'){
            $("#loader").hide();
         
            var rrcount = $('#rrtotalcount').html();
            var rrcount = parseInt(rrcount)-1;
            
            $('#rrtotalcount').html($('#rr_totcount').val());
            getRequests('recieved', csrf);
            getSuggestions(csrf);

        }
          
      }
  });
}

function removeConnection(userId, connectionId) {
  // your code here...
}

$(function () {
  //getSuggestions();
});