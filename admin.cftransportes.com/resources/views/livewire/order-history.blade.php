<div>


    <x-breadcrumb title="Ordenes" route="Ordenes,Listar,Historial" />

    <x-card title="Historial">
        <div class="container">
            <ul class="timeline list-unstyled">
                @foreach ($order->history as $item)
                    <li>
                        <div class="timeline-time text-end">
                            <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd') }}</span>
                            <span
                                class="time d-inline-block">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s') }}</span>
                        </div>
                        <div class="timeline-icon">
                            <a href="javascript:void(0);"></a>
                        </div>
                        <div class="timeline-body">
                            <div class="d-flex align-items-top timeline-main-content flex-wrap mt-0">
                                <div class="flex-fill">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-sm-0 mt-2">
                                            <p class="mb-0 fs-14 fw-semibold">{{ $item->creator->name }}</p>
                                            <p class="mb-0 fw-bold">{{ $item->status }}</p>
                                            <p class="mb-0 text-muted">{{ $item->comment }}</p>
                                        </div>
                                        <div class="ms-auto">
                                            <span class="float-end badge bg-light text-muted timeline-badge">
                                                {{ $item->created_at }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </x-card>


</div>
