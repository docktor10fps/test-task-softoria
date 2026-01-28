<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEO Rank Checker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <form action="{{ route('search.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Пошукове слово</label>
            <input type="text" name="keyword" value="{{ old('keyword') }}" required class="w-full border rounded-md p-2 mt-1">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Назва сайту (домен)</label>
            <input type="text" name="target_site" value="{{ old('target_site') }}" required placeholder="example.com" class="w-full border rounded-md p-2 mt-1">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Локація</label>
                <input type="text" name="location_name" value="{{ old('location_name', 'Ukraine') }}" required class="w-full border rounded-md p-2 mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Мова</label>
                <input type="text" name="language_name" value="{{ old('language_name', 'Ukrainian') }}" required class="w-full border rounded-md p-2 mt-1">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Глибина пошуку (Depth)</label>
            <select name="depth" class="w-full border rounded-md p-2 mt-1">
                <option value="10" selected>TOP 10</option>
                <option value="50">TOP 50</option>
                <option value="100">TOP 100</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-md hover:bg-blue-700 transition">
            Пошук
        </button>
    </form>

    @if(isset($searched))
        <div class="mt-8 p-4 border-t">
            <h2 class="text-lg font-semibold mb-2">Результат пошуку для: {{ $targetSite }}</h2>
            @if($rank)
                <div class="bg-green-100 text-green-800 p-4 rounded-md">
                    Сайт знайдено на <strong>{{ $rank }}</strong> позиції в органічній видачі.
                </div>
            @else
                <div class="bg-red-100 text-red-800 p-4 rounded-md">
                    Сайт не знайдено в межах обраної глибини пошуку.
                </div>
            @endif
        </div>
    @endif

    @if ($errors->any())
        <div class="mt-4 p-4 bg-red-50 text-red-600 rounded-md">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
</body>
</html>
