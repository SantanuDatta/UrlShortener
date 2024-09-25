<x-app-layout>
    <div class="mx-auto max-w-2xl p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('url.update', $url) }}">
            @csrf
            @method('patch')
            <input
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-6"
                name="site_name"
                type="text"
                value="{{ old('site_name', $url->site_name) }}"
                required
                maxlength="255"
                placeholder="{{ __('Title') }}"
            />
            <x-input-error class="mt-2" :messages="$errors->store->get('title')" />
            <input
                class="mt-6 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                name="original_url"
                type="text"
                value="{{ old('original_url', $url->original_url) }}"
                required
                maxlength="255"
                placeholder="{{ __('Original Url') }}"
            />
            <x-input-error class="mt-2" :messages="$errors->store->get('original_url')" />
            <div class="mt-4 flex items-center justify-between">
                <a href="{{ route('url.index') }}">{{ __('Cancel') }}</a>
                <x-primary-button>{{ __('Update') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
