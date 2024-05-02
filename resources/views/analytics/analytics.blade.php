<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="text-2xl">
                    Analytics
                </div>

                <div class="mt-6 text-gray-500">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Number of Users</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $numberOfUsers }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Highest View Article</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $highestViewArticle ? $highestViewArticle->title : null }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Highest Comment Article</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $highestCommentArticle ? $highestCommentArticle->title : null}}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Number of Articles</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $numberOfArticles }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
