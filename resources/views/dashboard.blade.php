<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ config('app.name', 'Laravel') }} • Dashboard{{ request()->segment(2) ? ' • '.Str::ucfirst(request()->segment(2)) : '' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

				@tab('articles')
					<div class="p-6 bg-white border-b border-gray-200">
						<link rel="stylesheet" href="css/iziModal.min.css">

						<div class="modal-btn-group flex flex-wrap sticky top-0">
							<!-- <a class="p-4 text-justify items-center -ml-px text-sm font-medium text-white bg-gray-700 border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-500" href="#" data-izimodal-open="#addModal" data-izimodal-transitionin="fadeInDown">Ajouter un post</a> -->
							<a class="p-4 text-justify items-center -ml-px text-sm font-medium text-white bg-gray-700 rounded border border-gray-300 leading-5 hover:text-green-500 hover:bg-gray-800 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-500" href="#" data-izimodal-open="#addModal" data-izimodal-transitionin="fadeInDown">Ajouter un post</a>
						</div>
						
						<div id="addModal" class="hidden">
							<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
								<div class="p-6 bg-white border-b border-gray-200">
									<form method="POST" action="{{ route('dashboard', 'articles') }}">
										@csrf

										<h1>Updating</h1>
							
										<!-- Topic -->
										<div class="mt-4">
											<x-label for="topic" :value="__('Topic')" />
											<x-input id="topic" class="block mt-1 w-full" type="text" name="topic" :value="old('topic')" required autofocus />
										</div>
				
										<!-- Description -->
										<div class="mt-4">
											<x-label for="description" :value="__('Description')" />
											<x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
										</div>
							
										<div class="flex items-center justify-end mt-4">            
											<x-button class="ml-4">
												{{ __('Send') }}
											</x-button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div id="modModal" class="hidden">
							<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
								<div class="p-6 bg-white border-b border-gray-200">
									<form method="POST" action="{{ route('dashboard', 'articles') }}">
										@csrf

										<h1>Updating</h1>
							
										<!-- Topic -->
										<div class="mt-4">
											<x-label for="topic" :value="__('Topic')" />
											<x-input id="topic" class="block mt-1 w-full" type="text" name="topic" :value="old('topic')" required autofocus />
										</div>
				
										<!-- Description -->
										<div class="mt-4">
											<x-label for="description" :value="__('Description')" />
											<x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
										</div>
							
										<div class="flex items-center justify-end mt-4">            
											<x-button class="ml-4">
												{{ __('Send') }}
											</x-button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div id="delModal" class="hidden">
							<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
								<div class="p-6 bg-white border-b border-gray-200">
									<form method="POST" action="{{ route('dashboard', 'articles') }}">
										@csrf
							
										<!-- Topic -->
										<div class="mt-4">
											<x-label for="topic" :value="__('Topic')" />
											<x-input id="topic" class="block mt-1 w-full" type="text" name="topic" :value="old('topic')" required autofocus />
										</div>
				
										<!-- Description -->
										<div class="mt-4">
											<x-label for="description" :value="__('Description')" />
											<x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
										</div>
							
										<div class="flex items-center justify-end mt-4">            
											<x-button class="ml-4">
												{{ __('Send') }}
											</x-button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
						<script src="{{ asset('js/iziModal.min.js') }}"></script>
						<script>
							$("#addModal").iziModal();
							$("#modModal").iziModal();
							$("#delModal").iziModal();

							// $(document).on('click', '[data-m-open]', function(e) {
							// 	e.preventDefault();
							// 	$(this.dataset.mOpen)
							// 	.data('href', this.href) // update data
							// 	.iziModal('open');
							// });
						</script>

						<style>
							/* .modal-btn-group, .posts { display: flex; flex-wrap: wrap; } */
							.modal-btn-group a, .post {
								display: flex; flex-direction: column; flex: calc(100%/1); justify-content: space-between;
								/* padding: 10px; text-align: justify;	 */
							}
							/* .post small { align-self: flex-end; } */
						</style>

						<div class="posts flex flex-wrap">
							@foreach ($articles as $article)
								<div class="post flex flex-col justify-between p-4 text-justify">
									<h2 class="self-center mb-6">
										<b><a href="{{ route('articles.show', $article->id) }}">{{ $article->topic }}</a></b> de {{ $article->user->name }}
									</h2>
									<a href="{{ route('articles.show', $article->id) }}" class="mb-2">
									@php $str = preg_replace( "/\n\s+/", "\n", rtrim(html_entity_decode(str_replace("&nbsp;", '', strip_tags($article->description)))) ) @endphp
										<div>@truncate($str, 150)</div>
									</a>
									<small class="self-end mb-6"><b>Tags</b> : <i>{{ $article->tags }}</i></small>
									<hr>
								</div>
							@endforeach
						</div>{{ $articles->links() }}
					</div>
				@endtab
            </div>
        </div>
    </div>
</x-app-layout>
