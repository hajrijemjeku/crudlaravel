<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if($errors->any())
                    <div class="alert alert-info">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('posts.store') }}" method="post" class="p-3">
                    @csrf
                    <!-- <input type="hidden" value="{{ auth()->id() }}"> -->
                    <div class="form-group pt-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group pt-3">
                        <label for="content" class="form-label">Content</label>
                        <input type="text" class="form-control" name="content" id="content" placeholder="Content" value="{{ old('content') }}">
                    </div>
                    <button type="submit" class="btn btn-md btn-success mt-3" name="save">Save</button>
                </form>              
            </div>
        </div>
    </div>
</x-app-layout>
