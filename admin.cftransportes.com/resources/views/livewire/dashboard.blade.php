<div>
    @can('acceptOrders', \App\Models\DispatchOrder::class)

        <x-card title="Órdenes En proceso de entrega" class="mt-3">
            <div class="col-sm-12">
                <x-table>
                    @slot('head')
                        <x-table.head>ID Despacho</x-table.head>
                        <x-table.head>ID Orden</x-table.head>
                        <x-table.head>Cliente</x-table.head>
                    @endslot

                    @slot('body')
                        @forelse ($this->inProcessDispatchOrders as $dispatchOrder)
                            <x-table.row onclick="location.href='{{ route('dispatch-deliver', $dispatchOrder) }}'">
                                <x-table.cell>{{ $dispatchOrder->id }}</x-table.cell>
                                <x-table.cell>{{ $dispatchOrder->order_id }}</x-table.cell>
                                <x-table.cell>{{ $dispatchOrder->order->client->full_name }}</x-table.cell>
                            </x-table.row>
                        @empty
                            <x-table.row>
                                <x-table.cell colspan="3"> {{ __('Sin resultados') }} ... </x-table.cell>
                            </x-table.row>
                        @endforelse
                    @endslot
                </x-table>
            </div>
        </x-card>

        <x-card title="Órdenes asiganadas sin recibir" class="mt-3">
            <div class="col-sm-12">
                <x-table>
                    @slot('head')
                        <x-table.head>ID Despacho</x-table.head>
                        <x-table.head>ID Orden</x-table.head>
                        <x-table.head>Cliente</x-table.head>
                    @endslot

                    @slot('body')
                        @foreach ($this->awaitingDispatchOrders as $dispatchOrder)
                            <x-table.row onclick="showDispatchDialog({{ $dispatchOrder->id }})  ">
                                <x-table.cell>{{ $dispatchOrder->id }}</x-table.cell>
                                <x-table.cell>{{ $dispatchOrder->order_id }}</x-table.cell>
                                <x-table.cell>{{ $dispatchOrder->order->client->full_name }}</x-table.cell>
                            </x-table.row>
                        @endforeach
                    @endslot
                </x-table>
            </div>
        </x-card>


    @endcan

    <x-modal id="dispatch-option-dialog" title="Opciones">
        <x-slot name="body">
            <div class="d-flex justify-content-center">
                <div class="w-100 vstack gap-2">
                    @if (!$dispatchOrder->accepted_by_delivery)
                        <x-button-primary type="button" fullSize="true" label="Verificar"
                            wire:click="acceptDispatchOrder" />
                    @else
                        <x-button-primary type="button" fullSize="true" label="Entregar"
                            wire:click="deliverDispatchOrder" />
                    @endif
                </div>
            </div>
        </x-slot>
    </x-modal>

    <script>
        function showDispatchDialog(id) {
            @this.dispatch_id = id;
            @this.dispatch('update-dispatch-id', {
                id
            });
            const modal = bootstrap.Modal.getOrCreateInstance('#dispatch-option-dialog');
            modal.show();
        }
    </script>
</div>
