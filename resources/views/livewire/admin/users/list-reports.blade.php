<div class="container-fluid">
    <h1 class="mt-4">{{ __('dashboard.Reports') }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">{{ __('dashboard.Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('dashboard.Reports') }} [ {{ $reports->count() }} ]</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            {{ __('dashboard.DataTable Reports') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('dashboard.From') }}</th>
                            <th>{{ __('dashboard.About') }}</th>
                            <th>{{ __('dashboard.report') }}</th>
                            <th>{{ __('dashboard.Manage') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{ $report->sender->name }} <a href="profile-id.html"><i class="fa fa-link"
                                            aria-hidden="true"></i></a>
                                </td>
                                <td>{{ $report->recipient->name }} <a href="profile-id.html"><i class="fa fa-link"
                                            aria-hidden="true"></i></a>
                                </td>
                                <td>{{ $report->reason }}</td>
                                <td>
                                    <button wire:click.prevent="confirm({{ $report->id }})" data-toggle="modal" data-target="#delete_report"
                                        class="btn btn-danger text-center"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<x-confirmation-alert />
