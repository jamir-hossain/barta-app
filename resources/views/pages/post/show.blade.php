@extends('layouts.auth')

@section('content')
    @include('components.navbar')

    <main class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
        <section id="newsfeed" class="space-y-6">
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
                </div>

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
        </section>
    </main>
@endsection