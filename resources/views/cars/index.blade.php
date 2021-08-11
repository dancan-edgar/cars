@extends('layouts.app')

@section('content')

    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase font-bold">
                Cars
            </h1>
        </div>

        <div class="pt-10">
            @if (auth()->user())
                <a href="cars/create"
                   class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Add a new car &rarr;
                </a>
            @endif
        </div>

        <div class="w-5/6 py-10">
            @foreach ($cars as $car)
                <div class="m-auto">

                    @if (auth()->user())
                        <div class="float-right">
                            <a href="cars/{{ $car->id }}/edit"
                               class="border-b-2 pb-2 border-dotted italic text-green-500">
                                Edit &rarr;
                            </a>

                            <form  action="/cars/{{ $car->id }}" method="POST" class="pt-3">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="border-b-2 pb-2 border-dotted italic text-red-500">
                                    Delete &rarr;
                                </button>
                            </form>
                        </div>
                    @endif

                <span class="uppercase text-blue-500 text-xs italic font-bold">
                    Founded:{{ $car->founded }}
                </span>
                    <h2 class="text-gray-700 text-5xl">
                        <a class="hover:text-gray-500" href="/cars/{{ $car->id }}"> {{ $car->name }} </a>
                    </h2>
                    <p class="text-lg text-gray-700 mt-5 leading-6">
                        {{ $car->description }}
                    </p>

                    <hr class="mt-4 mb-8">
                </div>
            @endforeach
        </div>
    </div>

@endsection
