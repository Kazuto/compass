@props([
    'button'
])
<button
    type="button"
    id="button-{{ $id }}"
    data-toggle="modal"
    data-target="modal-{{ $id }}"
    {{ $button->attributes->class([
        'py-2 px-3 rounded-lg bg-[var(--color-accent)]',
        'bg-red-600' => $button->attributes->has('danger'),
]) }}
>
    {{ $button }}
</button>

<dialog id="modal-{{ $id }}" class="w-full max-w-2xl bg-[var(--color-background)] rounded-lg shadow-lg">
    <div class="flex justify-between p-4 text-[var(--color-text)] text-2xl font-bold">
        <h4>{{ $title }}</h4>
        <button
            data-action="close"
            class="inline-flex items-center justify-center w-10 h-10 rounded-lg transition-all hover:bg-white/10"
        >
            &times;
        </button>
    </div>

    <div class="p-4">
        {{ $slot }}
    </div>
</dialog>

