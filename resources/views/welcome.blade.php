@extends('template')
@section('title')
    {{--  {{ Auth::user()->name }}   --}}
@endsection

@section('content')

<div class="md:flex md:items-center md:justify-between   ">
    <div class="container flex justify-center mb-4 md:block md:mb-0">
        <img src="{{ asset('storage/LA ROSCA.svg') }}" alt="Logo Rosca" class="rounded-t-lg object-cover w-full h-16 md:w-auto" style="aspect-ratio:300/200; object-fit: contain;" />
    </div>

        <div class="container flex justify-center mb-4 md:justify-start md:mb-0">
            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-md ocus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10   bg-gray-300 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-50 dark:focus:ring-gray-200 dark:focus:ring-offset-gray-500  ">
                Administrar
            </a>
        </div>

    <section class="bg-white py-0  md:py-0 w-full  pr-1 mr-2    -mt-2  ">
        <div class="container flex items-center justify-center md:justify-end">
            <form action="{{ route('welcome') }}" method="GET" class="flex items-center gap-2 w-full max-w-md md:max-w-sm">
                <div class="relative w-full ">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500 dark:text-gray-400"
                    >
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input
                        class="flex h-10 bg-background px-3 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 pl-10 pr-4 py-2 rounded-md border border-gray-300 focus:border-gray-500 focus:ring-gray-500 focus:ring-1     dark:border-gray-700 dark:focus:border-gray-600 dark:focus:ring-gray-600 w-full"
                        placeholder="Buscar productos..."
                        type="search"
                        name="search" />
                </div>
                <button
                    class="whitespace-nowrap ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 inline-flex items-center justify-center rounded-md bg-gray-300 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-50 dark:focus:ring-gray-200 dark:focus:ring-offset-gray-500"
                    type="submit"
                >
                    Buscar
                </button>
            </form>
        </div>
    </section>
</div>

    <div class="container mx-auto px-4 p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 ">
        @forelse ($products as $product)
            <div class="rounded-lg border bg-card text-card-foreground    " data-v0-t="card">
                <img src="{{ asset('storage/' . $product->imagen) }}" {{-- alt="{{ $product->id }}" --}} width="300" height="200" class="rounded-t-lg object-cover w-full h-48" style="aspect-ratio:300/200; object-fit: contain;"/>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">{{ $product->nombre }}</h3>
                    <p class="text-gray-600 mb-4">{{ $product->descripcion }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-900 font-bold">${{ $product->precio }}</span>
                         <p>stock <b>30</b></p>
                        <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium   ">Editar</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center py-4">No se encontraron productos.</p>
        @endforelse
    </div>

    @livewireScripts()
</body>
</html>
@endsection
