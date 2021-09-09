<x-app-layout>
    <br><br><br><br>
    <div class="container mb-4">
        <div class="row">

            <div class="col-12 col-lg-6 pt-2">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>All requests [ 1 ]</h4>
                    </div>
                    <div class="card-body">

                        <div class="row box_frind col-12 p-1">
                            <a href="profile-id.html">
                                <img class="img_user" src="img/avatar.png" alt="user image">
                            </a>
                            <h5 class="col-5">User name</h5>
                            <a href="#"><button class="btn btn-outline-primary">accept</button></a>&nbsp;
                            <a href="#"><button class="btn btn-outline-danger">cancel</button></a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 pt-2">
                @livewire('user-search-by-name-component') </div>
        </div>
    </div>

</x-app-layout>
