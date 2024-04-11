<div>
    <x-breadcrumb title="Ordenes de despacho" route="Ordenes de despacho,Listar" />
    <x-input-field name="search" model="search" label="Buscar" />
    <x-card title="Listar">
        <div class="row my-3">
            <div class="col-md-4 col-sm-12">
                <x-button-primary label="Crear nueva orden de despacho" fullSize='false' type="button" wire:click="createDispatchOrder"/>
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <x-table.head>No. Despacho</x-table.head>
                <x-table.head>No. Orden</x-table.head>
                <x-table.head>Cliente</x-table.head>
                <x-table.head>Creado por</x-table.head>
                <x-table.head>Fecha de creación</x-table.head>
                <x-table.head>Estado</x-table.head>
            </x-slot>
            <x-slot name="body">

                @forelse ($results as $item)
                    <x-table.row onclick="showOrderDialog({{$item->id}})">
                        <x-table.cell class="text-center">{{ $item->id }}</x-table.cell>
                        <x-table.cell class="text-center">{{ $item->order->id }}</x-table.cell>
                        <x-table.cell>{{ $item->order->client->full_name  }}</x-table.cell>
                        <x-table.cell>{{ $item->creator->name ?? __('Sistema') }}</x-table.cell>
                        <x-table.cell>{{ $item->created_at }}</x-table.cell>
                        <x-table.cell>{{ $item->status ? __('Activo') : __('Inactivo') }}</x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="7" class="text-center">{{ __('Sin resultados...') }}</x-table.cell>
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

    <x-modal id="order-option-dialog" title="Opciones">
        <x-slot name="body">
            <div class="d-flex justify-content-center">
                <div class="w-100 vstack gap-2">
                    <x-button-primary type="button" fullSize="true" label="Asignar despacho" wire:click="assignOrder"/>
                    <x-button-primary type="button" fullSize="true" label="Ver detalles del despacho" wire:click="showOrder" />
                    <x-button-primary type="button" fullSize="true" label="Anular despacho" wire:click="cancelOrder" />
                </div>
            </div>
        </x-slot>
    </x-modal>
    <script>
        function showOrderDialog(id) {
            @this.order_id = id;
            const modal = bootstrap.Modal.getOrCreateInstance('#order-option-dialog');
            modal.show();
        }
    </script>
</div>



