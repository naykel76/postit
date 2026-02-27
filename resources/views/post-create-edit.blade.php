<div class="bx">
    {{-- <pre>{{ json_encode($form->tmpUpload, JSON_PRETTY_PRINT) }}</pre> --}}
    <h1>{{ $pageTitle }}</h1>
    <div class="my flex va-c space-x-1">
        <x-gt-button wire:click="save" text="Save Changes" class="orange sm" />
        {{-- NK::TD Add code to check if form has been changed before leaving the page --}}
        <div wire:dirty class="txt-red">Unsaved changes...</div>
    </div>
    <div class="flex gap-2">
        <!-- main form content -->
        <div class="fg1">
            <div class="grid md:cols-2">
                <x-gt-input wire:model="form.title" label="Title" req />
                <x-gt-input wire:model="form.slug" label="Slug" disabled class="bg-gray-200" />
            </div>
            <x-gt-textarea wire:model="editing.intro" label="Introduction" />
            {{-- <x-gt-textarea wire:model="editing.headline" label="Headline" /> --}}
            <x-gt-ckeditor wire:model.blur="form.body" editorId="{{ '_' . Str::uuid() }}" />
        </div>
        <!-- form side content -->
        <div class="w-20 fs0 bdr-l pl-2">
            <x-gt-filepond wire:model="form.tmpUpload" for="form.tmpUpload" type="image" maxFileSize=50000 />
            <hr>
            <div class="txt-xs txt-red">This section contains features that are planned for future development.</div>
            <x-gt-select wire:model="form.layout" label="Layout" :options="\Naykel\Postit\Models\Post::LAYOUTS" req disabled/>
        </div>
    </div>
</div>