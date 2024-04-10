<div>
    <x-breadcrumb title="Usuarios" route="Usuarios,Listar" />
    <x-input-field name="search" model="search" label="Buscar" />
    <x-card title="Listar">
        <x-table>
            <x-slot name="head">
                <x-table.head>{{ __('Nombre') }}</x-table.head>
                <x-table.head>{{ __('Rol') }}</x-table.head>
                <x-table.head>{{ __('Creado por') }}</x-table.head>
                <x-table.head>{{ __('Fecha de creación') }}</x-table.head>
                <x-table.head>{{ __('Estado') }}</x-table.head>
            </x-slot>
            <x-slot name="body">

                @forelse ($results as $item)
                    <x-table.row onclick="location.href='{{route('user-view', $item->id)}}'">
                        <x-table.cell>{{ $item->name }}</x-table.cell>
                        <x-table.cell>{{ $item->role->name  }}</x-table.cell>
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
        <div class="container-fluid my-3">
            <div class="d-flex justify-content-center">
                {{ $results->links() }}
            </div>
        </div>
        
    </x-card>

</div>
