@extends('layouts.auth')

@section('content')
    @include('components.navbar')

    <main class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
        @if (count($posts) <= 0)
            <div class="text-center p-12 border border-gray-800 rounded-xl">
                <h1 class="text-2xl justify-center items-center font-medium">
                    Welcome to Barta. There is no post yet.
                </h1>
            </div>
        @endif

        @foreach ($posts as $post)
            <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
                <!-- Barta Card Top -->
                <header>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <img
                                    class="h-10 w-10 rounded-full object-cover"
                                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                    alt="Al Nahian" 
                                />
                            </div>

                            <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                                <a
                                    href="/profile/{{$post->user->id}}"
                                    class="hover:underline font-semibold line-clamp-1"
                                >
                                    {{$post->user->first_name . " " . $post->user->last_name}}
                                </a>

                                <a
                                    href="/profile/{{$post->user->id}}"
                                    class="hover:underline text-sm text-gray-500 line-clamp-1"
                                >
                                    {{$post->user->email}}
                                </a>
                            </div>
                        </div>

                        <!-- Card Action Dropdown -->
                        @if (auth()->user()->id === $post->user->id)
                            <div
                                class="flex flex-shrink-0 self-center"
                                x-data="{ open: false }"
                            >
                                <div class="relative inline-block text-left">
                                    <div>
                                        <button
                                            @click="open = !open"
                                            type="button"
                                            class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600"
                                            id="menu-0-button"
                                        >
                                            <span class="sr-only">Open options</span>
                                            <svg
                                                class="h-5 w-5"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                aria-hidden="true"
                                            >
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"
                                                ></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Dropdown menu -->
                                    <div
                                        x-show="open"
                                        @click.away="open = false"
                                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        role="menu"
                                        aria-orientation="vertical"
                                        aria-labelledby="user-menu-button"
                                        tabindex="-1"
                                    >
                                        <a
                                            tabindex="-1"
                                            role="menuitem"
                                            id="user-menu-item-0"
                                            href={{"/post/$post->id/edit"}}
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        >
                                            Edit
                                        </a>

                                        <form action={{"/post/$post->id"}} method="POST" class="block">
                                            @csrf
                                            @method("DELETE")

                                            <button
                                                type="submit"
                                                tabindex="-1"
                                                role="menuitem"
                                                id="user-menu-item-1"
                                                class="w-full text-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"   
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- /Card Action Dropdown -->
                    </div>
                </header>

                <!-- Content -->
                <div class="py-4 text-gray-700 font-normal">
                    <p>{{$post->description}}</p>
                </div>

                <!-- Date Created & View Stat -->
                <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
                    <span class="">6 minutes ago</span>
                    <span class="">•</span>
                    <span>450 views</span>
                    <a 
                        href="/post/{{$post->id}}" 
                        class="text-blue-600 font-medium bg-gray-100 px-2 py-0.5 rounded"
                    >
                        View Post ->
                    </a>
                </div>

                <form method="POST" action="/post/comment/{{$post->id}}">
                    @csrf
                    
                    <div class="flex">
                        <input
                            required
                            type="text"
                            name="comment"
                            placeholder="Write your comment"
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"
                        />
                        <button
                            type="submit"
                            class="max-w-[100px] justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
                        >
                            Submit
                        </button>
                    </div>
                </form>

                <div class="pt-4 flex flex-col gap-6">
                    @foreach ($post->comments as $comment)
                        <div>
                            <div class="flex items-center space-x-3">
                                <img
                                    class="h-7 w-7 rounded-full object-cover"
                                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                    alt="Al Nahian" 
                                />
    
                                <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                                    <p class="font-semibold line-clamp-1 text-sm">
                                        {{$comment->user->first_name . " " . $comment->user->last_name}}
                                    </p>
    
                                    <p class="text-gray-500 line-clamp-1 text-xs">
                                        {{$comment->user->email}}
                                    </p>
                                </div>
                            </div>

                            <div class="pl-10 pt-2">
                                <p class="text-sm">{{$comment->comment}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
        @endforeach
    </main>

    @include('components.footer')
@endsection