<div class="uk-width-auto@m w-350" uk-visible@m>
    <div class="  uk-clearfix" style="z-index: 9;" uk-sticky="offset: 150; bottom: #uk-stop-sticky;">
       	@if($book_sidebar->count()>0)
        <!--  -->
        <div>
            <div class="uk-card uk-card-default uk-margin">
                <h5 class="uk-margin-remove uk-text-center uk-text-uppercase bg-primary uk-text-bold text-white uk-padding-small ">
                   Useful Info</h5>

                <div class="uk-card-body uk-padding-small">
                    <ul class="uk-list  uk-list-divider">
                        	@foreach($book_sidebar as $row)
                        <li>
                            <a href="{{url('info/'.$row->uri)}}">
                               {{$row->page_type}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--  -->
        @endif
    </div>
    <!--  -->
</div>
