<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">Urls</h1>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900"
                                href="{{ route('url.create') }}"
                            >Add New Url</a>
                        </div>
                    </div>
                    <div class="mt-8 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"
                                                scope="col"
                                            >Site Name</th>
                                            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                                scope="col"
                                            >
                                                Original Url</th>
                                            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                                scope="col"
                                            >
                                                Shorten Url</th>
                                            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                                scope="col"
                                            >
                                                Count</th>
                                            <th class="relative py-3.5 pl-3 pr-4 sm:pr-0" scope="col">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($urls as $url)
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                    {{ $url->site_name }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $url->original_url }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-indigo-600">
                                                    <a href="{{ route('url.shorten', $url->shorten_url) }}"
                                                        target="_blank"
                                                    >
                                                        {{ route('url.shorten', $url->shorten_url) }}
                                                    </a>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $url->click_count }}</td>
                                                <td
                                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                    <div class="flex justify-evenly">
                                                        <a class="text-indigo-500"
                                                            href="{{ route('url.edit', $url) }}">Edit</a>
                                                        <form method="POST" action="{{ route('url.destroy', $url) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-500">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
