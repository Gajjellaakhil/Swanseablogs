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
                        Posted by:
                        <a href="/articles/user/{{ $value->user->id }}" class="text-blue-600 hover:underline">
                            {{ $value->user->name }}
                        </a>
                    </p>
                    <p class="text-gray-700 text-xs mt-3">{{ strftime("%d %b %Y",strtotime($value->created_at)) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="flex justify-center items-center mt-10">
            {!! $articles->links() !!}
        </div>
    </div>
</x-app-layout>
