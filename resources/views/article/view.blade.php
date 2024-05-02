<x-app-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div>
            @if($article->image)
            <div class="p-4">
                <img src="{{ url('uploads/' . $article->image) }}" alt="Article Image" class="rounded-lg" style="max-width: 500px; max-height: 500px;">
            </div>
            @endif
            <div class="flex-grow p-4">
                <div class="flex justify-between">
                    <div>
                        <h1 class="text-3xl my-4">{{ ucfirst($article->title) }}</h1>
                        <p class="text-gray-800">{!! $article->content !!}</p>
                    </div>
                    <div>
                    @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->id === $article->user_id))
                        <x-primary-button onclick="editArticle({{ $article->id }})">{{ __('Edit') }}</x-primary-button>
                    @endif
                    </div>
                </div>
            </div>
        </div>    
        <!-- Existing Comments -->
        <div class="mt-6">
                    <h2 class="text-xl font-semibold">Comments</h2>
                    @foreach($article->comments as $comment)
                    <div class="mt-2">
                        <p class="text-gray-700"><strong>{{ $comment->user->name }}:</strong> {{ $comment->body }}</p>
                    </div>
                    @endforeach
                </div>
                
                <!-- Add Comment Form -->
                <div class="mt-6">
                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <textarea name="body" rows="3" class="w-full border rounded-md p-2" placeholder="Add a comment..." required></textarea>
                        <x-primary-button>{{ __('Add Comment') }}</x-primary-button>
                    </form>
                </div>
    </div>
</x-app-layout>

<script>
    function editArticle(articleId) {
        window.location.href = "{{ url('article') }}/" + articleId + "/edit";
    }
</script>