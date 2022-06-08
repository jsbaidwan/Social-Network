@if(isset($suggestions)) 
      @foreach($suggestions as $suggestion)
            <tr id="rowsuggest_{{ $suggestion->id }}">
                <td>{{ $suggestion->name }} - {{ $suggestion->email }}</td>      
                <td style="text-align: right;"><button onclick="sendRequest( '{{ $currentuserid }}', '{{ $suggestion->id }}', '{{ $url }}', '{{ csrf_token() }}' )"  class="btn btn-primary" style="background-color:#0d6efd;">Connect</button></td>
            </tr>
      @endforeach 
      <input type="hidden" id="sugg_totcount" value="{{ $count }}">
@endif



 
