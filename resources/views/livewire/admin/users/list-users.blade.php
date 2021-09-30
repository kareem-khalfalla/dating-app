<div class="container-fluid">
    <h1 class="mt-4">{{ __('dashboard.Users') }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">{{ __('dashboard.Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('dashboard.Users') }} [ {{ count($users) }} ]</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            {{ __('dashboard.DataTable users') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('dashboard.Image') }}</th>
                            <th>{{ __('dashboard.Name') }}</th>
                            <th>{{ __('dashboard.username') }}</th>
                            <th>{{ __('dashboard.Age') }}</th>
                            <th>{{ __('dashboard.Email') }}</th>
                            <th>{{ __('dashboard.Phone') }}</th>
                            <th>{{ __('dashboard.Manage') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)

                            <tr>
                                <td class="p-0 m-0 text-center"><img src="{{ asset('storage/' . $user->avatar) }}"
                                        alt="" width="70px" height="70px"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->profile->getAge() }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <span class="dropdown pl-2">
                                        <button class="btn btn-outline-secondary p-1 pr-2 pl-2" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu bg-warning" aria-labelledby="dropdownMenuButton">
                                            <a wire:click.prevent="confirm({{ $user->id }})" class="dropdown-item"
                                                href="#" data-toggle="modal" data-target="#deleteUserId">{{ __('dashboard.Delete') }}</a>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.users.update', $user) }}">{{ __('dashboard.Edit') }}</a>
                                            <a class="dropdown-item" href="{{ route('profile', $user) }}">{{ __('dashboard.Show') }}
                                                {{ __('dashboard.profile') }}</a>
                                            @if (\App\Models\Message::count() > 0)
                                                <a class="dropdown-item" href="{{ route('admin.user.chat', $user) }}">{{ __('dashboard.Open chat
                                                    rooms') }}</a>
                                            @endif
                                        </div>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>{{ __('dashboard.Empty users') }}!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<x-confirmation-alert />
