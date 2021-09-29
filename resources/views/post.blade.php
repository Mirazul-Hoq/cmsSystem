<x-home-master>
	

	@section('content')

		<div class="col-lg-8">
		    <!-- Title -->
		    <h1 class="mt-4">{{ $post->title }}</h1>
		    <!-- Author -->
		    <p class="lead">
		        by
		        <a href="#">{{ $post->user->name }}</a>
		    </p>
		    <hr>
		    <!-- Date/Time -->
		    <p>Posted on {{ $post->created_at->diffForHumans() }}</p>
		    <hr>
		    <!-- Preview Image -->
		    <img class="img-fluid rounded" src="{{ $post->post_image }}" alt="">
		    <hr>
		    <!-- Post Content -->
		    <p class="lead">{{ $post->body }}</p>
		    <hr>
		    <div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://cms-system-1.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		</div>
		
	@endsection

<script id="dsq-count-scr" src="//cms-system-1.disqus.com/count.js" async></script>

</x-home-master>





<!-- <div class="col-md-4">

            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>
        </div>
 -->







<!-- Comments Form -->
		    <!-- <div class="card my-4">
		        <h5 class="card-header">Leave a Comment:</h5>
		        <div class="card-body">
		            <form>
		                <div class="form-group">
		                    <textarea class="form-control" rows="3"></textarea>
		                </div>
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </form>
		        </div>
		    </div> -->
		    <!-- Single Comment -->
		   <!--  <div class="media mb-4">
		        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
		        <div class="media-body">
		            <h5 class="mt-0">Commenter Name</h5>
		            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
		        </div>
		    </div> -->
		    <!-- Comment with nested comments -->
		    <!-- <div class="media mb-4">
		        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
		        <div class="media-body">
		            <h5 class="mt-0">Commenter Name</h5>
		            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
		            <div class="media mt-4">
		                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
		                <div class="media-body">
		                    <h5 class="mt-0">Commenter Name</h5>
		                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
		                </div>
		            </div>
		            <div class="media mt-4">
		                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
		                <div class="media-body">
		                    <h5 class="mt-0">Commenter Name</h5>
		                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
		                </div>
		            </div>
		        </div>
		    </div> -->