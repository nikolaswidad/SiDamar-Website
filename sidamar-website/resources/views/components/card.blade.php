<div class="xl:w-1/4 md:w-1/2 mb-4">
    <div class="bg-white border-l-4 shadow h-full py-2 {{ $cardClasses }}">
        <div class="p-4">
            <div class="flex items-center">
                <div class="mr-2">
                    <div class="text-xs font-bold text-primary uppercase mb-1">
                        {{ $title }}
                    </div>
                    <div class="text-lg font-bold text-gray-800">
                        {{ $content }}
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <i class="{{ $iconClasses }}"></i>
                </div>
            </div>
        </div>
    </div>
</div>
