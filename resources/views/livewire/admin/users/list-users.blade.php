<div>
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Users [ {{ count($users) }} ]</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable users
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
                            <th>Manage</th>
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
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#deleteUserId">Delete</a>
                                            <a class="dropdown-item" href="edite-user.html">Edite</a>
                                            <a class="dropdown-item" href="profile-id.html">Show profile</a>
                                            <a class="dropdown-item" href="chat.html">Open chat rooms</a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Empty users!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
