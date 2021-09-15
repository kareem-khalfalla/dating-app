<div class="card mb-sm-3 mb-md-0 contacts_card">

    <div class="card-header">
        <div class="input-group">
            <input wire:model="search" type="text" placeholder="Search..." name="" class="form-control search">
            <div class="input-group-prepend">
                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
            </div>
        </div>
    </div>

    <div class="card-body contacts_body">
        <ul class="contacts">
            @foreach ($users as $user)
                <li wire:click="$emit('userSelected', {{ $user }})" class="li"
                    id="li-{{ $user->id }}">
                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-circle user_img">
                            <span class="online_icon {{ $user->isOnline() ? '' : 'offline' }}"></span>
                        </div>
                        <div class="user_info">
                            <span>{{ $user->name }}</span>
                            <p>{{ $user->isOnline() ? 'online' : 'offline' }}</p>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
    <div class="card-footer">
        <h1>{{ $userId }}</h1>
    </div>
</div>
@push('scripts')
    <script>
        window.livewire.on('receivedMessage', (id) => {
            setTimeout(() => {
                let element = document.getElementById(`li-${id}`);
                element.click();

            }, 1000);
        });





        window.onload = () => {
            let htmlCollection = document.getElementsByClassName('li');
            let elements = [...htmlCollection];
            elements[0].click();
            elements[0].classList.add('active');

            elements.forEach(element => {
                element.addEventListener('click', () => {
                    resetSiblings();
                    element.classList.add('active');
                });
            });

            const resetSiblings = () => {
                elements.forEach(element => {
                    element.classList.remove('active')
                });
            }
        }
    </script>
@endpush
