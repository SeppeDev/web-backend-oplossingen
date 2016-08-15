@if (count($delete) > 0)
    <!-- Form Delete List -->
    <div class="bg-danger clearfix">   

	    @if($delete->content)

	    	Are you sure you want to delete this comment?

	    	<form action="{{ url('comment/deleteNow/'.$delete->id) }}" method="POST" class="pull-right">
	            {{ csrf_field() }}

	            <input type="hidden" name="_method" value="DELETE">
	            <input type="hidden" name="comment" value="{{$delete}}">

	            <button name="delete" class="btn btn-danger" value="{{$delete->id}}">
	                <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
	            </button>

	            <button name="cancel" class="btn" value="{{$delete->id}}">
	                <i class="fa fa-btn fa-trash" title="cancel"></i> cancel
	            </button>

	        </form>

	    @else

	    	Are you sure you want to delete this article?

	    	<form action="{{ url('article/deleteNow/'.$delete->id) }}" method="POST" class="pull-right">
	            {{ csrf_field() }}

	            <input type="hidden" name="_method" value="DELETE">
	            <input type="hidden" name="article" value="{{$delete}}">

	            <button name="delete" class="btn btn-danger" value="{{$delete->id}}">
	                <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
	            </button>

	            <button name="cancel" class="btn" value="{{$delete->id}}">
	                <i class="fa fa-btn fa-trash" title="cancel"></i> cancel
	            </button>

	        </form>

	    @endif

    </div>
@endif