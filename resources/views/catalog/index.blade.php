<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Чудо Обувь - Каталог</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-600 text-white p-4 shadow">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="/" class="font-bold text-xl">👟 Чудо Обувь</a>
            
            <div class="flex items-center space-x-4">
                <a href="{{ route('catalog') }}" class="hover:underline">Каталог</a>
                
                @auth
                    <span class="text-blue-200 text-sm">Привет, {{ auth()->user()->name }}!</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 px-3 py-1 rounded text-sm hover:bg-red-600">Выйти</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-white text-blue-600 px-4 py-1 rounded font-semibold hover:bg-gray-100">Войти</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto p-4 mt-6">
        <h1 class="text-3xl font-bold mb-6">Наш каталог</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-xl font-bold text-gray-800">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-500 mb-2">Категория: {{ $product->category->name }}</p>
                    <p class="text-lg font-bold text-blue-600">{{ $product->price }} ₽</p>
                    
                    <div class="mt-4">
                        <p class="text-sm font-semibold mb-1">Доступные размеры:</p>
                        <div class="flex gap-2">
                            @foreach($product->variants as $variant)
                                @if($variant->stock_quantity > 0)
                                    <span class="bg-gray-200 px-2 py-1 rounded text-sm">{{ $variant->size }}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>