@extends('main') @section('content')
<div class="flex items-center justify-center h-screen gap-10">
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 h-[32.6rem] flex justify-center items-center">
        <div class="flex flex-col items-center pb-10">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover" src="https://st.depositphotos.com/1269204/2716/i/450/depositphotos_27167511-stock-photo-smiling-middle-aged-man.jpg" alt="Bonnie image" />
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                Bonnie Green
            </h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
            <div class="flex mt-4 space-x-3 md:mt-6">
                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View more</a>
                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</a>
            </div>
        </div>
    </div>

    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" method="POST" action="{{ route('contact.send') }}">
            @csrf
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">
                Contact form
            </h5>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Your email
                </label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="example@gmail.com" required />
            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Your name
                </label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Name" required />
            </div>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Message
                </label>
                <textarea id="message" name="message" rows="3" class="block p-2.5 w-full resize-none text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            </div>
            @error('message')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Send
            </button>
        </form>
    </div>
</div>
@endsection('content')