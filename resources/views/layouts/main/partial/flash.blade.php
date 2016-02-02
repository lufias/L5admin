 @if (session('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{session('success')}}</p>
    </div>
@endif  

@if (session('error'))
	<div class="alert alert-warning">
		<p>{{session('error')}}</p>
	</div>
@endif