<x-app-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-md" style="width: calc(100% - 100px); margin: 50px;">
        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf  
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md" required>
            </div>
            <div class="mt-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea id="content" name="content" rows="8" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md" required></textarea>
            </div>
            <div class="mt-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
            </div>
            <div class="mt-4">
                <x-primary-button>{{ __('Publish') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
