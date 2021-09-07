<section id="latest users" class="bg-white">
    <br>
    <div class="container-fluid">
        @if (isset($users) && count($users) > 1)

            <div class="row">

                <div class="col-12 col-md-5 col-lg-4 pr-5 mb-4">
                    <h2 class="h_2 mb-3">latest users</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">nationality</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tbody>
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($user->profile->dob)->age == 0 ? 'N/A' : Carbon\Carbon::parse($user->profile->dob)->age }}</td>
                                    <td>{{ $user->profile->nationality->name ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>

                <div class="row col-12 col-md-7 col-lg-8 pl-3 latest_user2 mb-4">

                    <div class="row col-12 col-sm-8 col-md-12 col-lg-6 mb-2">
                        <div class="col-6 col-md-5 p-0 m-0">
                            <img class="p-0 m-0" style="border: 1px solid #eee;" src="img/avatar.png"
                                width="150px" height="150px" alt="">
                        </div>
                        <div class="col-6 col-md-7">
                            <p><b>name : </b> {{ $users[0]->name }}</p>
                            <p><b>Age : </b> {{ $users[0]->profile->dob ?? 'N/A' }}</p>
                            <p><b>From : </b> {{ $users[0]->profile->hometown->name ?? 'N/A' }}</p>
                            <p><b>Stay in : </b> {{ $users[0]->profile->countryOfResidence->name ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="row col-12 col-sm-8 col-md-12 col-lg-6 mb-2">
                        <div class="col-6 col-md-5 p-0 m-0">
                            <img class="p-0 m-0" style="border: 1px solid #eee;" src="img/avatar.png"
                                width="150px" height="150px" alt="">
                        </div>
                        <div class="col-6 col-md-7">
                            <p><b>name : </b> {{ $users[1]->name }}</p>
                            <p><b>Age : </b> {{ $users[1]->profile->dob ?? 'N/A' }}</p>
                            <p><b>From : </b> {{ $users[1]->profile->hometown->name ?? 'N/A' }}</p>
                            <p><b>Stay in : </b> {{ $users[1]->profile->countryOfResidence->name ?? 'N/A' }}</p>
                        </div>
                    </div>

                </div>


            </div>
        @endif

    </div>

    <br>
</section>
