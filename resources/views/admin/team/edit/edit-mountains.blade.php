<div class="col-md-12">
<div class="panel">
  <div class="panel-heading">
     <span class="panel-title"> Mountains Submitted</span>
    <a class="btn btn-primary pull-right add-mountain" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row </a>
  </div>
  <div class="panel-body" id="row_mountain_body">     
        <div class="row">             
            <div class="col-md-1">  <label>Ordering</label> </div>
            <div class="col-md-4">  <label>Mountain</label> </div>
            <div class="col-md-1">  <label>Total</label> </div> 
            <div class="col-md-2">  <label >Year</label> </div> 
            <div class="col-md-3">  <label>Link</label> </div> 
            <div class="col-md-1">  <label>Action</label> </div>
        </div>       
 

     @if($mountains->count() > 0) 
      @foreach($mountains as $row)    
        <div class="row" id="mountain-rec-{{$loop->iteration}}"> 
        <input type="hidden" name="mountains_id[]" value="{{$row->id}}" />             
          <div class="col-md-1"><input type="number" name="mountain_ordering[]" class="form-control" placeholder="SN" value="{{$row->ordering}}"/></div>
          <div class="col-md-4"><input type="text" name="mountain_name[]" class="form-control" placeholder="Mountain Name " value="{{$row->mountain}}" /></div>
           <div class="col-md-1"><input type="text" name="total_submitted[]" class="form-control" placeholder="Total" value="{{$row->total}}" /></div>
            <div class="col-md-2"><input type="text" name="year[]" class="form-control" placeholder="Year " value="{{$row->year}}"/></div>
          <div class="col-md-3"><input type="text" name="link[]" class="form-control" placeholder=" Example: http://www.example.com /" value="{{$row->link}}" /></div>                        
          <div class="col-md-1"><button class="btn btn-danger delete-mountain" mountain-rowid="{{$row->id}}" mountain-data-id="{{$loop->iteration}}"><i class="glyphicon glyphicon-trash"></i></button></div>  
        </div>  
         @endforeach
        @endif   
         </div>

  <div style="display:none;">
      <div id="row_mountain_additional">
        <div class="row">
         <input type="hidden" name="mountains_id[]" value="" />            
           <div class="col-md-1"><input type="number" name="mountain_ordering[]" class="form-control" placeholder="SN" /></div>
          <div class="col-md-4"><input type="text" name="mountain_name[]" class="form-control" placeholder="Mountain Name " /></div>
           <div class="col-md-1"><input type="text" name="total_submitted[]" class="form-control" placeholder="Total " /></div>
            <div class="col-md-2"><input type="text" name="year[]" class="form-control" placeholder="Year " /></div>
          <div class="col-md-3"><input type="text" name="link[]" class="form-control" placeholder=" Example: http://www.example.com /" /></div>                        
          <div class="col-md-1"><button class="btn btn-danger delete-mountain" mountain-data-id="0"><i class="glyphicon glyphicon-trash"></i></button></div>   
        </div>
    </div>
  </div>

  
</div>


</div>   

