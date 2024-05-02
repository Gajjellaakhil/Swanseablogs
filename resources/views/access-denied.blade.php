<x-app-layout>
    <div class="mb-4 text-sm text-gray-600">
        Sorry, you are not authorized to view this page.
    </div>

    <div class="mt-4 flex items-center justify-between">
        <a href="{{ route('articles') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
            {{ __('Go back to articles') }}
        </a>
    </div>
</x-app-layout>
