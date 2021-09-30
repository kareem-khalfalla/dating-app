<x-admin-layout>
    <div class="container-fluid">
        <h1 class="mt-4">{{ __('dashboard.Dashboard') }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{ __('dashboard.Dashboard') }}</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h4>{{ __('dashboard.Count Users') }}</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="lead">{{ $usersCount }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-dark text-white mb-4">
                    <div class="card-body">
                        <h4>{{ __('dashboard.Today\'s Users') }}</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="lead">{{ $todayUsersCount }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <h4>{{ __('dashboard.Today\'s visits') }}</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="lead">{{ $todayVisitsCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h4>{{ __('dashboard.All visits') }}</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="lead">{{ $visitsCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <h4>{{ __('dashboard.Online Users') }}</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="lead">{{ $onlineUsersCount }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h4>{{ __('dashboard.Reports') }}</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="lead">{{ $reportsCount }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h4>{{ __('dashboard.All Messages') }}</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="lead">{{ $messagesCount }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <h4>{{ __('dashboard.Today\'s msg') }}</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="lead">{{ $todayMessagesCount }}</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar mr-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                last 50 members
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>username</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="p-0 m-0 text-center"><img src="{{ asset('storage/' . $user->avatar) }}"
                                            alt="" width="70px" height="70px"></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->profile->getAge() }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
