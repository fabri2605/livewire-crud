<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="px-6 py-3 ml-3 mt-2 mb-2">
        <x-button wire:click="create()" class="w-full">Create Post</x-button>
    </div>


    @if ($modal)
        @include('livewire.create')
    @endif
    <x-table>
        <div class="px-6 py-3 ml-3 mt-2 mb-2">
            <x-input class="w-full" type="text" wire:model='search' placeholder="Filtrar busqueda" />
        </div>

        @if (count($posts) === 0)
            <div class="px-6 py-4">
                No hay datos!
            </div>
        @else
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        wire:click="order('id')">
                        Id
                        @if ($sort === 'id')
                            @if ($direction === 'asc')
                                <i class="fas fa-sort-down mt-1"></i>
                            @else
                                <i class="fas fa-sort-up mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort mt-1"></i>
                        @endif
                    </th>
                    <th scope="col"
                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider
                    "wire:click="order('title')">
                        Title
                        @if ($sort === 'title')
                            @if ($direction === 'asc')
                                <i class="fas fa-sort-down mt-1"></i>
                            @else
                                <i class="fas fa-sort-up mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort mt-1"></i>
                        @endif
                    </th>
                    <th scope="col"
                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider
                    "wire:click="order('content')">
                        Content
                        @if ($sort === 'content')
                            @if ($direction === 'asc')
                                <i class="fas fa-sort-down mt-1"></i>
                            @else
                                <i class="fas fa-sort-up mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort mt-1"></i>
                        @endif


                    </th>
                    <th scope="col"
                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider
                    ">
                        Edit
                    </th>
                    <th scope="col"
                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider
                    ">
                        Del
                    </th>
                </tr>
            </thead>
        @endif
        @foreach ($posts as $post)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $post->id }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $post->title }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $post->content }}
                            </div>
                        </div>
                    </div>
                </td>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <i wire:click='edit({{ $post->id }})' class="cursor-pointer fas fa-pen"></i>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <i wire:click='delete({{ $post->id }})' class="cursor-pointer fas fa-trash"></i>
                </td>
            </tr>
        @endforeach
    </x-table>
</div>
