@if(isset($sent_requests)) 
    @foreach($sent_requests as $sent_request)
            <tr id="rowsuggest_{{ $sent_request->id }}">
                <td>{{ $sent_request->toUser->name }} - {{ $sent_request->toUser->email }}</td>      
                <td style="text-align: right;">
                      <button id="cancel_request_btn_" class="btn btn-danger me-1"
                        onclick="deleteRequest( '{{ $currentuserid }}', '{{ $sent_request->toUser->id }}', '{{ $url }}', '{{ csrf_token() }}' )">Withdraw Request</button>
                </td>
            </tr>
    @endforeach 
    <input type="hidden" id="sr_totcount" value="{{ $count }}">
@endif


@if(isset($recieved_requests)) 
    @foreach($recieved_requests as $recieved_request)
            <tr id="rowsuggest_{{ $recieved_request->id }}">
                <td>{{ $recieved_request->fromUser->name }} - {{ $recieved_request->fromUser->email }}</td>      
                <td style="text-align: right;">
                      <button style="background-color:#0d6efd;" id="accept_request_btn_" class="btn btn-primary me-1"
                      onclick="acceptRequest( '{{ $currentuserid }}', '{{ $recieved_request->fromUser->id }}', '{{ $url }}', '{{ csrf_token() }}' )">Accept</button>
                </td>
            </tr>
    @endforeach 
    <input type="hidden" id="rr_totcount" value="{{ $count }}">
@endif



