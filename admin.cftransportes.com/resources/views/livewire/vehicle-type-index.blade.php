<div>
    <x-breadcrumb title="Tipos de vehículo" route="Tipos de vehículo,Listar" />
    <x-input-field name="search" model="search" label="Buscar" />
    <x-card title="Listar">
        <x-table>
            <x-slot name="head">
                <x-table.head>Nombre</x-table.head>
                <x-table.head>Creado por</x-table.head>
                <x-table.head>Fecha de creación</x-table.head>
                <x-table.head>Estado</x-table.head>
            </x-slot>
            <x-slot name="body">

                @forelse ($this->results as $item)
                    <x-table.row onclick="location.href='{{route('vehicle-type-view', $item->id)}}'">
                        <x-table.cell>{{ $item->name }}</x-table.cell>
                        <x-table.cell>{{ $item->creator->name ?? __('Sistema') }}</x-table.cell>
                        <x-table.cell>{{ $item->created_at }}</x-table.cell>
                        <x-table.cell>{{ $item->status ? __('Activo') : __('Inactivo') }}</x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="4" class="text-center">{{ __('Sin resultados...') }}</x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
    </x-card>

</div>
