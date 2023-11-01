<div>
    <form class="bg-body-tertiary shadow rounded py-3 px-4" method="POST" action="/products/process-massive-upload"
        enctype="multipart/form-data">
        @csrf

        <h1 class="fs-2 mb-3">{{ __('Massive Upload') }}</h1>

        <div class="mb-3">
            <input class="form-control" type="file" id="file" name="file" wire:model="file" required>
        </div>

        <div wire:loading>
            <i class="fa-solid fa-spinner fa-spin-pulse" wire:loading></i>
        </div>
        <p class="text-info">{{ __('Use these headers to validate your file has the same info') }}</p>
        <div class="table-preview mb-3">
            <table class="table table-hover text-nowrap">
                <thead>
                    <th>{{ __('Ticket') }}</th>
                    <th>{{ __('Queue') }}</th>
                    <th>{{ __('EAN') }}</th>
                    <th>{{ __('Business Unit') }}</th>
                    <th>{{ __('Department') }}</th>
                    <th>{{ __('Group') }}</th>
                    <th>{{ trans_choice('Category|Categories', 1) }}</th>
                    <th>{{ __('Subcategory') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Reference') }}</th>
                    <th>{{ __('Brand') }}</th>
                    <th>{{ __('Measure') }}</th>
                    <th>{{ __('Color') }}</th>
                    <th>{{ __('Cost') }}</th>
                    <th>{{ __('Provider NIT') }}</th>
                    <th>{{ __('Provider Name') }}</th>
                    <th>{{ __('Starting Date') }}</th>
                    <th>{{ __('Days Passed') }}</th>
                    <th>{{ __('Warranty Expiration Date') }}</th>
                    <th>{{ __('Notes') }}</th>
                </thead>
                <tbody>
                    @foreach ($excelArray as $row)
                        <tr>
                            <td>{{ $row[0] }}</td>
                            <td>{{ $row[1] }}</td>
                            <td>{{ $row[2] }}</td>
                            <td>{{ $row[3] }}</td>
                            <td>{{ $row[4] }}</td>
                            <td>{{ $row[5] }}</td>
                            <td>{{ $row[6] }}</td>
                            <td>{{ $row[7] }}</td>
                            <td>{{ $row[8] }}</td>
                            <td>{{ $row[9] }}</td>
                            <td>{{ $row[10] }}</td>
                            <td>{{ $row[11] }}</td>
                            <td>{{ $row[12] }}</td>
                            <td>{{ $row[13] }}</td>
                            <td>{{ $row[14] }}</td>
                            <td>{{ $row[15] }}</td>
                            <td>{{ $row[16] }}</td>
                            <td>{{ $row[17] }}</td>
                            <td>{{ $row[18] }}</td>
                            <td>{{ $row[19] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <div class="d-flex flex-row align-items-center text-warning">
            <h1>
                <i class="fa-solid fa-circle-info fa-fade me-2"></i>
            </h1>
            <p class="d-flex flex-row">
                {{ __('If a ticket exists already in database, all of its properties will be updated when processing massive upload') }}
            </p>
        </div>
        @if ($excelArray)
            <x-primary-button>Subir</x-primary-button>
        @endif
    </form>
</div>
