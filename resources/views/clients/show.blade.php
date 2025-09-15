<x-master-layout>
    @php
        $isRtl = app()->getLocale() === 'ar';
        $textAlign = $isRtl ? 'text-right' : 'text-left';
        $flexDirection = $isRtl ? 'flex-row-reverse' : 'flex-row';
    @endphp

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800 {{ $textAlign }}">
                    {{ $isRtl ? 'تفاصيل العميل' : 'Client Details' }}
                </h1>
                <div class="flex space-x-2 {{ $isRtl ? 'space-x-reverse' : '' }}">
                    <a href="{{ route('clients.edit', ['lang' => app()->getLocale(), 'client' => $client]) }}"
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        {{ $isRtl ? 'تعديل' : 'Edit' }}
                    </a>
                    <a href="{{ route('clients.index', ['lang' => app()->getLocale()]) }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        {{ $isRtl ? 'رجوع' : 'Back' }}
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Client Image -->
                    <div class="md:col-span-2 flex justify-center">
                        @if ($client->image)
                            <img src="{{ asset('storage/' . $client->image) }}"
                                alt="{{ $isRtl ? $client->name_ar : $client->name_en }}"
                                class="w-48 h-48 object-cover rounded-lg shadow-md">
                        @else
                            <div class="w-48 h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <span class="text-gray-500">{{ $isRtl ? 'لا توجد صورة' : 'No Image' }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- English Information -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4 {{ $textAlign }} border-b pb-2">
                            {{ $isRtl ? 'المعلومات باللغة الإنجليزية' : 'English Information' }}
                        </h3>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}">
                                {{ $isRtl ? 'الاسم' : 'Name' }}
                            </label>
                            <p class="text-gray-800 {{ $textAlign }}">{{ $client->name_en }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}">
                                {{ $isRtl ? 'الوصف' : 'Description' }}
                            </label>
                            <p class="text-gray-800 {{ $textAlign }} whitespace-pre-wrap">
                                {{ $client->description_en }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}">
                                {{ $isRtl ? 'الفئة' : 'Category' }}
                            </label>
                            <p class="text-gray-800 {{ $textAlign }}">{{ $client->category_en }}</p>
                        </div>
                    </div>

                    <!-- Arabic Information -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4 {{ $textAlign }} border-b pb-2">
                            {{ $isRtl ? 'المعلومات باللغة العربية' : 'Arabic Information' }}
                        </h3>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}">
                                {{ $isRtl ? 'الاسم' : 'Name' }}
                            </label>
                            <p class="text-gray-800 {{ $textAlign }}">{{ $client->name_ar }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}">
                                {{ $isRtl ? 'الوصف' : 'Description' }}
                            </label>
                            <p class="text-gray-800 {{ $textAlign }} whitespace-pre-wrap">
                                {{ $client->description_ar }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}">
                                {{ $isRtl ? 'الفئة' : 'Category' }}
                            </label>
                            <p class="text-gray-800 {{ $textAlign }}">{{ $client->category_ar }}</p>
                        </div>
                    </div>

                    <!-- Common Information -->
                    <div class="md:col-span-2">
                        <h3 class="text-xl font-semibold mb-4 {{ $textAlign }} border-b pb-2">
                            {{ $isRtl ? 'معلومات عامة' : 'General Information' }}
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}">
                                    {{ $isRtl ? 'الحالة' : 'Status' }}
                                </label>
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full {{ $client->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $client->status ? ($isRtl ? 'نشط' : 'Active') : ($isRtl ? 'غير نشط' : 'Inactive') }}
                                </span>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}">
                                    {{ $isRtl ? 'تاريخ الإنشاء' : 'Created At' }}
                                </label>
                                <p class="text-gray-800 {{ $textAlign }}">
                                    {{ $client->created_at->format('Y-m-d H:i') }}</p>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2 {{ $textAlign }}">
                                    {{ $isRtl ? 'آخر تحديث' : 'Last Updated' }}
                                </label>
                                <p class="text-gray-800 {{ $textAlign }}">
                                    {{ $client->updated_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
