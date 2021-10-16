<div class="container-fluid">
    <h1 class="mt-4">Reports</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Reports [ {{ $reports->count() }} ]</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Reports
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>About</th>
                            <th>report</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{ $report->sender->name }} <a
                                        href="{{ route('profile', $report->sender) }}"><i class="fa fa-link"
                                            aria-hidden="true"></i></a>
                                </td>
                                <td>{{ $report->recipient->name }} <a
                                        href="{{ route('profile', $report->recipient) }}"><i class="fa fa-link"
                                            aria-hidden="true"></i></a>
                                </td>
                                <td>{{ $report->reason }}</td>
                                <td>
                                    <button wire:click.prevent="confirm({{ $report->id }})" data-toggle="modal"
                                        data-target="#delete_report" class="btn btn-danger text-center"><i
                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<x-alerts />
