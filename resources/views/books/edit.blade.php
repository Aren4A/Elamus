<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('books.update', $book) }}">
                        @csrf
                        @method('patch')
                        <div class="flex flex-col my-4">
                        <x-input-label for="title" value="Pealkiri" />
                        <x-text-input name="title" value="{{ old('title', $book->title) }}" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        </div>
                        <div class="flex flex-col my-4">
                        <x-input-label for="price" value="Hind" />
                        <x-text-input name="price" value="{{ old('price', $book->price) }}" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <div class="flex flex-col my-4">
                        <x-input-label for="release_date" value="Ilmumise aasta" />
                        <x-text-input name="release_date" value="{{ old('release_date', $book->release_date) }}" />
                        <x-input-error :messages="$errors->get('release_date')" class="mt-2"/>
                        </div>
                        <div class="flex flex-col my-4">
                        <x-input-label for="language" value="Keel" />
                        <x-text-input name="language" value="{{ old('language', $book->language) }}" />
                        <x-input-error :messages="$errors->get('language')" class="mt-2"/>
                        </div>
                        <div class="flex flex-col my-4">
                        <x-input-label for="type" value="Raamatu tüüp" />
                        <select name="type" class="block w-full pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-left text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out">
                            <option value="new" {{ $book->type == "new" ? "selected" : "" }}>new</option>
                            <option value="used" {{ $book->type == "used" ? "selected" : "" }}>used</option>
                            <option value="ebook" {{ $book->type == "ebook" ? "selected" : "" }}>ebook</option>
                        </select>
                        </div>
                        <div class="mt-4 space-x-2">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <a href="{{ route('books.index') }}">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>



                
                    <div class="p-6 text-gray-900">
                        <x-input-label class="text-2xl" value="Autorid:"></x-input-label>
                    @foreach ($book->authors as $author)
                         <div class="flex border-b justify-between items-center">
                         <p>{{$author->first_name}} {{$author->last_name}}</p>
                         <div class="pt-2">

                             <form method="POST" action="{{ route('book.detach.author', $book) }}">
                                 @csrf
                                 @method('delete')
                                 <input type="hidden" name="author_id" value="{{ $author->id }}">
                                 <x-danger-button onclick="event.preventDefault(); this.closest('form').submit();">delete</x-danger-button>
                             </form>
                         </div>
                     </div>
                     @endforeach

                     <form method="POST" action="{{ route('book.attach.author', $book) }}">
                        @csrf
                        @method('post')

                        <div class="flex flex-col my-4">
                        <x-input-label for="author_id" value="Lisa uus autor:" />
                        <select id="author_id" name="author_id" class="block w-full pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-left text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out">
                            <option></option>
                            @foreach ($authors as $author)
                            <option value="{{ $author->id }}"> {{ $author->first_name }} {{ $author->last_name }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="mt-4 space-x-2">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                    
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
