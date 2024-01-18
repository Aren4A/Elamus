<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                       @foreach ($orders as $order)
                       <li class="items-center">
                        <div class="flex border-b justify-between items-center">
                            <div class="flex flex-col">
                                <p class="font-bold">Delivery address:</p>
                            <p>{{$order->delivery_address}}</p>
                            <p class="font-bold">Order date:</p>
                            {{$order->order_date}}
                            <p class="font-bold">Status:</p>
                            {{$order->status}}
                            </div>
                        <div class="grid grid-cols-2 gap-2 pt-2">       
                    </div>
                    </div>
                       </li>
                    @endforeach
                    </ul>
                    
                </div>
                {{$orders}}
            </div>
        </div>
    </div>
</x-app-layout>
