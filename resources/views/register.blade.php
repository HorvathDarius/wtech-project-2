@extends('layout.app')
@section('content')
  <section class="flex justify-center">
    <section class="flex flex-col items-center p-2 gap-4">
    <!-- LOGO -->
    <div class="w-30 h-30">
      <img src="/images/Logo.png" alt="StringShop logo" />
    </div>
    <div class="flex flex-col">
      <h1 class="w-full h-10 text-center">Welcome to StringShop</h1>
      <h2 class="font-bold">SIGN UP WITH YOUR EMAIL ADDRESS</h2>
    </div>

    <!-- REGISTER FORM -->
    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-8">
      @csrf
      <div class="flex flex-col gap-2">
        <label for="name">Your Name <span class="text-red-600">*</span></label>
        <input id="name" name="name" type="text" class="w-80 h-10 bg-gray-200 rounded-sm" required />
        <label for="email">E-mail <span class="text-red-600">*</span></label>
        <input id="email" name="email" type="text" class="w-80 h-10 bg-gray-200 rounded-sm" required />
        <label for="password">Password <span class="text-red-600">*</span></label>
        <input id="password" name="password" type="password" class="w-80 h-10 bg-gray-200 rounded-sm" required />
        <label for="confirm-password">Confirm password <span class="text-red-600">*</span></label>
        <input id="confirm-password" name="confirm-password" type="password" class="w-80 h-10 bg-gray-200 rounded-sm"
            required />
        </div>
        <button type="submit" class="bg-primary w-80 h-10 rounded-md text-white cursor-pointer">Register</button>
    </form>
    <p>
      Already have an account?
      <span class="font-bold text-primary">
      <a href="login.html"> Sign in now </a>
      </span>
    </p>
    </section>
  </section>
@endsection
