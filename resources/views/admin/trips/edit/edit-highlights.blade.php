<div class="col-md-12">
<div class="panel">
  <div class="panel-heading">
    <span class="panel-title"> Trip Highlights</span>
    <a class="btn btn-primary pull-right add-highlights" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row </a>
  </div>
 <div class="panel-body" id="row_highlights_body">     
        <div class="row">             
            <div class="col-md-1">  <label>Ordering</label> </div>
            <div class="col-md-10"> <label>Title</label> </div>           
            <div class="col-md-1">  <label>Action</label> </div>
        </div>       
    
 
   @if($highlights->count() > 0) 
      @foreach($highlights as $row)       
        <div class="row" id="highlights-rec-{{$loop->iteration}}">  
         <input type="hidden" name="highlights_id[]" value="{{$row->id}}" />            
            <div class="col-md-1"><input type="number" name="highlights_ordering[]" class="form-control" placeholder="" value="{{$row->ordering}}"/></div>
            <div class="col-md-10"><input type="text" name="highlights_title[]" class="form-control" placeholder="Title " value="{{$row->title}}"/></div>
            <div class="col-md-1"><button class="btn btn-danger delete-highlights" highlights-rowid="{{$row->id}}" highlights-data-id="{{$loop->iteration}}"><i class="glyphicon glyphicon-trash"></i></button></div>  
        </div> 
          @endforeach     
      @endif      
    </div>
    
  <div style="display:none;">
      <div id="row_highlights_additional">
        <div class="row">       
         <input type="hidden" name="highlights_id[]" value="" />     
            <div class="col-md-1"><input type="number" name="highlights_ordering[]" class="form-control" placeholder="" /></div>
            <div class="col-md-10"><input type="text" name="highlights_title[]" class="form-control" placeholder="Title" /></div>
            <div class="col-md-1"><button class="btn btn-danger delete-highlights" highlights-data-id="0"><i class="glyphicon glyphicon-trash"></i></button></div>  
        </div>
    </div>
  </div>

  
</div>
</div>