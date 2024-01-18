<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                       @foreach ($books as $book)

                       <li class="items-center">
                        <div class="flex border-b justify-between items-center">
                            <div class="flex flex-col">

                                <p class="font-bold">Pealkiri:</p>
                                <a href="{{ route('books.show', $book) }}"><div class="text-2xl text-blue-700">{{$book->title}}</a></div>

                            <p class="font-bold">Hind:  <p class="text-red-600">{{$book->price}}€</p></p>
                            <p class="font-bold">Ilmumise aasta:  <p>{{$book->release_date}}</p></p>
                            <p class="font-bold">Keel:</p>
                            {{$book->language}}
                            <p class="font-bold">Raamatu tüüp:</p>
                            {{$book->type}}
                            </div>
                        <div class="grid grid-cols-2 gap-2 pt-2">
                            <a href="{{ route('books.edit', $book) }}">edit</a>
                            <form method="POST" action="{{ route('books.destroy', $book) }}">
                                @csrf
                                @method('delete')
                                <x-danger-button onclick="event.preventDefault(); this.closest('form').submit();">delete</x-danger-button>
                            </form>      
                    </div>
                    </div>
                       </li>




                    @endforeach
                    </ul>
                    
                </div>
                {{$books}}
            </div>
        </div>
    </div>
</x-app-layout>
