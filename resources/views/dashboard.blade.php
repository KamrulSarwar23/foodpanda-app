<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-pink-700 leading-tight">
            {{ __('FoodpandaApp Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-16 bg-gradient-to-br from-pink-50 to-white min-h-screen">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white rounded-2xl shadow-lg p-10 text-center space-y-6 border border-pink-100">
                <h3 class="text-3xl font-extrabold text-pink-700">
                    {{ __('Welcome to your Foodpanda Dashboard!') }}
                </h3>
                <p class="text-lg text-gray-600">
                    Here you can manage your orders, menus, and track delivery performance all in one place.
                </p>

                <div>
                    <a href="https://ecommerce-app.iconicsolutionsbd.com/ecommerce/dashboard" target="_blank"
                        class="inline-block px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition duration-200 shadow-md">
                        {{ __('Go to Ecommerce App') }}
                    </a>
                </div>

                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="inline-block mt-4 px-6 py-3 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-xl transition duration-200 shadow-md">
                    🚪 Logout
                </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
