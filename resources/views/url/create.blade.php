<x-app-layout>
    <div class="mx-auto max-w-2xl p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('url.store') }}">
            @csrf
            <input
                class="mt-6 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                name="site_name"
                type="text"
                value="{{ old('site_name') }}"
                required
                maxlength="255"
                placeholder="{{ __('Site Name') }}"
            />
            <x-input-error class="mt-2" :messages="$errors->store->get('site_name')" />
            <input
                class="mt-6 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                name="original_url"
                type="text"
                value="{{ old('original_url') }}"
                required
                maxlength="255"
                placeholder="{{ __('Valid Url') }}"
            />
            <x-input-error class="mt-2" :messages="$errors->store->get('original_url')" />
            <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
