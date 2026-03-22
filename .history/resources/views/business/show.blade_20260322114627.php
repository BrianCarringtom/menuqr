@foreach ($user->categories as $category)
    <div class="mb-16">
        <h2 class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide">
            {{ $category->name }}
        </h2>

        <div class="space-y-8">

            @foreach ($category->products as $product)
                <div>
                    <div class="flex justify-between items-end border-b border-gray-600 pb-2">
                        <h3 class="text-xl md:text-2xl">{{ $product->name }}</h3>
                        <span class="text-lg text-yellow-400">${{ $product->price }}</span>
                    </div>

                    <p class="text-gray-400 text-sm mt-2">
                        {{ $product->description }}
                    </p>
                </div>
            @endforeach

        </div>
    </div>
@endforeach
