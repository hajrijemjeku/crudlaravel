<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(key: 'Homepage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if($posts && $posts->count())
                    <table class="table table-bordered w-75 mx-auto">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Content</th>
                            <th>CreatedAt</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name  }}</td>
                                <td>{{ $post->content  }}</td>
                                <td>{{ $post->created_at  }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div class=" mx-auto w-75 my-5 d-flex justify-content-around">
                        {{ $posts->links() }}
                    </div>
                    @else
                        <div class="alert alert-info m-2">
                            <h3>0 posts.</h3>
                        </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
