@extends('layouts.auth')

@section('content')
    @include('components.navbar')

    <main class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
        <form 
            method="POST"
            action="/post" 
            enctype="multipart/form-data"
            class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6" 
        >
            @csrf

            <h5 class="font-medium text-xl">Create New Post</h5>

            <div class="mt-6">
                <label class="block text-sm font-medium leading-6 text-gray-900">
                    Post Image
                </label>
                <div class="mt-2">
                    <input
                        id="image"
                        name="image"
                        type="file"
                        autocomplete="image"
                        placeholder="bruce@wayne.com"
                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"
                    />
                </div>
                @error('image')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-6">
                <label
                    for="description"
                    class="block text-sm font-medium leading-6 text-gray-900"
                >
                    Post Description
                </label>
                <div class="mt-2">
                    <textarea
                        rows="3"
                        id="description"
                        name="description"
                        placeholder="Write your post here..."
                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6"
                    ></textarea>
                    @error('description')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <button
                type="submit"
                class="mt-8 flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
            >
                Submit Post
            </button>
        </form>
    </main>
@endsection