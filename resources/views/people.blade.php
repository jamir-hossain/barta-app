@extends('layouts.auth')

@section('content')
   @include('components.navbar')

   <main class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
      <form method="POST" action="/people">
         @csrf
         
         <div class="flex">
            <input
               required
               type="text"
               name="search"
               placeholder="Search post"
               class="block w-full rounded-md border-0 px-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"
            />
            <button
               type="submit"
               class="max-w-[100px] justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
            >
               Search
            </button>
         </div>
      </form>

      @if (count($users) > 0)
         @foreach ($users as $user)
            <section
               class="bg-white border-2 p-8 border-gray-800 rounded-xl min-h-[200px] space-y-8 flex items-center flex-col justify-center"
            >
                  <!-- Profile Info -->
                  <div
                     class="flex gap-4 justify-center flex-col text-center items-center"
                  >
                     <!-- Avatar -->
                     <div class="relative">
                        @if ($user->avatar)
                           <img
                              class="w-32 h-32 rounded-full border-2 border-gray-800"
                              src="{{$user->avatar}}"
                              alt="Ahmed Shamim" 
                           />
                        @else
                           <svg
                              class="h-32 w-32 text-gray-300"
                              viewBox="0 0 24 24"
                              fill="currentColor"
                              aria-hidden="true"
                           >
                              <path
                                 fill-rule="evenodd"
                                 d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                 clip-rule="evenodd" 
                              />
                           </svg>
                        @endif
                        
                        <span class="bottom-2 right-4 absolute w-3.5 h-3.5 bg-green-400 border-2 border-white rounded-full"></span>
                     </div>
                     <!-- /Avatar -->

                     <!-- User Meta -->
                     <div>
                        <h1 class="font-bold md:text-2xl">
                              {{"$user->first_name $user->last_name"}}
                        </h1>
                        <p class="text-gray-700">Less Talk, More Code 💻</p>
                     </div>
                     <!-- / User Meta -->
                  </div>
                  <!-- /Profile Info -->

                  <!-- Profile Stats -->
                  <!--        <div-->
                  <!--          class="flex flex-row gap-16 justify-center text-center items-center">-->
                  <!--          &lt;!&ndash; Total Posts Count &ndash;&gt;-->
                  <!--          <div class="flex flex-col justify-center items-center">-->
                  <!--            <h4 class="sm:text-xl font-bold">405</h4>-->
                  <!--            <p class="text-gray-600">Posts</p>-->
                  <!--          </div>-->

                  <!--          &lt;!&ndash; Total Friends Count &ndash;&gt;-->
                  <!--          <div class="flex flex-col justify-center items-center">-->
                  <!--            <h4 class="sm:text-xl font-bold">1,334</h4>-->
                  <!--            <p class="text-gray-600">Friends</p>-->
                  <!--          </div>-->

                  <!--          &lt;!&ndash; Total Followers Count &ndash;&gt;-->
                  <!--          <div class="flex flex-col justify-center items-center">-->
                  <!--            <h4 class="sm:text-xl font-bold">18,589</h4>-->
                  <!--            <p class="text-gray-600">Followers</p>-->
                  <!--          </div>-->
                  <!--        </div>-->
                  <!-- /Profile Stats -->
            </section>
         @endforeach
      @else
         <section
            class="bg-white border-2 p-8 border-gray-800 rounded-xl min-h-[200px] space-y-8 flex items-center flex-col justify-center"
         >
            <h3>User not found</h3>
         </section>
      @endif
      
   </main>

    @include('components.footer')
@endsection