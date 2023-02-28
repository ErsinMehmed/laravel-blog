<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Blog</title>

    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-gray-50">
    <header>
        <nav class="flex justify-end bg-gray-50 border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex items-center lg:order-2">
                    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                        <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:font-semibold md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                            <li>
                                <a href="/" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('posts.index') }}" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                    Posts
                                </a>
                            </li>
                            <li>
                                <a href="/about" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="/contact" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                    Contacts
                                </a>
                            </li>
                        </ul>
                    </div>
                    @guest
                    <div>
                        <a href="{{ route('login') }}" class="hover:underline text-slate-800 hover:text-slate-600 transition-all font-semibold">
                            Login
                        </a>
                    </div>
                    <div class="ml-2.5">
                        <a href="{{ route('registration') }}" class="hover:underline text-slate-800 hover:text-slate-600 transition-all font-semibold">
                            Register
                        </a>
                    </div>
                    @else
                    <div class="ml-2.5">
                        <a href="{{ route('logout') }}" class="hover:underline text-slate-800 hover:text-slate-600 transition-all font-semibold">
                            Logout
                        </a>
                    </div>
                    @endguest
                </div>
            </div>
        </nav>
    </header>

    <main>@yield('content')</main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>