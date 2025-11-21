{{-- 

- the form need to show dirty state after uploading a file and remain that way
  until saved.
- show preview of uploaded image
- the layout select should be enabled for editing
- back to list button
- route prefix

Questions:

Do you prefer the form to open on a page without the side bar (clean interface
but no navigation) or with the side bar (more context but more cluttered)?

--}}
<div>
    <h1>{{ $title }}</h1>
    <div class="my flex va-c space-x-1">
        <x-gt-button wire:click="save('save_stay')" wire:dirty.attr.remove="disabled" text="Save Changes" class="orange sm " disabled />
        <a href="{{ route("$routePrefix.create") }}" class="btn primary sm">
            <x-gt-icon name="plus-circle" class="icon" />
            <span> {{ 'Add ' . ucfirst(Str::singular(dotLastSegment($routePrefix))) }}</span>
        </a>
        <div wire:dirty class="txt-red">Unsaved changes...</div>
    </div>
    <form wire:submit="save" class="bx">
        <div class="flex gap-2">
            <div class="fg1">
                <div class="grid md:cols-2">
                    <x-gt-input wire:model="form.title" label="Title" req />
                    <x-gt-input wire:model="form.slug" label="Slug" disabled class="bg-gray-100" />
                </div>
                <x-gt-input wire:model="form.headline" label="Headline" placeholder="Main headline for the page" />
                <x-gt-textarea wire:model="form.intro" label="Introduction" placeholder="Intro text shown at the top of the page" />
                <x-gt-ckeditor wire:model.blur="form.content" editorId="{{ '_' . Str::uuid() }}" label="Content" req />
            </div>
            <aside class="w-20 fs0 bdr-l pl-2">
                <img src="{{ $form->tmpUpload ? $form->tmpUpload->temporaryUrl() : $form->editing->featuredImageUrl() }}" alt="{{ $form->title ?? null }}">
                <x-gt-filepond wire:model="form.tmpUpload" for="form.tmpUpload" type="image" maxFileSize=50000 />
                <hr>
                <x-gt-select wire:model="form.layout" label="Layout" :options="\Naykel\Postit\Models\Post::LAYOUTS" req disabled />
            </aside>
        </div>
    </form>
</div>