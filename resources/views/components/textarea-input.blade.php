@props(['name', 'label', 'value' => ''])

<label class="form-control w-full">
    <span class="block label-text">{{ $label }}</span>

    <textarea
        name="{{ $name }}"
        rows="4"
        class="textarea textarea-bordered w-full @error($name) textarea-error @enderror"
        {{ $attributes }}
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <span class="block text-error text-sm mt-1">{{ $message }}</span>
    @enderror
</label>