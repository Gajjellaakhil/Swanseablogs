<x-app-layout>
    <div class="w-2/3 mt-8" style="width: calc(100% - 100px); margin: 50px;">
        <div class="grid grid-cols-2 sm:grid-cols-2 gap-6">
            @foreach($articles as $key => $value)
            <div class="bg-white shadow-md rounded-lg overflow-hidden" style="border: 1px solid darkblue;">
                <div class="px-6 py-4">
                    <div class="font-medium text-gray-900 mb-2">
                        <a href="/article/{{ $value->id }}" class="block text-blue-600 hover:underline">
                            {{ ucfirst($value->title) }}
                        </a>
                    </div>
                    <p class="text-gray-700 text-sm">
                        Posted by: {{ $value->user->name }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-5">
          <div>My Comments</div>
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-6">
              @foreach($comments as $comment)
              <div class="bg-white shadow-md rounded-lg overflow-hidden" style="border: 1px solid darkblue;">
                  <div class="px-6 py-4">
                      <div class="font-medium text-gray-900 mb-2">
                          <a href="{{ route('article.view', $comment->article->id) }}" class="block text-blue-600 hover:underline">
                              {{ ucfirst($comment->article->title) }}
                          </a>
                      </div>
                      <p class="text-gray-700 text-sm">
                          {{ $comment->content }}
                      </p>
                  </div>
              </div>
              @endforeach
          </div>
        </div>
    </div>
</x-app-layout>
