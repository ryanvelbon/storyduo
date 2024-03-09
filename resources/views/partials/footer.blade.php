<footer class="bg-gray-100" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="container py-16 sm:py-24 lg:py-32">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-y-16">
            <div>
                <h3 class="text-sm font-semibold leading-6 text-gray-900">Stories</h3>
                <ul role="list" class="mt-6 space-y-4">
                    @foreach($languages as $language)
                        <li>
                            <a href="{{ route('stories.index', $language) }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">{{ $language->name }} stories</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-semibold leading-6 text-gray-900">Learn vocabulary</h3>
                <ul role="list" class="mt-6 space-y-4">
                    @foreach($languages as $language)
                        <li>
                            <a href="" class="text-sm leading-6 text-gray-600 hover:text-gray-900">{{ $language->name }} vocabulary</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-semibold leading-6 text-gray-900">Find a teacher</h3>
                <ul role="list" class="mt-6 space-y-4">
                    @foreach($languages as $language)
                        <li>
                            <a href="" class="text-sm leading-6 text-gray-600 hover:text-gray-900">{{ $language->name }} teachers</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</footer>