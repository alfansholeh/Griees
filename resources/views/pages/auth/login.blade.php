@extends("layouts.blank")
@section("content")
    <main class="flex-grow h-screen flex flex-col gap-4 items-center justify-center">
        <h1 class="font-bold text-3xl">Login</h1>
        <div class="bg-primary rounded-full p-2">
            <img src="/images/logo.png" alt="">
        </div>
        <form action="/login" method="POST" class="flex flex-col gap-2">
            @include("components.popup")
            @csrf
            <label for="email">Email</label><input class="form-input" type="email" name="email" id="email"
                                                   placeholder="Email">
            <label for="password">Password</label><input class="form-input" type="password" name="password"
                                                         id="password"
                                                         placeholder="Password">
            <button type="submit" class="bg-primary font-bold text-white py-2 rounded-full">Masuk</button>
        </form>
    </main>
@stop
