<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold py-5">{{ __('Новая заявка') }}</h2>
    </x-slot>

    <form class="mx-auto max-w-2xl p-4 md:p-5 space-y-4 flex flex-col gap-5" method="POST"
        action="{{ route('reports.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-5">
            <div>
                <x-input-label for="adress" :value="__('Адрес')" />
                <x-text-input id="adress" class="block mt-1" type="text" name="adress" required />
                <x-input-error :messages="$errors->get('adress')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="type" :value="__('Тип ремонта')" />
                <select id="type" name="type"
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    required>
                    <option value="" disabled selected>Выберите тип ремонта</option>
                    <option value="Косметический ремонт">Косметический ремонт</option>
                    <option value="Капитальный ремонт">Капитальный ремонт</option>
                    <option value="Электромонтаж">Электромонтаж</option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="date" :value="__('Дата')" />
                <x-text-input id="date" class="block mt-1" type="date" name="date" required />
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="time" :value="__('Время')" />
                <x-text-input id="time" class="block mt-1" type="time" name="time" required />
                <x-input-error :messages="$errors->get('time')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="payment" :value="__('Способ оплаты')" />
                <select id="payment" name="payment"
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    required>
                    <option value="" disabled selected>Выберите способ оплаты</option>
                    <option value="Наличными">Наличными</option>
                    <option value="Банковская карта">Банковская карта</option>
                    <option value="Безналичный расчет">Безналичный расчет</option>
                </select>
                <x-input-error :messages="$errors->get('payment')" class="mt-2" />
            </div>

            <div>
                <x-primary-button class="ms-3">
                    {{ __('Создать') }}
                </x-primary-button>
            </div>
    </form>
    </div>
</x-app-layout>
