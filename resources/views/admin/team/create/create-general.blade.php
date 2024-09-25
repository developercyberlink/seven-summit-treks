
  <div class="col-md-9">
    <!-- Input Fields -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">New Member</span>
      </div>
      <div class="panel-body">                    
        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Name</label>         
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{old('name')}}" required="" />
              <input type="hidden" id="uri" name="uri" value="" />
            </div>
          </div>
        </div>

        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Position</label>        
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" name="position" class="form-control" placeholder="Position" value="{{old('position')}}" />
            </div>
          </div>
        </div>  

                           
        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Category</label>         
          <div class="col-lg-8">
            <div class="bs-component">
              <select name="category" class="form-control team-select">
                <option value="0"> Select Category </option>
                @if($category)                  
                @foreach($category as $row)
                <option value="{{$row->id}}"> {{$row->category}}</option>
                @endforeach  
                @endif 
              </select>
              <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
            </div>
          </div>
        </div>
          <div class="form-group team-category 4"> 
         <label for="inputStandard" class="col-lg-3 control-label">Sub Category</label>         
          <div class="col-lg-8">
            <div class="bs-component">
              <select name="subcategory" class="form-control">
                <option value="0"> Select Sub Category </option>
                @if($category2)                  
                @foreach($category2 as $row)
                <option value="{{$row->id}}"> {{$row->category}}</option>
                @endforeach  
                @endif 
              </select>
              <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
            </div>
          </div>
        </div>

        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Phone</label>        
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" name="phone" class="form-control" placeholder="phone" value="{{old('phone')}}" />
            </div>
          </div>
        </div>  
                           
        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Email</label>         
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" id="email" name="email" class="form-control" placeholder="Email Address" value="{{old('email')}}" />
           
            </div>
          </div>
        </div>

        
         <span class="panel-title">Brief</span>
      <div class="form-group">         
        <div class="col-lg-12">
          <div class="bs-component">
            <textarea class="form-control my-editor"   name="brief" rows="3">{{old('brief')}}</textarea>
          </div>
        </div>
      </div>
   
      <span class="panel-title"> Content</span>  
      <div class="form-group">
        <div class="col-lg-12">
          <div class="bs-component">
            <textarea class="form-control my-editor"   name="content" rows="12">{{old('content')}}</textarea>
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
   Ordering: <input type="number"   name="ordering" class="form-control" placeholder="Ordering" value="{{$ordering}}" />   
  </label>
</div>

<div class="sid_bvijay mb10">
 <label class="field text">
   <input type="text" id="" name="fb_url" class="form-control" placeholder="Facebook Link" value="" />   
  </label>
</div>
<div class="sid_bvijay mb10">
 <label class="field text">
   <input type="text" id="" name="instagram_url" class="form-control" placeholder="Instagram Link" value="" />   
  </label>
</div>
<div class="sid_bvijay mb10">
 <label class="field text">
   <input type="text" id="" name="twitter_url" class="form-control" placeholder="Wikipedia Link" value="" />   
  </label>
</div>
<!--<div class="sid_bvijay mb10">-->
<!-- <label class="field text">-->
<!--   <input type="text" id="" name="linkedin_url" class="form-control" placeholder="Linkedin Link" value="" />   -->
<!--  </label>-->
<!--</div>-->

  


<div class="sid_bvijay mb10">
  <h4> Thumbnail </h4>
  <div class="hd_show_con">
    <div id="xedit-demo">
     <input type="file" name="thumbnail" />
   </div>
 </div>
</div>

<div class="sid_bvijay mb10">
  <h4> Banner </h4>
   <h4> <input type="checkbox" name="published" value="1" />  Blur </h4> 
  <div class="hd_show_con">
    <div id="xedit-demo">
    <input type="file" name="banner" /> 
   </div>
 </div>
</div>

</div>       
</div>