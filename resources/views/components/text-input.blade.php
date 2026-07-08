@props(['name', 'label', 'type' => 'text', 'value' => ''])

<label class="form-control w-full">
    <span class="label-text">{{ $label }}</span>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        class="input input-bordered w-full @error($name) input-error @enderror"
        {{ $attributes }}
    >

    @error($name)
        <p class="text-error text-sm mt-1">{{ $message }}</p>
    @enderror
</label>