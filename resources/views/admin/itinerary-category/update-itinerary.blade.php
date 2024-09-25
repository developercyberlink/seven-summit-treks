<div class="col-md-12">
   <div class="panel">
       <div class="panel-heading">
           <span class="panel-title"> Trip Itinerary </span>
           <a class="btn btn-primary pull-right add-itinerary" data-added="0"><i
                   class="glyphicon glyphicon-plus"></i> Add Row </a>
       </div>
       <div class="panel-body" id="row_body">
       <div class="row">
         <div class="col-md-1"> <label>Ordering </label></div>
         <div class="col-md-1"> <label>Day</label></div>
         <div class="col-md-2"> <label>Title</label></div>
         <div class="col-md-3"> <label>Description</label></div>
         <div class="col-md-3"> <label>Accommodation</label></div>
         <div class="col-md-1"> <label>Meals</label></div>
               <div class="col-md-1"> </div>
           </div>

                  @if ($itineraries->count() > 0)
                      @foreach ($itineraries as $row)
                          <div class="row" id="rec-{{ $loop->iteration }}">
                              <input type="hidden" name="itinerary_id[]" value="{{ $row->id }}" />
                              <div class="col-md-1">
                                  <input type="number" min="1" max="2000" name="itinerary_ordering[]"
                                      value="{{ $row->ordering }}" class="form-control" placeholder="" />
                              </div>
                              <div class="col-md-1"> <input type="text" name="itinerary_days[]"
                                value="{{$row->days}}" class="form-control" placeholder="" /></div>
                                <div class="col-md-2">
                                    <input type="text" name="itinerary_title[]" value="{{ $row->title }}" class="form-control"
                                        placeholder="" />
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="itinerary_content[]" value="{{ $row->content }}"
                                        class="form-control" placeholder="" />
                                </div>
                              <div class="col-md-3">
                                <input type="text" name="accomodation[]"  value="{{ $row->accomodation }}" class="form-control"
                                        placeholder="" />
                              </div>

                              <div class="col-md-1">
                                  <input type="text" name="itinerary_meals[]" value="{{ $row->meals }}" class="form-control"
                                      placeholder="" />
                              </div>
                              <div class="col-md-1"><button class="btn btn-danger delete-itinerary"
                                      itinerary-rowid="{{ $row->id }}" itinerary-data-id="{{ $loop->iteration }}"><i
                                          class="glyphicon glyphicon-trash"></i></button></div>
                          </div>
                      @endforeach
                  @endif
       </div>


       <div style="display:none;">
           <div id="row_additional">
               <div class="row">
                 <input type="hidden" name="itinerary_id[]" value="" />
                   <div class="col-md-1"> <input type="number" min="1" max="2000" name="itinerary_ordering[]"
                           class="form-control" placeholder="" /></div>
                           <div class="col-md-1"> <input type="text" name="itinerary_days[]"
                             class="form-control" placeholder="" /></div>
                           <div class="col-md-2"><input type="text" name="itinerary_title[]" class="form-control"
                                   placeholder="" /></div>
                           <div class="col-md-3"><input type="text" name="itinerary_content[]" class="form-control"
                                   placeholder="" /></div>
                       <div class="col-md-3"><input type="text" name="accomodation[]" class="form-control"
                           placeholder="" /></div>

                           <div class="col-md-1"><input type="text" name="itinerary_meals[]" class="form-control"
                                   placeholder="" /></div>
                   <div class="col-md-1"><button class="btn btn-danger delete-itinerary" itinerary-data-id="0"><i
                               class="glyphicon glyphicon-trash"></i></button></div>
               </div>
           </div>
       </div>


   </div>
</div>
