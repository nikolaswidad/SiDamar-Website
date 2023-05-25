@extends('layouts.main')

@section('container')
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
        <div>

            @if (session()->has('loginError'))
            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-500" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div>
                    {{ session('loginError') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
              </div>
              
            @endif

            <h2 class="my-6 text-center text-3xl font-bold tracking-tight text-primary">Login ke Akunmu!</h2>
            <img src="/login/1.jpg" alt="" class="object-cover object-left h-24 w-full rounded-lg">
        </div>
        <form class="mt-8 space-y-4" action="/login" method="POST">
        @csrf
        {{-- <input type="hidden" name="remember" value="true"> --}}
        <div class="-space-y-px rounded-md shadow-sm">
            <div class="py-4">
                <label for="email" class="block text-gray-700 text-lg font-bold mb-2">Email</label>
                <label for="email-address" class="sr-only">Email address</label>
                <input id="email-address" name="email" type="email" autocomplete="email" autofocus required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-primary focus:outline-none focus:ring-prborder-primary sm:text-sm @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div>
                <label for="password" class="block text-gray-700 text-lg font-bold mb-2">Password</label>
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-primary focus:outline-none focus:ring-prborder-primary sm:text-sm @error('password') is-invalid @enderror" placeholder="Password">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            </div>

            <div class="flex items-center justify-between">
            {{-- <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primaryDarken focus:ring-prborder-primary">
                <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
            </div> --}}

            </div>

            <div>
            <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-lg font-medium text-white hover:bg-primaryDarken focus:outline-none focus:ring-2 focus:ring-primaryLighten focus:ring-offset-2">
                Sign in
            </button>
        </div>
        </form>
        </div>
    </div>
@endsection

