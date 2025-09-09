<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';
        $textAlign = $isRtl ? 'text-right' : 'text-left';
        $flexDirection = $isRtl ? 'flex-row' : 'flex-row';
    @endphp
    @auth

        <div class="container mx-auto px-4 py-8">
            <div class="flex justify-between items-center mb-6 {{ $flexDirection }}">
                <h1 class="text-3xl font-bold text-gray-800 {{ $textAlign }}">
                    {{ $isRtl ? 'العملاء' : 'Clients' }}
                </h1>
                <a href="{{ route('clients.create', ['lang' => app()->getLocale()]) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ $isRtl ? 'إضافة عميل جديد' : 'Add New Client' }}
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 {{ $textAlign }}">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="px-6 py-3 {{ $textAlign }} text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ $isRtl ? 'الاسم (العربية)' : 'Name (Arabic)' }}
                            </th>
                            <th
                                class="px-6 py-3 {{ $textAlign }} text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ $isRtl ? 'الاسم (الإنجليزية)' : 'Name (English)' }}
                            </th>
                            <th
                                class="px-6 py-3 {{ $textAlign }} text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ $isRtl ? 'الفئة' : 'Category' }}
                            </th>
                            <th
                                class="px-6 py-3 {{ $textAlign }} text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ $isRtl ? 'الحالة' : 'Status' }}
                            </th>
                            <th
                                class="px-6 py-3 {{ $textAlign }} text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ $isRtl ? 'الإجراءات' : 'Actions' }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($clients as $client)
                            <tr>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 {{ $textAlign }}">
                                    {{ $client->name_ar }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $textAlign }}">
                                    {{ $client->name_en }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $textAlign }}">
                                    {{ $isRtl ? $client->category_ar : $client->category_en }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $textAlign }}">
                                    <span
                                        class="px-2 py-1 text-xs font-semibold rounded-full {{ $client->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $client->status ? ($isRtl ? 'نشط' : 'Active') : ($isRtl ? 'غير نشط' : 'Inactive') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium {{ $textAlign }}">
                                    <a href="{{ route('clients.edit', ['lang' => app()->getLocale(), 'client' => $client]) }}"
                                        class="text-yellow-600 hover:text-yellow-900 mr-3">
                                        {{ $isRtl ? 'تعديل' : 'Edit' }}
                                    </a>
                                    <form
                                        action="{{ route('clients.destroy', ['lang' => app()->getLocale(), 'client' => $client]) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('{{ $isRtl ? 'هل أنت متأكد؟' : 'Are you sure?' }}')">
                                            {{ $isRtl ? 'حذف' : 'Delete' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $clients->links() }}
            </div>
        </div>
    @endauth
    @guest
        {{-- cards images --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($clients as $client)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ $client->image_url }}" alt="{{ $client->name }}">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold">{{ $client->name }}</h2>
                        <p class="text-gray-600">{{ $client->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endguest
</x-master-layout>
