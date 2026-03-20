<div>
    <div class="flex space-between va-c">
        <h1>{{ $pageTitle }}</h1>
        <div>
            {{-- create is disabled for now --}}
            <a href="{{ route("$routePrefix.create") }}" class="btn primary disabled" onclick="event.preventDefault()">
                <x-gt-icon name="plus-circle" class="icon" />
                <span> {{ 'Add ' . ucfirst(Str::singular(dotLastSegment($routePrefix))) }}</span>
            </a>
        </div>
    </div>
    <x-gt-search-input placeholder="Search by title..." />
    <x-gt-table>
        <x-slot:thead>
            <tr>
                <x-gt-table.th wire:click="sortBy('title')"
                    sortable :direction="$this->getSortDirection('title')"> title </x-gt-table.th>
                <x-gt-table.th wire:click="sortBy('status')"
                    sortable :direction="$this->getSortDirection('status')" alignCenter> status </x-gt-table.th>
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
                    <td>
                        <div class="flex ha-r space-x-075">
                            <x-gt-resource-action action="show" :id="$item->slug" routePrefix="posts" target="_blank" />
                            <x-gt-resource-action action="edit" :id="$item->slug" :$routePrefix />
                            <x-gt-resource-action action="delete" :id="$item->id" disabled />
                        </div>
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
    <!-- Delete Confirmation Modal -->
    <x-gt-modal.delete wire:model="selectedId" :$selectedId />
</div>
