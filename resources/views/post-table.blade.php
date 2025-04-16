<div>
    <table>
        <thead>
            <tr>
                <x-gt-table.th wire:click="sortBy('title')"
                    sortable :direction="$this->getSortDirection('title')"> title </x-gt-table.th>
                <x-gt-table.th> Slug </x-gt-table.th>
                <x-gt-table.th class="tac"> Status </x-gt-table.th>
            </tr>
        </thead>
        <tbody wire:loading.class="opacity-05" class="divide-y">
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->slug }}</td>
                    <td class="tac">
                        <div class="rounded-025 inline-flex items-center {{ $item->status()->color() }} {{ $item->status()->colorText() }} txt-xs px-05 py-025">
                            {{ $item->status()->label() }}
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="tac pxy" colspan="10">No records found...</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $items->links('gotime::pagination.livewire') }}
</div>
