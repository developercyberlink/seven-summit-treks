
  <div class="col-md-9">
    <!-- Input Fields -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">New Page</span>
      </div>
      <div class="panel-body">                    
        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Page Title</label>         
          <div class="col-lg-8">
            <div class="bs-component">
              
              <input type="text" id="name" name="page_title" class="form-control" placeholder="Page Title" value="{{$data->page_title}}" required="" />
              <input type="hidden" id="uri" name="uri" value="{{$data->uri}}" />
            </div>
          </div>
        </div>

        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Sub Title</label>        
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" name="sub_title" class="form-control" placeholder="Sub Title" value="{{$data->sub_title}}" />
            </div>
          </div>
        </div> 

        
         <span class="panel-title">Brief</span>
      <div class="form-group">         
        <div class="col-lg-12">
          <div class="bs-component">
            <textarea class="form-control my-editor"   name="page_excerpt" rows="3">{{$data->page_excerpt}}</textarea>
          </div>
        </div>
      </div>
   
      <span class="panel-title"> Content</span>  
      <div class="form-group">
        <div class="col-lg-12">
          <div class="bs-component">
            <textarea class="form-control my-editor" name="page_content" rows="6">{{$data->page_content}}</textarea>
          </div>
        </div>
      </div>
    
    <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Meta Keywords</label>        
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" name="meta_keyword" class="form-control" placeholder="Meta Keywords" value="{{$data->meta_keyword}}" />
            </div>
          </div>
        </div>  
                           
        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Meta Desription</label>         
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" id="email" name="meta_description" class="form-control" placeholder="Meta Desription" value="{{$data->meta_description}}" />
           
            </div>
          </div>
        </div>

         
    </div>
  </div>


 
</div>          

<div class="col-md-3">
  <div class="admin-form">

 <div class="sid_bvijay mb10">
    <div class="hd_show_con">
        Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>              
    </div>
</div>

<div class="sid_bvijay mb10">
  <label class="field text">
  <h4> Ordering: </h4>
   <input type="number" name="page_order" class="form-control" placeholder="Ordering" value="{{$data->page_order}}" /> </label>
</div>

<div class="sid_bvijay mb10">
 <label class="field text">
  <h4> External Link </h4>
   <input type="text" id="" name="external_link" class="form-control" placeholder="External Link" value="{{$data->external_link}}" />   
  </label>
</div> 


<div class="sid_bvijay mb10">
  <h4> Thumbnail </h4>
  <div class="hd_show_con">
    <div id="xedit-demo">
       @if($data->page_thumbnail)
        <span class="id{{$data->id}}">
        <a href="#{{$data->id}}" class="imagedelete">X</a>
        <img src="{{ asset(env('PUBLIC_PATH').'uploads/original/' . $data->page_thumbnail) }}" width="150" />
        <hr>
        </span>             
        @endif   
     <input type="file" name="page_thumbnail" />
   </div>
 </div>
</div>

<div class="sid_bvijay mb10">
  <h4> Banner </h4>
  <div class="hd_show_con">
    <div id="xedit-demo">
       @if($data->page_banner)
      <span class="banner{{$data->id}}">
      <a href="#{{$data->id}}" class="bannerdelete">X</a>
      <img src="{{ asset(env('PUBLIC_PATH').'uploads/banners/' . $data->page_banner) }}" width="150" />
      <hr>
      </span>             
      @endif   
    <input type="file" name="page_banner" /> 
   </div>
 </div>
</div>

</div>       
</div>