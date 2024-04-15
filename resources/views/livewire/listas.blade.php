<div>
    <div>
        <select name="" id="" wire:model.live="distribuidora_id" wire:change="cambia">
            @foreach ($distribuidoras as $distribuidora)
            <option value="{{ $distribuidora->id }}">
                {{ $distribuidora->nombre }}
            </option>
            @endforeach
        </select>
    </div>
    <div>
        <select name="desarrolladora_id" id="" wire:model.live="desarrolladora_id">
            @foreach ($desarrolladoras as $desarrolladora)
            <option value="{{ $desarrolladora->id }}" {{ $desarrolladora->id == $desarrolladora_id ? 'selected' : '' }} >
                {{ $desarrolladora->nombre }}
            </option>
            @endforeach
        </select>
    </div>
</div>
