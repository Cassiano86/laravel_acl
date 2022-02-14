@if(isset($caminhos))
	<nav aria-label="breadcrumb" class='bg-primary p-2'>
		<ol class="breadcrumb mb-0">
			@foreach($caminhos as $caminho)
				@if($caminho['url'])
					<li class="breadcrumb-item">
						<a href="{{route($caminho['url'])}}" class="text-white">{{$caminho['titulo']}}</a>
					</li>
				@else
					<li class="breadcrumb-item">
						<span class="text-white">{{$caminho['titulo']}}</span>
					</li>
				@endif
			@endforeach
		</ol>
	</nav>
@endif
	
{{-- <div class="row">
	<nav>
		<div class="nav-wrapper bg-primary">
		  <div class="col s12 p-1">
		  	@if(isset($caminhos))
			  	@foreach($caminhos as $caminho)
				  	@if($caminho['url'])
				    	<a href="{{$caminho['url']}}" class="breadcrumb h5 text-white">{{$caminho['titulo']}}</a>
				    @else
				    	<span class="breadcrumb">{{$caminho['titulo']}}</span>
				    @endif
			    @endforeach
		    @endif
		  </div>
		</div>
	</nav>
</div> --}}