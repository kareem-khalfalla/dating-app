{{-- -------------------- Saved Messages -------------------- --}}
{{-- @if ($get == 'saved')
    <table class="messenger-list-item m-li-divider @if ('user_' . Auth::user()->id == $id && $id != '0') m-list-active @endif">
        <tr data-action="0">
            <td>
            <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                <span class="far fa-bookmark" style="font-size: 22px; color: #68a5ff; margin-top: calc(50% - 10px);"></span>
            </div>
            </td>
            <td>
                <p data-id="{{ 'user_'.Auth::user()->id }}">Saved Messages <span>You</span></p>
                <span>Save messages secretly</span>
            </td>
        </tr>
    </table>
@endif --}}

{{-- -------------------- All users/group list -------------------- --}}
@if ($get == 'users')
    <table class="messenger-list-item @if ($user->id == $id && $id != '0') m-list-active  @endif" data-contact="{{ $user->id }}">
        <tr data-action="0" class="active">
            {{-- Avatar side --}}
            <td style="position: relative">
                <li class="d-flex bd-highlight">
                    @if ($user->active_status)
                        {{-- <span class="activeStatus"></span> --}}
                        <span class="online_icon"></span>
                    @endif
                    <div class="avatar av-m img_cont rounded-circle user_img"
                        style="background-image: url('{{ asset('/storage/' . config('chatify.user_avatar.folder') . '/' . $user->avatar) }}');">
                    </div>
                </li>
            </td>
            {{-- center side --}}
            <td>
                <p data-id="{{ $type . '_' . $user->id }}" style="color: #fff">
                    {{ strlen($user->name) > 12 ? trim(substr($user->name, 0, 12)) . '..' : $user->name }}
                </p>
                <span>{{ $lastMessage->created_at->diffForHumans() }}</span>
                {{-- <span>
                    {!! $lastMessage->from_id == Auth::user()->id ? '<span class="lastMessageIndicator">You :</span>' : '' !!}
                    @if ($lastMessage->attachment == null)
                        {{ strlen($lastMessage->body) > 30 ? trim(substr($lastMessage->body, 0, 30)) . '..' : $lastMessage->body }}
                    @else
                        <span class="fas fa-file"></span> Attachment
                    @endif
                </span> --}}
                {{-- New messages counter --}}
                {!! $unseenCounter > 0 ? '<b>' . $unseenCounter . '</b>' : '' !!}
            </td>

        </tr>
    </table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if ($get == 'search_item')
    <table class="messenger-list-item" data-contact="{{ $user->id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
                <div class="avatar av-m"
                    style="background-image: url('{{ asset('/storage/' . config('chatify.user_avatar.folder') . '/' . $user->avatar) }}');">
                </div>
            </td>
            {{-- center side --}}
            <td>
                <p data-id="{{ $type . '_' . $user->id }}" style="color: #fff">
                    {{ strlen($user->name) > 12 ? trim(substr($user->name, 0, 12)) . '..' : $user->name }}
            </td>

        </tr>
    </table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if ($get == 'sharedPhoto')
    <div class="shared-photo chat-image" style="background-image: url('{{ $image }}')"></div>
@endif
