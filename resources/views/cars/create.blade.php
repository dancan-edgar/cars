@extends('layouts.app')

@section('content')

    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase font-bold">
                Create Car
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/cars" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block">
                <input type="file" class="block shadow-5xl mb-10 p-2 w-80 italic" name="image">
            </div>
            <div class="block">
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic" name="name" placeholder="Brand name...">
            </div>
            <div class="block">
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic" name="founded" placeholder="Founded...">
            </div>
            <div class="block">
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic" name="description" placeholder="Description...">
            </div>

            <button type="submit" class="bg-green-500 block shadow-5xl mb-2 p-2 w-80 uppercase font-bold">
                Submit
            </button>
        </form>
    </div>

    <div class="w-1/2 mx-auto">
        @foreach ($errors->all() as $error)
            <p class="ml-2/5 text-red-500">{{ $error }}</p>
        @endforeach
    </div>

@endsection
