<div>
    <div class="flex justify-between">
        <h1>{{ $title }}</h1>
        <div>
            <a href="{{ route("$routePrefix.create") }}" class="btn primary">
                <x-gt-icon name="plus-circle" class="icon" />
                <span> {{ 'New ' . ucfirst(Str::singular(dotLastSegment($routePrefix))) }}</span>
            </a>
            {{-- <a href="{{ route("$routePrefix.create") }}" class="btn primary disabled" onclick="event.preventDefault()">
                <x-gt-icon name="plus-circle" class="icon" />
                <span> {{ 'New ' . ucfirst(Str::singular(dotLastSegment($routePrefix))) }}</span>
            </a> --}}
        </div>
    </div>
    <x-gt-search-input placeholder="Search by title..." />
    <x-gt-table>
        <x-slot:thead>
            <tr>
                <x-gt-table.th wire:click="sortBy('title')" sortable
                    :direction="$this->getSortDirection('title')"> title </x-gt-table.th>
                <x-gt-table.th wire:click="sortBy('status')" sortable
                    :direction="$this->getSortDirection('status')" alignCenter> status </x-gt-table.th>
                <x-gt-table.th wire:click="sortBy('created_at')" sortable
                    :direction="$this->getSortDirection('created_at')"> Created </x-gt-table.th>
                <th></th>
            </tr>
        </x-slot:thead>
        <x-slot:tbody>
            @forelse($items as $item)
                <tr wire:key="{{ $item->id }}">
                    <td>{{ $item->title }}</td>
                    <td class="tac">
                        <div class="rounded inline-flex items-center bdr fw6 txt-xs pxy-025
                            {{ $item->status()->backgroundColor() }} 
                            {{ $item->status()->textColor() }} 
                            {{ $item->status()->borderColor() }}">
                            {{ $item->status()->label() }}
                        </div>
                    </td>
                    <td>{{ $item->createdAtDate() }}</td>
                    <td class="space-x-075 tar whitespace-nowrap">
                        <x-gt-resource-action action="show" :id="$item->slug" routePrefix="posts" target="_blank" />
                        <x-gt-resource-action action="edit" :id="$item->slug" :$routePrefix />
                        <x-gt-resource-action action="delete" :id="$item->id" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="tac pxy" colspan="10">No records found...</td>
                </tr>
            @endforelse
        </x-slot:tbody>
    </x-gt-table>
    {{ $items->links('gotime::pagination.livewire') }}
    <x-gt-modal.base wire:model="selectedId">
        <div class="bx-title inline-flex va-c">
            <x-gt-icon name="exclamation-triangle" class="wh-2 txt-red-400" />
            <span class="ml-1">Confirm Delete</span>
        </div>

        <p>Are you sure you want to delete this item? All data related to this item
            will be permanently removed. This action is final and cannot be undone.</p>

        <div class="bx-footer tar">
            <x-gt-button wire:click="$set('selectedId', false)"
                wire:loading.attr="disabled" text="Nevermind" />
            <x-gt-button wire:click="delete({{ $selectedId }})"
                text="Delete" class="danger" />
        </div>
    </x-gt-modal.base>

</div>
