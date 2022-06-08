<div class="row justify-content-center mt-5">
  <div class="col-12">
    <div class="card shadow  text-white bg-dark">
      <div class="card-header">Coding Challenge - Network connections</div>
      <div class="card-body">
        <!-- <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
          <label class="btn btn-outline-primary" for="btnradio1" id="get_suggestions_btn">Suggestions ()</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio2" id="get_sent_requests_btn">Sent Requests ()</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio3" id="get_received_requests_btn">Received
            Requests()</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio4" id="get_connections_btn">Connections ()</label>
        </div> -->
        <hr>

        <div id="content">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home" class="btn btn-outline-primary">Suggestions (<span id="suggtotalcount"></span>)</a></li>
            <li><a data-toggle="tab" href="#sentrequests" class="btn btn-outline-primary">Sent Requests (<span id="srtotalcount"></span>)</a></li>
            <li><a data-toggle="tab" href="#recievedrequests" class="btn btn-outline-primary">Received
            Requests(<span id="rrtotalcount"></span>)</a></li>
            <li><a data-toggle="tab" href="#connections" class="btn btn-outline-primary">Connections ()</a></li>
          </ul>
        
          <div class="tab-content">
          <div id="loader" style="display:none;"> <x-skeleton /> </div>

            <div id="home" class="tab-pane fade in active ">
              <input type="hidden" id="send_url_suggestion" value="{{ url('get-suggestions') }}">
              <script>
                jQuery(document).ready(function(){
                  getSuggestions('{{ csrf_token() }}');
                }); 
              </script>
              <table style="width: 100%;" id="suggestion_table"></table>
               
            </div>

            <div id="sentrequests" class="tab-pane fade">
              <!-- sentrequests -->
              <input type="hidden" id="sent_requests_url" value="{{ url('get-sent-requests') }}">
              <script>
                jQuery(document).ready(function(){
                  getRequests('sent', '{{ csrf_token() }}');
                }); 
              </script>
              <table style="width: 100%;" id="sent_request_table"></table>

            </div>

            <div id="recievedrequests" class="tab-pane fade">
              <!-- recievedrequests   -->
              <input type="hidden" id="recieved_requests_url" value="{{ url('get-recieved-requests') }}">
              <script>
                jQuery(document).ready(function(){
                  getRequests('recieved', '{{ csrf_token() }}');
                }); 
              </script>
              <table style="width: 100%;" id="recieved_request_table"></table>
            </div>

            <div id="connections" class="tab-pane fade">
            <!-- connections  -->
           

            </div>
          </div>
        </div>

      <!--  {{-- Remove this when you start working, just to show you the different components --}}
        <span class="fw-bold">Sent Request Blade</span>
        <x-request :mode="'sent'" />

        <span class="fw-bold">Received Request Blade</span>
        <x-request :mode="'received'" />

        <span class="fw-bold">Suggestion Blade</span>
        <x-suggestion />

        <span class="fw-bold">Connection Blade (Click on "Connections in common" to see the connections in common
          component)</span>
        <x-connection />
        {{-- Remove this when you start working, just to show you the different components --}} -->

<!--        <div id="skeleton" class="d-none">
          @for ($i = 0; $i < 10; $i++)
            <x-skeleton />
          @endfor
        </div>

        <span class="fw-bold">"Load more"-Button</span>
        <div class="d-flex justify-content-center mt-2 py-3 {{-- d-none --}}" id="load_more_btn_parent">
          <button class="btn btn-primary" onclick="" id="load_more_btn">Load more</button>
        </div>-->
      </div>
    </div>
  </div>
</div>

{{-- Remove this when you start working, just to show you the different components --}}
<!--
<div id="connections_in_common_skeleton" class="{{-- d-none --}}">
  <br>
  <span class="fw-bold text-white">Loading Skeletons</span>
  <div class="px-2">
    @for ($i = 0; $i < 10; $i++)
      <x-skeleton />
    @endfor
  </div>
</div>-->
