<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ühe raamatu vaade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        <div class="flex flex-col my-4">
                        <x-input-label for="title" value="Pealkiri" />
                            <p class="text-2xl">{{ old('title', $book->title) }}</p>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        </div>
                        <div class="flex flex-col my-4">
                            <p class="text-2xl w-24"><img src="{{ old('title', $book->cover_path) }}" alt=""></p>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        </div>
                        <div class="flex flex-col my-4">
                        <x-input-label for="price" value="Hind" />
                            {{ old('price', $book->price) }}
                        </div>
                        <div class="flex flex-col my-4">
                        <x-input-label for="release_date" value="Ilmumise aasta" />
                            {{ old('release_date', $book->release_date) }}
                        </div>
                        <div class="flex flex-col my-4">
                        <x-input-label for="language" value="Keel" />
                            {{ old('language', $book->language) }}
                        </div>
                        <div class="flex flex-col my-4">
                        <x-input-label for="type" value="Raamatu tüüp" />
                            {{ old('type', $book->type) }}
                        </div>
                        <div class="flex flex-col my-4">
                        <x-input-label for="summary" value="Lühikokkuvõte" />
                            {{ old('summary', $book->summary) }}
                        </div>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
