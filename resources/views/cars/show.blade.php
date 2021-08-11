@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">

        <div class="text-center">
            <h1 class="text-5xl uppercase font-bold">
                {{ $car->name }}
            </h1>
        </div>
        <div class="w-5/6 py-10">
                <div class="m-auto">
                    <img class="float-left mx-auto my-3 md:m-3 lg:w-1/3 shadow-xl mt-5" src="{{ asset('images/'. $car->image_path) }}" alt="Car Image">
                    <span class="uppercase text-blue-500 text-xs italic font-bold">
                    Founded:{{ $car->founded }}
                    </span>
                    <p class="text-lg text-gray-700 leading-6 my-5">
                        {{ $car->description }}
                    </p>

                    <table class="table-auto mx-auto mt-4">
                        <tr class="bg-blue-100">
                            <th class="w-1/4 border-4 bg-gray-500">
                                Model
                            </th>
                            <th class="w-1/4 border-4 bg-gray-500">
                                Engines
                            </th>
                            <th class="w-1/4 border-4 bg-gray-500">
                                Production Date
                            </th>
                        </tr>

                        @forelse ($car->carModels as $model)
                            <tr>
                                <td class="border-4 bg-gray-500">
                                    {{ $model->model_name }}
                                </td>
                                <td class="border-4 bg-gray-500">
                                    @foreach ($car->engines as $engine)
                                        @if ($model->id == $engine->model_id)
                                            {{ $engine->engine_name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="border-4 bg-gray-500">
                                    {{ date('d-m-Y',strtotime($car->productionDate->created_at)) }}
                                </td>
                            </tr>
                        @empty
                            <p class="text-center text-red-500 italic">No car models found.</p>
                        @endforelse

                    </table>


                    <p class="text-center text-gray-700">
                        <span class="font-bold">Products: </span>
                        @forelse ($car->products as $product)
                            <span class="italic block text-center ml-1/2">{{ $product->name }}</span>
                        @empty
                            No products found!
                        @endforelse
                    </p>
                    <hr class="mt-4 mb-8">
                </div>
        </div>
    </div>
@endsection
